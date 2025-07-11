<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ __('messages.meta_title_main') }}</title>
        <meta name="title" content="{{ __('messages.meta_title_main') }}">
        <meta name="description" content="{{ __('messages.meta_description_main') }}">

        <meta name="robots" content="index, follow">
        <meta name="keywords" content="{{ __('messages.meta_keywords_main') }}">
        <meta name="author" content="{{ __('messages.meta_author_main') }}">
        <meta name="geo.region" content="CO-ANT">
        <meta name="geo.placename" content="Medellín">
        <meta name="geo.position" content="6.2442;-75.5812">
        <meta name="ICBM" content="6.2442, -75.5812">
        
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://rubicon-prog.com/">
        <meta property="og:title" content="{{ __('messages.og_title_main') }}">
        <meta property="og:description" content="{{ __('messages.og_description_main') }}">
        <meta property="og:image" content="https://rubicon-prog.com/images/og-image.jpg">
        <meta property="og:locale" content="{{ app()->getLocale() == 'es' ? 'es_CO' : 'en_US' }}"> {{-- Dynamic locale --}}
        
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://rubicon-prog.com/">
        <meta property="twitter:title" content="{{ __('messages.twitter_title_main') }}">
        <meta property="twitter:description" content="{{ __('messages.twitter_description_main') }}">
        <meta property="twitter:image" content="https://rubicon-prog.com/images/og-image.jpg">
        
        <link rel="canonical" href="https://rubicon-prog.com/">

        <meta name="theme-color" content="#000000">
        
        <link rel="icon" type="image/x-icon" href="{{ asset('img/apple.ico') }}">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap"></noscript>
        @livewireStyles
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
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Rubicon",
      "alternateName": "Rubicon Medellín",
      "url": "https://rubicon-prog.com",
      "logo": "https://rubicon-prog.com/images/logo.png",
      "description": "{{ __('messages.schema_org_description') }}",
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
      "services": {!! json_encode(__('messages.services_list')) !!}, {{-- Use json_encode for arrays --}}
      "sameAs": [
        "https://www.tiktok.com/@rubicon.tech",
        "https://instagram.com/rubicon.bio"
      ]
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "@id": "https://rubicon-prog.com/#business",
      "name": "Rubicon",
      "description": "{{ __('messages.local_business_description') }}",
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
    @persist('navbar')
    <nav class="border-b-4 border-red-300/50 py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 bg-white/20 backdrop-blur-md shadow-lg shadow-red-200/20 z-50">
        <div class="font-bold text-2xl tracking-tight text-black">
            <span x-text="typewriterText"></span><span class="cursor text-black">|</span>
        </div>
        <div class="hidden md:flex space-x-8">
            <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">{{ __('messages.nav_home') }}</a>
            <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/pitch" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">{{ __('messages.nav_edugamer') }}</a>
            <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/contactanos" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">{{ __('messages.nav_contact_us') }}</a>
            <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/demo" class="font-medium text-black hover:text-red-900 hover:underline decoration-4 decoration-red-400 underline-offset-8 transition-all duration-300">{{ __('messages.nav_demo') }}</a>
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
        <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">{{ __('messages.nav_home') }}</a>
        <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/pitch" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">{{ __('messages.nav_edugamer') }}</a>
        <a wire:navigate wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/contactanos"  class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">{{ __('messages.nav_contact_us') }}</a>
        <a wire:current.exact='pointer-events-none decoration-4 decoration-red-400 text-red-900' href="/demo" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">{{ __('messages.nav_demo') }}</a>
    </div>
</div>

    <body>
        {{ $slot }}
    </body>

    <footer class="py-12 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b-4 border-black pb-8 mb-8">
                <div class="font-bold text-3xl tracking-tight mb-6 md:mb-0 text-black">RUBICON</div>
                <div class="text-sm text-gray-600">
                    <p>{{ __('messages.footer_location') }}</p>
                    <p>{{ __('messages.footer_tagline') }}</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <p>© {{ date('Y') }} Rubicon. {{ __('messages.footer_copyright') }}</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="https://www.tiktok.com/@rubicon.tech" target="_blank" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="{{ __('messages.footer_tiktok') }}">Tiktok</a>
                    <a href="https://instagram.com/rubicon.bio" target="_blank" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="{{ __('messages.footer_instagram') }}">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>
</html>