<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Primary Meta Tags -->
        <title>Rubicon | Soluciones Empresariales para Automatización y Optimización de Procesos</title>
        <meta name="title" content="Rubicon | Transformación Digital para Medianas y Grandes Empresas">
        <meta name="description" content="Rubicon ofrece soluciones integrales para optimizar flujos de caja, gestión de inventarios, sistemas QR y automatización de procesos. Mejoramos la experiencia de usuario en sistemas empresariales.">
        <meta name="robots" content="index, follow">
        {{-- <meta name="keywords" content="automatización empresarial, flujos de caja, gestión de inventarios, sistemas QR, transformación digital, experiencia de usuario empresarial, Rubicon, optimización de procesos"> --}}
        <meta name="author" content="Rubicon Carlos González">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://rubicon-solutions.com/">
        <meta property="og:title" content="Rubicon | Soluciones Empresariales para Automatización y Eficiencia">
        <meta property="og:description" content="Expertos en consolidación de flujos de caja, gestión de inventarios y automatización de procesos para medianas y grandes empresas.">
        <meta property="og:image" content="https://rubicon-solutions.com/images/og-image.jpg">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://rubicon-solutions.com/">
        <meta property="twitter:title" content="Rubicon | Transformación Digital para Empresas">
        <meta property="twitter:description" content="Soluciones tecnológicas para optimizar procesos empresariales, flujos de caja y gestión de inventarios con sistemas QR y automatización.">
        <meta property="twitter:image" content="https://rubicon-solutions.com/images/og-image.jpg">
        
        <!-- Canonical URL -->
        <link rel="canonical" href="https://rubicon-solutions.com/">

        <meta name="theme-color" content="#000000">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/favicon.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        
        <!-- Preload critical resources -->
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap"></noscript>
    
    <!-- CSS -->
    @vite('resources/css/app.css')
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
    
    <!-- Schema.org markup for Google -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Rubicon Design Studio",
      "url": "https://rubicon-design.com",
      "logo": "https://rubicon-design.com/images/logo.png",
      "description": "Estudio de diseño especializado en interfaces neo-brutalistas",
      "sameAs": [
        "https://twitter.com/rubicon",
        "https://instagram.com/rubicon",
        "https://dribbble.com/rubicon"
      ]
    }
    </script>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white overflow-x-hidden" x-data="{ 
    mobileMenuOpen: false,
    typewriterText: '',
    fullText: 'RUBICON',
    typewriterPhase: 'typing', // typing, pausing, deleting, waiting
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
    <nav class="border-b-4 border-black py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 bg-white z-50">
        <div class="font-bold text-2xl tracking-tight">
            <span x-text="typewriterText"></span><span class="cursor"></span>
        </div>
        <div class="hidden md:flex space-x-8">
            <a wire:navigate href="/landing" class="font-medium hover:underline decoration-4 underline-offset-8 transition-all duration-300">Inicio</a>
            {{-- <a href="#about" class="font-medium hover:underline decoration-4 underline-offset-8 transition-all duration-300">About</a> --}}
            <a wire:navigate href="/galeria" class="font-medium hover:underline decoration-4 underline-offset-8 transition-all duration-300">Proyectos</a>
            <a wire:navigate href="/contactanos" class="font-medium hover:underline decoration-4 underline-offset-8 transition-all duration-300">Contáctenos</a>
        </div>
        <div class="md:hidden">
            <button 
                @click="mobileMenuOpen = !mobileMenuOpen" 
                class="p-2 border-2 border-black hover:bg-black hover:text-white transition-colors duration-300"
                aria-label="Toggle menu"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div 
        x-show="mobileMenuOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-10"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-10"
        class="md:hidden bg-white border-b-4 border-black"
        aria-hidden="true"
    >
        <div class="flex flex-col py-4 px-6">
            <a href="#" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Home</a>
            <a href="#about" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">About</a>
            <a href="#projects" class="font-medium py-3 border-b border-gray-200 hover:bg-gray-100 px-2">Projects</a>
            <a href="#contact" class="font-medium py-3 hover:bg-gray-100 px-2">Contact</a>
        </div>
    </div>

    <body>
        {{ $slot }}
    </body>

    <!-- Footer -->
    <footer class="py-12 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b-4 border-black pb-8 mb-8">
                <div class="font-bold text-3xl tracking-tight mb-6 md:mb-0">RUBICON</div>
                <div class="flex flex-col md:flex-row gap-6 md:gap-12">
                    <a href="#" class="font-medium hover:underline decoration-2 underline-offset-4 transition-all duration-300">Home</a>
                    <a href="#about" class="font-medium hover:underline decoration-2 underline-offset-4 transition-all duration-300">About</a>
                    <a href="#projects" class="font-medium hover:underline decoration-2 underline-offset-4 transition-all duration-300">Projects</a>
                    <a href="#contact" class="font-medium hover:underline decoration-2 underline-offset-4 transition-all duration-300">Contact</a>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <p>© {{ date('Y') }} Rubicon. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="https://twitter.com/rubicon" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="Twitter profile">Twitter</a>
                    <a href="https://instagram.com/rubicon" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="Instagram profile">Instagram</a>
                    <a href="https://dribbble.com/rubicon" class="hover:underline transition-all duration-300 hover:text-[#FF5252]" aria-label="Dribbble profile">Dribbble</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>