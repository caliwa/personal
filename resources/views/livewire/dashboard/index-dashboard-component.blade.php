<div>
    <!-- Hero Section -->
    <section class="py-16 md:py-24 px-6 md:px-12 border-b-4 border-black overflow-hidden">
      <div class="max-w-6xl mx-auto">
          <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight animate-slide-in">
              ELEGANT<br>NEO-BRUTALISM<br>DESIGN
          </h1>
          <div class="flex flex-col md:flex-row gap-8">
              <div class="md:w-1/2 animate-fade-in" style="animation-delay: 0.3s;">
                  <p class="text-xl mb-8">
                      Raw aesthetics meet refined functionality. A design approach that embraces honesty in materials and structure.
                  </p>
                  <a 
                      href="#projects" 
                      class="inline-block bg-black text-white px-8 py-4 font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,0.2)]"
                      x-data="{ hover: false }"
                      @mouseenter="hover = true"
                      @mouseleave="hover = false"
                      :class="{ 'bg-white text-black border-2 border-black': hover }"
                      aria-label="Explore our projects"
                  >
                      EXPLORE PROJECTS
                  </a>
              </div>
              <div 
                  class="md:w-1/2 bg-[#FF5252] h-64 md:h-auto border-4 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] animate-float animate-fade-in" 
                  style="animation-delay: 0.6s;"
                  x-data="{ hover: false }"
                  @mouseenter="hover = true"
                  @mouseleave="hover = false"
                  :class="{ 'bg-[#FF8080]': hover }"
                  role="img"
                  aria-label="Neo-brutalist design example"
              ></div>
          </div>
      </div>
  </section>

  <!-- Content Section -->
  <section id="projects" class="py-16 md:py-24 px-6 md:px-12">
      <div class="max-w-6xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 border-b-4 border-black pb-4 scroll-animate opacity-0 translate-y-10 transition-all duration-700">FEATURED WORK</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              @for ($i = 1; $i <= 3; $i++)
              <article 
                  class="border-4 border-black bg-white transform transition hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] scroll-animate opacity-0 translate-y-10 transition-all duration-700"
                  style="transition-delay: {{ ($i - 1) * 200 }}ms"
                  x-data="{ hover: false }"
                  @mouseenter="hover = true"
                  @mouseleave="hover = false"
              >
                  <div 
                      class="h-48 border-b-4 border-black transition-all duration-300"
                      :class="hover ? 'bg-[#FFE066]' : 'bg-[#FFD166]'"
                      role="img"
                      aria-label="Project {{ $i }} preview"
                  ></div>
                  <div class="p-6">
                      <h3 class="text-xl font-bold mb-2">Project {{ $i }}</h3>
                      <p class="mb-4">A brief description of this amazing project and the value it provides.</p>
                      <a 
                          href="#" 
                          class="font-bold underline decoration-2 underline-offset-4 transition-all duration-300"
                          :class="hover ? 'text-[#FF5252]' : ''"
                          aria-label="View details of Project {{ $i }}"
                      >View Details →</a>
                  </div>
              </article>
              @endfor
          </div>
      </div>
  </section>

  <!-- Features Section -->
  <section id="about" class="py-16 md:py-24 px-6 md:px-12 border-y-4 border-black bg-[#118AB2]">
      <div class="max-w-6xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 text-white scroll-animate opacity-0 translate-y-10 transition-all duration-700">WHY CHOOSE US</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              @foreach(['INNOVATION', 'QUALITY', 'EXPERTISE'] as $index => $feature)
              <article 
                  class="bg-white border-4 border-black p-8 scroll-animate opacity-0 translate-y-10 transition-all duration-700 animate-pulse-slow"
                  style="animation-delay: {{ $index * 2 }}s; transition-delay: {{ $index * 200 }}ms"
              >
                  <div class="w-16 h-16 bg-black mb-6 flex items-center justify-center">
                      @if($index == 0)
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                      @elseif($index == 1)
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      @else
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                      </svg>
                      @endif
                  </div>
                  <h3 class="text-2xl font-bold mb-4">{{ $feature }}</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </article>
              @endforeach
          </div>
      </div>
  </section>

  <!-- Counter Section -->
  <section class="py-16 md:py-24 px-6 md:px-12">
      <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
              @foreach([
                  ['count' => 150, 'label' => 'PROJECTS COMPLETED'],
                  ['count' => 85, 'label' => 'HAPPY CLIENTS'],
                  ['count' => 12, 'label' => 'YEARS EXPERIENCE']
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

  <!-- Newsletter Section -->
  <section id="contact" class="py-16 md:py-24 px-6 md:px-12 bg-[#06D6A0] border-y-4 border-black">
      <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-3xl md:text-4xl font-bold mb-6 scroll-animate opacity-0 translate-y-10 transition-all duration-700">STAY UPDATED</h2>
          <p class="text-xl mb-8 scroll-animate opacity-0 translate-y-10 transition-all duration-700" style="transition-delay: 200ms">Subscribe to our newsletter for the latest updates and insights.</p>
          <form 
              class="flex flex-col md:flex-row gap-4 scroll-animate opacity-0 translate-y-10 transition-all duration-700" 
              style="transition-delay: 400ms"
              x-data="{ email: '', submitted: false, valid: false }"
              @submit.prevent="submitted = true; valid = email.includes('@') && email.includes('.')"
          >
              <input 
                  type="email" 
                  placeholder="Your email address" 
                  class="flex-grow px-4 py-3 border-4 border-black focus:outline-none transition-all duration-300"
                  :class="{ 'border-red-500': submitted && !valid, 'border-green-500': submitted && valid }"
                  x-model="email"
                  required
                  aria-label="Email address for newsletter subscription"
              >
              <button 
                  type="submit" 
                  class="bg-black text-white px-8 py-3 font-bold text-lg transform transition hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,0.2)]"
                  :class="{ 'bg-green-600': submitted && valid }"
                  aria-label="Subscribe to newsletter"
              >
                  <span x-show="!(submitted && valid)">SUBSCRIBE</span>
                  <span x-show="submitted && valid">THANK YOU!</span>
              </button>
          </form>
          <p 
              x-data="{ show: false }"
              x-init="$watch('$store.emailForm.submitted', value => { if(value) show = true })"
              x-show="submitted && !valid" 
              class="text-red-700 mt-2 text-left md:text-center"
          >
              Please enter a valid email address.
          </p>
      </div>
  </section>
</div>
