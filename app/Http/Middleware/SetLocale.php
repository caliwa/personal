<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    /**
     * Países de habla hispana
     */
    private $spanishSpeakingCountries = [
        'ES', 'MX', 'AR', 'CO', 'PE', 'CL', 'VE', 'EC', 'GT', 'CU', 
        'BO', 'DO', 'HN', 'PY', 'SV', 'NI', 'CR', 'PA', 'UY'
    ];

    public function handle(Request $request, Closure $next)
    {
        $locale = $this->determineLocale($request);
        
        App::setLocale($locale);
        
        return $next($request);
    }

    private function determineLocale(Request $request): string
    {
        // 1. Verificar si hay un locale en la sesión (usuario ya seleccionó)
        if ($request->session()->has('locale')) {
            $sessionLocale = $request->session()->get('locale');
            if (in_array($sessionLocale, config('app.locales'))) {
                return $sessionLocale;
            }
        }

        // 2. Detectar por IP geográfica
        $countryCode = $this->getCountryByIP($request);
        if ($countryCode) {
            // Si el país está en la lista de países hispanohablantes, usar 'es'
            if (in_array($countryCode, $this->spanishSpeakingCountries)) {
                return 'es';
            }
            // Si no, usar 'en' por defecto
            return 'en';
        }

        // 3. Fallback a preferencias del navegador
        $browserLocale = $request->getPreferredLanguage(config('app.locales'));
        if ($browserLocale && in_array($browserLocale, config('app.locales'))) {
            return $browserLocale;
        }

        // 4. Fallback final
        return config('app.fallback_locale');
    }

    private function getCountryByIP(Request $request): ?string
    {
        try {
            $ip = $this->getRealIP($request);
            
            // No procesar IPs locales
            if ($this->isLocalIP($ip)) {
                return null;
            }

            // Cache por 24 horas para evitar muchas consultas
            $cacheKey = "country_ip_{$ip}";
            
            return Cache::remember($cacheKey, 60 * 60 * 24, function () use ($ip) {
                return $this->fetchCountryByIP($ip);
            });
            
        } catch (\Exception $e) {
            // Log error pero no interrumpir la aplicación
            \Log::warning("Error detecting country by IP: " . $e->getMessage());
            return null;
        }
    }

    private function getRealIP(Request $request): string
    {
        // Obtener IP real considerando proxies/CDNs
        if ($request->hasHeader('CF-Connecting-IP')) {
            return $request->header('CF-Connecting-IP'); // Cloudflare
        }
        
        if ($request->hasHeader('X-Forwarded-For')) {
            $ips = explode(',', $request->header('X-Forwarded-For'));
            return trim($ips[0]);
        }
        
        return $request->ip();
    }

    private function isLocalIP(string $ip): bool
    {
        return in_array($ip, ['127.0.0.1', '::1']) || 
               filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
    }

    private function fetchCountryByIP(string $ip): ?string
    {
        // Opción 1: Usar ipapi.co (gratis hasta 1000 requests/día)
        try {
            $response = Http::timeout(5)->get("https://ipapi.co/{$ip}/country/");
            
            if ($response->successful()) {
                $countryCode = strtoupper(trim($response->body()));
                if (strlen($countryCode) === 2) {
                    return $countryCode;
                }
            }
        } catch (\Exception $e) {
            // Continuar con el siguiente servicio
        }

        // Opción 2: Usar ip-api.com (gratis)
        try {
            $response = Http::timeout(5)->get("http://ip-api.com/json/{$ip}?fields=countryCode");
            
            if ($response->successful()) {
                $data = $response->json();
                $countryCode = $data['countryCode'] ?? null;
                
                if ($countryCode && strlen($countryCode) === 2) {
                    return strtoupper($countryCode);
                }
            }
        } catch (\Exception $e) {
            // Continuar
        }

        return null;
    }
}