<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Primary Meta Tags -->
        <title>Rubicon | Soluciones Inteligentes en Medellín, Colombia - Transformación Digital</title>
        <meta name="title" content="Rubicon Medellín | Transformación Digital para Empresas en Colombia">
        <meta name="description" content="Rubicon en Medellín, Colombia. Especialistas en automatización empresarial, flujos de caja y gestión de inventarios. Soluciones tecnológicas para empresas en Antioquia.">

        <meta name="robots" content="index, follow">
        <meta name="keywords" content="automatización empresarial Medellín, flujos de caja Colombia, gestión inventarios Antioquia, sistemas QR Medellín, transformación digital Colombia, Rubicon Medellín, optimización procesos empresariales Colombia">
        <meta name="author" content="Rubicon Carlos González">
        <meta name="geo.region" content="CO-ANT">
        <meta name="geo.placename" content="Medellín">
        <meta name="geo.position" content="6.2442;-75.5812">
        <meta name="ICBM" content="6.2442, -75.5812">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://rubicon-prog.com/">
        <meta property="og:title" content="Rubicon Medellín | Soluciones Empresariales en Colombia">
        <meta property="og:description" content="Empresa de tecnología en Medellín especializada en automatización, flujos de caja y gestión de inventarios para empresas en Colombia.">
        <meta property="og:image" content="https://rubicon-prog.com/images/og-image.jpg">
        <meta property="og:locale" content="es_CO">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://rubicon-prog.com/">
        <meta property="twitter:title" content="Rubicon Medellín | Transformación Digital Colombia">
        <meta property="twitter:description" content="Soluciones tecnológicas en Medellín para optimizar procesos empresariales. Expertos en automatización y gestión empresarial en Colombia.">
        <meta property="twitter:image" content="https://rubicon-prog.com/images/og-image.jpg">
        
        <!-- Canonical URL -->
        <link rel="canonical" href="https://rubicon-prog.com/">

        <meta name="theme-color" content="#000000">
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/apple.ico') }}">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        
        <!-- Preload critical resources -->
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap"></noscript>
        @livewireStyles
    <!-- CSS -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes slideIn {
            0% { transform: translateX(-100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 8s ease-in-out infinite;
        }
        
        .animate-slide-in {
            animation: slideIn 0.8s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 1.2s ease-out forwards;
        }
        
        .cursor {
            display: inline-block;
            width: 3px;
            height: 1em;
            background-color: black;
            margin-left: 2px;
            animation: blink 1s step-end infinite;
        }
        
        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
    
    <!-- Schema.org markup for Google con información local -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Rubicon",
      "alternateName": "Rubicon Medellín",
      "url": "https://rubicon-prog.com",
      "logo": "https://rubicon-prog.com/images/logo.png",
      "description": "Empresa de transformación digital en Medellín, Colombia, especializada en automatización empresarial y optimización de procesos",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "",
        "addressLocality": "Medellín",
        "addressRegion": "Antioquia",
        "postalCode": "",
        "addressCountry": "CO"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 6.2442,
        "longitude": -75.5812
      },
      "areaServed": [
        {
          "@type": "City",
          "name": "Medellín",
          "containedInPlace": {
            "@type": "State",
            "name": "Antioquia",
            "containedInPlace": {
              "@type": "Country",
              "name": "Colombia"
            }
          }
        }
      ],
      "serviceArea": {
        "@type": "GeoCircle",
        "geoMidpoint": {
          "@type": "GeoCoordinates",
          "latitude": 6.2442,
          "longitude": -75.5812
        },
        "geoRadius": "50000"
      },
      "services": [
        "Automatización empresarial",
        "Gestión de flujos de caja",
        "Sistemas de inventarios",
        "Transformación digital",
        "Optimización de procesos"
      ],
      "sameAs": [
        "https://www.tiktok.com/@rubicon.tech",
        "https://instagram.com/rubicon.bio"
      ]
    }
    </script>

    <!-- Local Business Schema adicional -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "@id": "https://rubicon-prog.com/#business",
      "name": "Rubicon",
      "description": "Soluciones inteligentes de automatización empresarial en Medellín",
      "url": "https://rubicon-prog.com",
      "telephone": "",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Medellín",
        "addressRegion": "Antioquia",
        "addressCountry": "Colombia"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "6.2442",
        "longitude": "-75.5812"
      },
      "openingHours": "Mo-Fr 08:00-18:00",
      "priceRange": "$$",
      "image": "https://rubicon-prog.com/images/og-image.jpg"
    }
    </script>
