<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>{{ $title ?? 'Título de Página' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/apple.ico') }}">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>

        <!-- Estilos Principales -->
        <link href="{{ asset('assets') }}/css/styles.css?v=1.0.3" rel="stylesheet" />
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        @livewireStyles
    </head>

<body class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500">
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0">
                    <nav
        class="absolute top-0 z-30 flex flex-wrap items-center justify-between w-full px-4 py-2 mt-6 mb-4 lg:flex-nowrap lg:justify-start
            {{ Request::is('static-sign-up') || Request::is('register')
                ? 'shadow-none'
                : 'shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200' }}">

        <div class="container flex items-center justify-between py-0 flex-wrap-inherit">

            <a class="py-2.375 text-size-sm mr-4 ml-4 whitespace-nowrap font-bold lg:ml-0 uppercase 
            
            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                href="{{ url('dashboard') }}"> Cerrajería el Progreso </a>
            <button navbar-trigger
                class="px-3 py-1 ml-2 leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-size-lg ease-soft-in-out lg:hidden"
                type="button" aria-controls="navigation" aria-expanded="false" aria-label="Alternar navegación">
                <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6-em h-6-em bg-none">
                    <span bar1
                        class="w-5.5 rounded-xs relative my-0 mx-auto block h-px transition-all duration-300
                        {{ Request::is('static-sign-up') || Request::is('register') ? 'bg-white' : 'bg-gray-600' }}
                        "></span>
                    <span bar2
                        class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px transition-all duration-300
                        {{ Request::is('static-sign-up') || Request::is('register') ? 'bg-white' : 'bg-gray-600' }}
                        "></span>
                    <span bar3
                        class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px transition-all duration-300
                        {{ Request::is('static-sign-up') || Request::is('register') ? 'bg-white' : 'bg-gray-600' }}
                        "></span>
                </span>

            </button>
            <div navbar-menu
                class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">

                    @if (auth()->user()) 
                    <li>
                        <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-size-sm lg:px-2 
                            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                            aria-current="page" href="{{ url('dashboard') }}">
                            <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                            Panel Principal
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-size-sm lg:px-2
                            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                            href="{{ url('profile') }}">
                            <i class="mr-1 fa fa-user opacity-60"></i>
                            Perfil
                        </a>
                    </li>
                    @endif



                </ul>
                <!-- botón constructor online  -->
                <!-- <li class="flex items-center">
                <a
                  class="leading-pro ease-soft-in text-fuchsia-500 border-fuchsia-500 text-size-xs tracking-tight-soft bg-150 bg-x-25 rounded-3.5xl hover:border-fuchsia-500 hover:scale-102 hover:text-fuchsia-500 active:hover:border-fuchsia-500 active:hover:scale-102 active:hover:text-fuchsia-500 active:opacity-85 active:shadow-soft-xs active:bg-fuchsia-500 active:border-fuchsia-500 mr-2 mb-0 inline-block cursor-pointer border border-solid bg-transparent py-2 px-8 text-center align-middle font-bold uppercase shadow-none transition-all hover:bg-transparent hover:opacity-75 hover:shadow-none active:scale-100 active:text-white active:hover:bg-transparent active:hover:opacity-75 active:hover:shadow-none"
                  target="_blank"
                  href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053"
                  >Constructor Online</a
                >
              </li> -->
                <ul class="hidden pl-0 mb-0 list-none lg:block lg:flex-row">
                    {{-- <li>
                        <a href="https://www.creative-tim.com/product/soft-ui-dashboard-tall" target="_blank"
                            class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-size-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase transition-all
                            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-slate-800 bg-gradient-gray' : 'text-white bg-gradient-dark-gray' }}">
                            Descarga gratuita</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
            </div>
        </div>
    </div>
    {{ $slot }}

    @livewireScripts
    <footer class="py-12">
  <div class="container">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
        <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Empresa </a>
        <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Acerca de Nosotros </a>
        <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog </a>
      </div>
      <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
        <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
          <span class="text-size-lg fab fa-dribbble"></span>
        </a>
        <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
          <span class="text-size-lg fab fa-twitter"></span>
        </a>
        <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
          <span class="text-size-lg fab fa-instagram"></span>
        </a>
        <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
          <span class="text-size-lg fab fa-pinterest"></span>
        </a>
        <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
          <span class="text-size-lg fab fa-github"></span>
        </a>
      </div>
    </div>
  </div>
</footer>
</body>

<!-- plugin para gráficos  -->
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js" async></script>
<!-- plugin para barra de desplazamiento  -->
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- botón github -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- archivo script principal  -->
<script src="{{ asset('assets') }}/js/soft-ui-dashboard-tailwind.js?v=1.0.3" async></script>
</html>