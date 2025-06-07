<div x-data="{
    activeCategory: 'all',
    showModal: false,
    currentProject: null,
    scrollSpeed: 2,
    scrollPaused: false,
    animationId: null,
    direction: 1,
    projects: [
        {
            id: 1,
            title: 'Cotizador Doblamos',
            category: 'arquitectura',
            description: 'Cotizador para figuras de acero estándar y servicios',
            challenge: 'Desarrollar una plataforma intuitiva que permita a los usuarios cotizar estructuras de acero de manera rápida y precisa.',
            image: '/img/archivosrubicon/cot1.png',
            gallery: [
                '/img/archivosrubicon/cot1.png',
                '/img/archivosrubicon/cot2.png',
                '/img/archivosrubicon/cot3.png',
                '/img/archivosrubicon/cot4.png'
            ],
            client: 'Doblamos S.A.S',
            year: '2025'
        },
        {
            id: 2,
            title: 'GTT - Tecnoal',
            category: 'digital',
            description: 'Plataforma de gestión de usuarios.',
            challenge: 'Crear una interfaz de usuario intuitiva y un sistema de backend robusto para gestionar usuarios y sus datos de manera eficiente.',
            image: '/img/archivosrubicon/gtt4.png',
            gallery: [
                '/img/archivosrubicon/gtt1.png',
                '/img/archivosrubicon/gtt2.png',
                '/img/archivosrubicon/gtt3.png'
            ],
            client: 'Tecnoal S.A.S',
            year: '2024'
        },
        {
            id: 3,
            title: 'Ideas en línea Chatbot',
            category: 'branding',
            description: 'Identidad visual para diversos nichos de mercado.',
            challenge: 'Automatizar la atención al cliente mediante un chatbot que pueda responder preguntas frecuentes y guiar a los usuarios en sus compras.',
            image: '/img/archivosrubicon/ideas3.png',
            gallery: [
                '/img/archivosrubicon/ideas1.jpeg',
                '/img/archivosrubicon/ideas2.jpeg'
            ],
            client: 'Ideas en línea',
            year: '2023'
        },
        {
            id: 4,
            title: 'PDF Ahorro físico de papel',
            category: 'editorial',
            description: 'Creación de aplicación para bocetado y edición de documentos PDF.',
            challenge: 'Desarrollar una aplicación que permita a los usuarios editar y anotar documentos PDF de manera eficiente, reduciendo el uso de papel.',
            image: '/img/archivosrubicon/dob1.png',
            gallery: [
                '/img/archivosrubicon/dob2.png'
            ],
            client: 'Doblamos S.A.S',
            year: '2024'
        },
        {
            id: 5,
            title: 'Videojuego multiplataforma educativo',
            category: 'digital',
            description: 'Juego de aventuras para aprender sobre emprendimiento y finanzas.',
            challenge: 'Diseñar y desarrollar un videojuego interactivo que enseñe conceptos de emprendimiento y finanzas a través de una narrativa atractiva.',
            image: '/img/archivosrubicon/kaplayjs.png',
            gallery: [
                '/img/archivosrubicon/sonic4.png',
                '/img/archivosrubicon/kaplayjs2.png',
                '/img/archivosrubicon/kaplayjs3.jpg'
            ],
            client: 'Politécnico Colombiano JIC',
            year: '2025'
        },
        {
            id: 6,
            title: 'Cervecerías y cócteles',
            category: 'digital',
            description: 'Sistema de analytics para cervecerías y bares.',
            challenge: 'Desarrollar un sistema de análisis de datos que permita a los propietarios de cervecerías y bares entender mejor el comportamiento de sus clientes y optimizar sus operaciones.',
            image: '/img/archivosrubicon/py2.png',
            gallery: [
                '/img/archivosrubicon/py1.png',
                '/img/archivosrubicon/py3.png',
                '/img/archivosrubicon/py4.png'
            ],
            client: 'La Forja',
            year: '2024'
        }
    ],
    initGallery() {
        const gallery = this.$refs.infiniteGallery;
        const galleryContent = this.$refs.galleryContent;
        
        if (!gallery || !galleryContent) return;
        
        // Duplicar contenido para efecto infinito
        galleryContent.innerHTML += galleryContent.innerHTML;
        
        const scrollGallery = () => {
            if (!gallery) return;
            
            // Obtener el ancho de la primera mitad del contenido
            const contentWidth = galleryContent.scrollWidth / 2;
            
            // Reiniciar posición cuando llegue al final de la primera mitad
            if (gallery.scrollLeft >= contentWidth) {
                gallery.scrollLeft -= contentWidth;
            }
            
            if (!this.scrollPaused) {
                gallery.scrollLeft += this.scrollSpeed * this.direction;
            }
            
            this.animationId = requestAnimationFrame(scrollGallery);
        };
        
        // Iniciar animación
        scrollGallery();
        
        // Control de pausa
        gallery.addEventListener('mouseenter', () => {
            this.scrollPaused = true;
        });
        
        gallery.addEventListener('mouseleave', () => {
            this.scrollPaused = false;
        });
    },
    openModal(project) {
        this.currentProject = project;
        this.showModal = true;
        document.body.style.overflow = 'hidden';
        
        // Resetear scroll del modal al inicio
        this.$nextTick(() => {
            const modalContent = this.$el.querySelector('.fixed.inset-0 .overflow-y-auto');
            if (modalContent) {
                modalContent.scrollTop = 0;
            }
        });
    },
    closeModal() {
        this.showModal = false;
        document.body.style.overflow = 'auto';
        
        // Resetear scroll del modal al cerrar
        const modalContent = this.$el.querySelector('.fixed.inset-0 .overflow-y-auto');
        if (modalContent) {
            modalContent.scrollTop = 0;
        }
    },
    reverseScroll() {
        this.direction = -1;
    },
    normalScroll() {
        this.direction = 1;
    }
}" 
x-init="initGallery()"
x-on:keydown.escape="closeModal"
x-on:scroll.window="!showModal || closeModal()"
>
    <!-- Hero Section -->
    <section class="relative py-12 md:py-24 px-4 sm:px-6 md:px-12 border-b-4 border-black bg-[#0d0c0a] text-white overflow-hidden">
        <!-- Efecto de fondo dinámico -->
        <div class="max-w-6xl mx-auto relative z-10">
            <!-- Contenedor principal para el título y el fondo -->
            <div class="flex flex-col lg:flex-row">
                <!-- Título a la izquierda -->
                <div class="w-full lg:w-1/2 h-full">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-bold mb-6 md:mb-8 leading-tight">
                        <span class="block animate-slide-in" style="animation-delay: 0.1s">EXHIBICIÓN</span>
                        <span class="block text-[#FF5252] animate-slide-in" style="animation-delay: 0.3s">PORTAFOLIO</span>
                    </h1>
                </div>
                
                <!-- Logo a la derecha -->
                <div class="w-full lg:w-1/2 h-full flex justify-center lg:ml-[210px] items-center mt-8">
                    <img src="{{ asset('img/RUBICONLOGO.png') }}" alt="Rubicon Logo" 
                        class="w-48 sm:w-56 md:w-64 animate-slide-in">
                </div>
            </div>
            
            <!-- Contenido abajo -->
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-end mt-8">
                <div class="w-full md:w-2/3 animate-fade-in" style="animation-delay: 0.5s;">
                    <p class="text-lg sm:text-xl md:text-2xl mb-6 md:mb-8">
                        Una manifestación continua de ingeniería creativa. Cada proyecto establece nuevos paradigmas en la intersección digital-física.<br>
                        <span class="italic text-gray-500">(¿Puedes creer que esta pagina está en una Raspberry Pi 5?)</span>
                    </p>
                </div>

                <div class="relative w-full md:w-1/3 h-24 sm:h-28 md:h-32 bg-[#ff0000] border-4 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] sm:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] md:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] animate-float overflow-hidden">
                    <!-- Diseño de mando reconocible -->
                    <div class="absolute inset-0 flex items-center justify-center p-4">
                        <div class="relative w-full h-full max-w-[180px]">
                            <!-- Parte izquierda - Cruz direccional -->
                            <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
                                <div class="relative w-12 h-12 sm:w-14 sm:h-14 bg-black rounded-lg rotate-45">
                                    <div class="absolute inset-1 bg-[#ff0000] rounded-sm"></div>
                                    <div class="absolute top-1/2 left-1/2 w-3 h-3 transform -translate-x-1/2 -translate-y-1/2 bg-black rounded-full"></div>
                                </div>
                            </div>
                            
                            <!-- Parte derecha - Botones de acción (ABXY) -->
                            <div class="absolute right-0 top-1/2 transform -translate-y-1/2">
                                <div class="relative w-12 h-12 sm:w-14 sm:h-14">
                                    <!-- Botón A (verde) -->
                                    <div class="absolute top-0 right-0 w-5 h-5 sm:w-6 sm:h-6 bg-[#00ff00] border-2 border-black rounded-full"></div>
                                    <!-- Botón B (rojo) -->
                                    <div class="absolute bottom-0 left-0 w-5 h-5 sm:w-6 sm:h-6 bg-[#ff0000] border-2 border-black rounded-full"></div>
                                    <!-- Botón X (azul) -->
                                    <div class="absolute top-0 left-0 w-5 h-5 sm:w-6 sm:h-6 bg-[#0000ff] border-2 border-black rounded-full"></div>
                                    <!-- Botón Y (amarillo) -->
                                    <div class="absolute bottom-0 right-0 w-5 h-5 sm:w-6 sm:h-6 bg-[#ffff00] border-2 border-black rounded-full"></div>
                                </div>
                            </div>
                            
                            <!-- Botones centrales (Start/Select) -->
                            <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 flex space-x-3">
                                <div class="w-8 h-3 bg-black rounded-full"></div>
                                <div class="w-8 h-3 bg-black rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Efecto de textura/grabado sutil -->
                    <div class="absolute inset-0 bg-[repeating-linear-gradient(0deg,rgba(0,0,0,0.05),rgba(0,0,0,0.05)_1px,transparent_1px,transparent_3px)]"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-12 border-b-4 border-black bg-white overflow-hidden group">
        <div 
            x-ref="infiniteGallery"
            class="overflow-x-hidden py-8 scrollbar-hide"
            style="scroll-behavior: smooth;"
        >
            <div 
                x-ref="galleryContent"
                class="flex space-x-8 items-stretch"
            >
                <template x-for="project in projects" :key="project.id">
                    <div 
                        class="flex-shrink-0 w-96 h-[28rem] border-4 border-black bg-white overflow-hidden relative transform transition-all duration-500 hover:scale-[1.02] hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] cursor-pointer group/item"
                        @click="openModal(project)"
                    >
                        <div class="absolute inset-0 bg-black opacity-0 group-hover/item:opacity-20 transition-opacity duration-300 z-10"></div>
                        
                        <div class="relative h-2/3 overflow-hidden">
                            <img 
                                :src="project.image" 
                                :alt="project.title" 
                                class="w-full h-full object-cover transition-transform duration-700 group-hover/item:scale-105"
                            >
                            <div 
                                class="absolute bottom-4 left-4 px-6 py-3 font-bold text-white text-sm uppercase tracking-widest"
                                :class="{
                                    'bg-[#06D6A0]': project.category === 'digital',
                                    'bg-[#FFD166]': project.category === 'branding',
                                    'bg-[#FF5252]': project.category === 'arquitectura',
                                    'bg-[#118AB2]': project.category === 'editorial'
                                }"
                            >
                                <span x-text="project.category"></span>
                            </div>
                        </div>
                        
                        <div class="p-6 h-1/3 flex flex-col">
                            <h3 class="text-2xl font-bold mb-2" x-text="project.title"></h3>
                            <p class="text-sm mb-4 line-clamp-2" x-text="project.description"></p>
                            <div class="mt-auto font-bold text-xs underline decoration-2 underline-offset-4 group-hover/item:text-[#FF5252] transition-colors">
                                VER PROYECTO →
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
    </section>

    <!-- Project Modal -->
    <div 
        x-show="showModal"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
        @click.self="closeModal()"
    >
        <div 
            class="bg-white border-4 border-black w-full max-w-5xl max-h-[90vh] overflow-y-auto relative"
            x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
        >
            <!-- Botón de cerrar -->
            <button 
                @click="closeModal()" 
                class="absolute top-4 right-4 w-12 h-12 bg-black text-white flex items-center justify-center font-bold hover:bg-[#FF5252] transition-colors duration-300 z-20 border-2 border-black"
            >
                ✕
            </button>
            
            <!-- Carrusel de imágenes -->
            <div class="relative h-96 w-full overflow-hidden border-b-4 border-black">
                <img 
                    x-bind:src="currentProject?.image" 
                    x-bind:alt="currentProject?.title" 
                    class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500"
                >
            </div>
            
            <!-- Contenido del modal -->
            <div class="p-8 md:p-12">
                <div class="mb-8 flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <span 
                            class="inline-block px-6 py-3 font-bold text-white mb-4 text-sm uppercase tracking-widest"
                            :class="{
                                'bg-[#06D6A0]': currentProject?.category === 'digital',
                                'bg-[#FFD166]': currentProject?.category === 'branding',
                                'bg-[#FF5252]': currentProject?.category === 'arquitectura',
                                'bg-[#118AB2]': currentProject?.category === 'editorial'
                            }"
                        >
                            <span x-text="currentProject?.category"></span>
                        </span>
                        <h2 class="text-3xl md:text-4xl font-bold" x-text="currentProject?.title"></h2>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold" x-text="currentProject?.year"></div>
                        <div class="text-sm uppercase tracking-widest">Año</div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-black pb-2">Visión del Proyecto</h3>
                        <p class="mb-6 text-lg leading-relaxed" x-text="currentProject?.description"></p>
                        <div class="bg-gray-100 border-2 border-black p-6">
                            <h4 class="font-bold mb-2">Reto</h4>
                            <p x-text="currentProject?.challenge"></p>
                        </div>
                    </div>
                    <div class="border-4 border-black p-6 bg-gray-50">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-black pb-2">Detalles Clave</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Cliente</div>
                                <div class="text-lg" x-text="currentProject?.client"></div>
                            </div>
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Alcance</div>
                                <div class="text-lg">Diseño y desarrollo completo</div>
                            </div>
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Duración</div>
                                <div class="text-lg">6-9 meses</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Galería secundaria -->
                <div class="mb-12" x-show="currentProject?.gallery && currentProject.gallery.length > 0">
                    <h3 class="text-xl font-bold mb-6 border-b-2 border-black pb-2">Galería del Proyecto</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <template x-for="(imageUrl, index) in currentProject?.gallery" :key="index">
                            <div class="border-2 border-black overflow-hidden h-40 md:h-56">
                                <img 
                                    :src="imageUrl" 
                                    :alt="`${currentProject?.title} imagen ${index + 1}`" 
                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                    onerror="this.src='https://via.placeholder.com/400x600/cccccc/666666?text=Imagen+no+disponible'"
                                >
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Navegación -->
                <div class="flex justify-between items-center border-t-4 border-black pt-6">
                    <button 
                        @click="closeModal()" 
                        class="px-8 py-3 border-4 border-black font-bold bg-white hover:bg-gray-100 transition-all duration-300 flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        CERRAR
                    </button>
                    <a 
                        href="#contact" 
                        class="px-8 py-3 border-4 border-black font-bold bg-black text-white hover:bg-[#FF5252] transition-all duration-300 flex items-center gap-2"
                    >
                        INICIAR TU PROYECTO
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 md:py-24 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                @foreach([
                    ['count' => 140, 'label' => 'PROYECTOS COMPLETADOS'],
                    ['count' => 15, 'label' => 'CLIENTES SATISFECHOS'],
                    ['count' => 5, 'label' => 'AÑOS DE EXPERIENCIA']
                ] as $index => $counter)
                <div 
                    class="scroll-animate opacity-0 translate-y-10 transition-all duration-700"
                    style="transition-delay: {{ $index * 200 }}ms"
                    x-data="{ 
                        count: 0, 
                        target: {{ $counter['count'] }},
                        init() {
                            const observer = new IntersectionObserver((entries) => {
                                if (entries[0].isIntersecting) {
                                    const interval = setInterval(() => {
                                        if (this.count < this.target) {
                                            this.count++;
                                        } else {
                                            clearInterval(interval);
                                        }
                                    }, 2000 / this.target);
                                }
                            });
                            observer.observe(this.$el);
                        }
                    }"
                >
                    <div class="text-6xl font-bold mb-2" x-text="count"></div>
                    <div class="text-xl font-medium">{{ $counter['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section id="contact" class="py-24 px-6 md:px-12 bg-black border-t-4 border-black text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-6xl font-bold mb-8 leading-tight">
                <span class="block">¿LISTO PARA</span>
                <span class="block text-[#FFD166]">ELEVAR TU MARCA?</span>
            </h2>
            <p class="text-xl mb-12 max-w-2xl mx-auto">
                Creemos algo extraordinario juntos. Nuestro equipo está listo para dar vida a tu visión con un diseño audaz e innovador.
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <a 
                    wire:navigate
                    href="/contactanos"
                    class="px-8 py-4 border-4 border-[#FF5252] bg-[#FF5252] text-white font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(255,82,82,0.3)]"
                >
                    CONTÁCTANOS
                </a>
                <a 
                    href="/demo"
                    class="px-8 py-4 border-4 border-white bg-transparent text-white font-bold text-lg transform transition hover:-translate-y-1 hover:bg-white hover:text-black"
                >
                    VER NUESTRO PROCESO
                </a>
            </div>
        </div>
    </section>
</div>

@assets
<style>
    /* Estilos personalizados */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    @keyframes float {
        0% { transform: translateY(0px) rotate(-1deg); }
        50% { transform: translateY(-10px) rotate(1deg); }
        100% { transform: translateY(0px) rotate(-1deg); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }
</style>
@endassets