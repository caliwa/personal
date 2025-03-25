<div x-data="{
    activeCategory: 'all',
    showModal: false,
    currentProject: null,
    scrollSpeed: 1.5,
    scrollPaused: false,
    animationId: null,
    direction: 1,
    projects: [
        {
            id: 1,
            title: 'Skyline Tower',
            category: 'architecture',
            description: 'Rascacielos brutalista con 85 pisos y estructura de hormigón expuesto.',
            image: 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=800&auto=format&fit=crop&q=60',
            client: 'Urban Developments',
            year: '2023'
        },
        {
            id: 2,
            title: 'Nebula App',
            category: 'digital',
            description: 'Plataforma de diseño UI con enfoque en experiencia inmersiva.',
            image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=60',
            client: 'TechNova',
            year: '2024'
        },
        {
            id: 3,
            title: 'Volta Branding',
            category: 'branding',
            description: 'Identidad visual para marca de autos eléctricos de lujo.',
            image: 'https://images.unsplash.com/photo-1605733513597-a8f8341084e6?w=800&auto=format&fit=crop&q=60',
            client: 'Volta Motors',
            year: '2023'
        },
        {
            id: 4,
            title: 'The Concrete Journal',
            category: 'editorial',
            description: 'Publicación anual sobre arquitectura contemporánea.',
            image: 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=800&auto=format&fit=crop&q=60',
            client: 'Arch Press',
            year: '2022'
        },
        {
            id: 5,
            title: 'Luminous Hotel',
            category: 'architecture',
            description: 'Hotel boutique con fachada de cristal texturizado y acero.',
            image: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800&auto=format&fit=crop&q=60',
            client: 'Lux Hospitality',
            year: '2021'
        },
        {
            id: 6,
            title: 'Edge Dashboards',
            category: 'digital',
            description: 'Sistema de analytics para comercio electrónico.',
            image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=60',
            client: 'MarketForce',
            year: '2023'
        }
    ],
    initGallery() {
        const gallery = this.$refs.infiniteGallery;
        const galleryContent = this.$refs.galleryContent;
        
        // Duplicar contenido para efecto infinito
        galleryContent.innerHTML += galleryContent.innerHTML;
        
        const scrollGallery = () => {
            if (!gallery) return;
            
            // Reiniciar posición cuando llegue al final
            if (gallery.scrollLeft >= (galleryContent.scrollWidth/2 - gallery.clientWidth)) {
                gallery.scrollLeft = 0;
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
    },
    closeModal() {
        this.showModal = false;
        document.body.style.overflow = 'auto';
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
    <section class="relative py-24 px-6 md:px-12 border-b-4 border-black bg-[#073B4C] text-white overflow-hidden">
        <!-- Efecto de fondo dinámico -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
        </div>
        
        <div class="max-w-6xl mx-auto relative z-10">
            <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight">
                <span class="block animate-slide-in" style="animation-delay: 0.1s">SHOWCASE</span>
                <span class="block text-[#FF5252] animate-slide-in" style="animation-delay: 0.3s">GALLERY</span>
            </h1>
            <div class="flex flex-col md:flex-row gap-8 items-end">
                <div class="md:w-2/3 animate-fade-in" style="animation-delay: 0.5s;">
                    <p class="text-xl md:text-2xl mb-8">
                        Una exhibición en movimiento perpetuo de nuestros proyectos más icónicos. 
                        Cada obra cuenta una historia de innovación brutalista.
                    </p>
                </div>
                <div class="md:w-1/3 h-32 bg-[#FFD166] border-4 border-black shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] animate-float"></div>
            </div>
        </div>
    </section>

    <!-- Infinite Horizontal Gallery -->
    <section class="relative py-12 border-b-4 border-black bg-white overflow-hidden group">
        <!-- Flechas de navegación (estilo brutalista) -->
        
        <!-- Contenedor principal de la galería -->
        <div 
            x-ref="infiniteGallery"
            class="overflow-x-hidden py-8 scrollbar-hide"
            style="scroll-behavior: smooth;"
        >
            <div 
                x-ref="galleryContent"
                class="flex space-x-8 items-stretch"
            >
                <!-- Items de proyecto -->
                <template x-for="project in projects" :key="project.id">
                    <div 
                        class="flex-shrink-0 w-96 h-[28rem] border-4 border-black bg-white overflow-hidden relative transform transition-all duration-500 hover:scale-[1.02] hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] cursor-pointer group/item"
                        @click="openModal(project)"
                    >
                        <!-- Efecto de superposición -->
                        <div class="absolute inset-0 bg-black opacity-0 group-hover/item:opacity-20 transition-opacity duration-300 z-10"></div>
                        
                        <!-- Imagen del proyecto -->
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
                                    'bg-[#FF5252]': project.category === 'architecture',
                                    'bg-[#118AB2]': project.category === 'editorial'
                                }"
                            >
                                <span x-text="project.category"></span>
                            </div>
                        </div>
                        
                        <!-- Contenido textual -->
                        <div class="p-6 h-1/3 flex flex-col">
                            <h3 class="text-2xl font-bold mb-2" x-text="project.title"></h3>
                            <p class="text-sm mb-4 line-clamp-2" x-text="project.description"></p>
                            <div class="mt-auto font-bold text-xs underline decoration-2 underline-offset-4 group-hover/item:text-[#FF5252] transition-colors">
                                VIEW PROJECT →
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        
        <!-- Efecto de gradiente en los bordes -->
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
    </section>

    <!-- Project Modal -->
    <div 
        x-show="showModal" 
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
                                'bg-[#FF5252]': currentProject?.category === 'architecture',
                                'bg-[#118AB2]': currentProject?.category === 'editorial'
                            }"
                        >
                            <span x-text="currentProject?.category"></span>
                        </span>
                        <h2 class="text-3xl md:text-4xl font-bold" x-text="currentProject?.title"></h2>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold" x-text="currentProject?.year"></div>
                        <div class="text-sm uppercase tracking-widest">Year</div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-black pb-2">Project Vision</h3>
                        <p class="mb-6 text-lg leading-relaxed" x-text="currentProject?.description"></p>
                        <div class="bg-gray-100 border-2 border-black p-6">
                            <h4 class="font-bold mb-2">Challenge</h4>
                            <p>Creating a distinctive identity that combines brutalist aesthetics with functional elegance, while meeting all client requirements for usability and brand recognition.</p>
                        </div>
                    </div>
                    <div class="border-4 border-black p-6 bg-gray-50">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-black pb-2">Key Details</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Client</div>
                                <div class="text-lg" x-text="currentProject?.client"></div>
                            </div>
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Scope</div>
                                <div class="text-lg">Full design & development</div>
                            </div>
                            <div>
                                <div class="font-bold uppercase text-sm tracking-widest">Duration</div>
                                <div class="text-lg">6-9 months</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Galería secundaria -->
                <div class="mb-12">
                    <h3 class="text-xl font-bold mb-6 border-b-2 border-black pb-2">Project Gallery</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <template x-for="i in 4" :key="i">
                            <div class="border-2 border-black overflow-hidden h-40 md:h-56">
                                <img 
                                    :src="`https://source.unsplash.com/random/600x800/?architecture,design,${i}&sig=${currentProject?.id}`" 
                                    :alt="`${currentProject?.title} detail ${i}`" 
                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
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
                        CLOSE
                    </button>
                    <a 
                        href="#contact" 
                        class="px-8 py-3 border-4 border-black font-bold bg-black text-white hover:bg-[#FF5252] transition-all duration-300 flex items-center gap-2"
                    >
                        START YOUR PROJECT
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <section id="contact" class="py-24 px-6 md:px-12 bg-black border-t-4 border-black text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-6xl font-bold mb-8 leading-tight">
                <span class="block">READY TO</span>
                <span class="block text-[#FFD166]">ELEVATE YOUR BRAND?</span>
            </h2>
            <p class="text-xl mb-12 max-w-2xl mx-auto">
                Let's create something extraordinary together. Our team is ready to bring your vision to life with bold, innovative design.
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <a 
                    href="#" 
                    class="px-8 py-4 border-4 border-[#FF5252] bg-[#FF5252] text-white font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(255,82,82,0.3)]"
                >
                    GET IN TOUCH
                </a>
                <a 
                    href="#" 
                    class="px-8 py-4 border-4 border-white bg-transparent text-white font-bold text-lg transform transition hover:-translate-y-1 hover:bg-white hover:text-black"
                >
                    VIEW OUR PROCESS
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