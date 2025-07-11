<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.pitch_title') }}</title> {{-- Assuming pitch_title from previous context --}}
    @assets
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
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
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
        
        .animate-shake {
            animation: shake 0.5s ease-in-out;
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
</head>
@endassets

<div x-data="{}" class="py-16 md:py-24 px-6 md:px-12 bg-gradient-to-br from-[#25D366] to-white">
    <div class="max-w-4xl mx-auto text-center">
        <div class="inline-block w-24 h-24 bg-white border-4 border-black mb-8 relative animate-pulse-slow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="#25D366">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
        </div>
        <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight animate-slide-in">
            RUBICON
        </h1>
        <p class="text-xl md:text-2xl mb-6 max-w-2xl mx-auto animate-fade-in">
            {{ __('messages.quote_slogan') }}
        </p>
        <p class="text-lg mb-8 animate-fade-in">
            {{ __('messages.location_info') }}
        </p>
        <p class="text-lg mb-8 animate-fade-in">
            {{ __('messages.contact_me') }} 
            <a href="https://wa.me/+573234542749?text={{ urlencode(__('messages.whatsapp_message_template')) }}" class="underline hover:text-blue-600">
                +57 323 454 2749
            </a> 
        </p>
       <a 
            href="https://wa.me/+573234542749?text={{ urlencode(__('messages.whatsapp_message_template')) }}" 
            class="inline-block px-8 py-4 bg-[#25D366] text-white border-4 border-black font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,0.2)] animate-slide-in"
        >
            {{ __('messages.contact_whatsapp_button') }}
        </a>
    </div>
</div>