</head>
<body class="bg-white overflow-x-hidden" x-data="{ 
    mobileMenuOpen: false,
    typewriterText: '',
    fullText: 'RUBICON',
    typewriterPhase: 'typing',
    currentIndex: 0,
    init() {
        this.typewriter();
        this.initScrollAnimations();
    },
    typewriter() {
        if (this.typewriterPhase === 'typing') {
            if (this.currentIndex < this.fullText.length) {
                this.typewriterText += this.fullText.charAt(this.currentIndex);
                this.currentIndex++;
                setTimeout(() => this.typewriter(), 150);
            } else {
                this.typewriterPhase = 'pausing';
                setTimeout(() => this.typewriter(), 2000);
            }
        } else if (this.typewriterPhase === 'pausing') {
            this.typewriterPhase = 'deleting';
            setTimeout(() => this.typewriter(), 100);
        } else if (this.typewriterPhase === 'deleting') {
            if (this.typewriterText.length > 0) {
                this.typewriterText = this.typewriterText.slice(0, -1);
                setTimeout(() => this.typewriter(), 100);
            } else {
                this.typewriterPhase = 'waiting';
                this.currentIndex = 0;
                setTimeout(() => this.typewriter(), 1000);
            }
        } else if (this.typewriterPhase === 'waiting') {
            this.typewriterPhase = 'typing';
            setTimeout(() => this.typewriter(), 200);
        }
    },
    initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100');
                    entry.target.classList.remove('opacity-0');
                    entry.target.classList.add('translate-y-0');
                    entry.target.classList.remove('translate-y-10');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.scroll-animate').forEach(el => {
            observer.observe(el);
        });
    }
}">
    <!-- Navigation -->
    @persist('navbar')
    <nav class="border-b-4 border-red-300/50 py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 bg-white/20 backdrop-blur-md shadow-lg shadow-red-200/20 z-50">
        <div class="font-bold text-2xl tracking-tight text-black">
            <span x-text="typewriterText"></span><span class="cursor text-black">|</span>
        </div>
        <div class="hidden md:flex space-x-8">
            <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">Inicio</a>
            <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/pitch" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">Edugamer</a>
            <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/contactanos" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">Contáctenos</a>
            <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/demo" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">Demo</a>
        </div>
        <div class="md:hidden">
            <button 
                @click="mobileMenuOpen = !mobileMenuOpen" 
                class="p-2 border-2 border-red-400 text-red-700 hover:bg-red-400 hover:text-white transition-colors duration-300 rounded backdrop-blur-sm"
                aria-label="Toggle menu"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>
    @endpersist

    <!-- Mobile Menu -->
<div 
    x-show="mobileMenuOpen" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-10"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-10"
    class="md:hidden bg-white border-b-4 border-black sticky top-16 z-40 backdrop-blur-md shadow-lg"
    aria-hidden="true"
>
    <div class="flex flex-col py-4 px-6">
        <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Inicio</a>
        <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/pitch" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Edugamer</a>
        <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/contactanos"  class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Contáctenos</a>
        <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/demo" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Demo</a>
    </div>
</div>

    <body>
        {{ $slot }}
    </body>

    <!-- Footer -->
    <footer class="py-12 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b-4 border-black pb-8 mb-8">
                <div class="font-bold text-3xl tracking-tight mb-6 md:mb-0 text-black">RUBICON</div>
                <!-- Agregar información de ubicación en el footer -->
                <div class="text-sm text-gray-600">
                    <p>📍 Medellín, Antioquia - Colombia</p>
                    <p>Transformación Digital Empresarial</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <p>© {{ date('Y') }} Rubicon. Todos los derechos reservados. Medellín, Colombia</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="https://www.tiktok.com/@rubicon.tech" target="_blank" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="Tiktok profile">Tiktok</a>
                    <a href="https://instagram.com/rubicon.bio" target="_blank" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="Instagram profile">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>
</html>