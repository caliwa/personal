@assets
    <style>
        @media print {
            .no-print { display: none !important; }
            
            .print-header {
                text-align: center;
                margin-bottom: 30px;
                border-bottom: 2px solid #333;
                padding-bottom: 20px;
            }
            
            .print-item {
                border-bottom: 1px solid #ddd;
                padding: 15px 0;
                page-break-inside: avoid;
            }
            
            .print-total {
                border-top: 2px solid #333;
                margin-top: 20px;
                padding-top: 15px;
                text-align: right;
                font-weight: bold;
                font-size: 18px;
            }
        }
    </style>
@endassets
<div class="animate-window" x-data="{ 
    isVisibleQuoteFigureSaveValidation: $wire.entangle('isVisibleQuoteFigureSaveValidation').live,
}"
@if(config('modalescapeeventlistener.is_active')) @keydown.escape.window.prevent="closeTopModal()" @endif
>
    @if($isVisibleQuoteFigureSaveValidation)
    {{-- MARK: Figure 1.2--}}
    <div x-show="isVisibleQuoteFigureSaveValidation" 
        x-effect="
        if (isVisibleQuoteFigureSaveValidation && !modalStack.includes('isVisibleQuoteFigureSaveValidation')) {
            modalStack.push('isVisibleQuoteFigureSaveValidation');
            escapeEnabled = true; removeTabTrapListener();
        } else if (!isVisibleQuoteFigureSaveValidation) {
            modalStack = modalStack.filter(id => id !== 'isVisibleQuoteFigureSaveValidation');
            const element = document.getElementById('isVisibleQuoteFigureSaveValidation');
            if(element){
                element.classList.add('fade-out-scale');
            }
        }
        focusModal(modalStack[modalStack.length - 1]);
        "
        >
        <div class="fixed top-0 left-0 w-screen h-screen bg-gray-900/50 backdrop-blur-lg"
        style="z-index: {{$zIndexModal}};"></div>
    </div>
<div x-show="isVisibleQuoteFigureSaveValidation"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90" id="isVisibleQuoteFigureSaveValidation"
     class="transform-gpu fixed inset-0 grid place-items-center p-4"
    style="z-index: {{$zIndexModal + 1}};">
  <div class="overflow-x-hidden overflow-y-auto max-w-[1200px] max-h-[850px] w-full rounded fade-in-scale">
    <!-- Header -->
<div class="bg-white w-full shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <div class="bg-blue-100 p-2 rounded-lg mr-3">
                    <i class="fas fa-tools text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Cerrajería El Progreso LL S.A.S.</h1>
                    <p class="text-sm text-blue-600 font-medium">Sistema de Cotización</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="bg-blue-50 px-4 py-2 rounded-lg">
                    <span class="text-sm text-blue-700 font-medium">
                        Items en cotización: {{ $cotizacionCount }}
                    </span>
                </div>
                @if($cotizacionTotal > 0)
                <div class="bg-green-50 px-4 py-2 rounded-lg">
                    <span class="text-sm text-green-700 font-bold">
                        Total: ${{ number_format($cotizacionTotal, 0, ',', '.') }} COP
                    </span>
                </div>
                @endif
                <!-- Botón X con SVG -->
                <button   wire:click="CloseModalClick('isVisibleQuoteFigureSaveValidation')"
                        x-on:click="isVisibleQuoteFigureSaveValidation = false" class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200" title="Cerrar cotización">
                    <svg class="w-5 h-5 text-gray-500 hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- Navigation Tabs -->
<div class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex space-x-1">
            <button 
                wire:click="$set('activeTab', 'productos')"
                class="relative py-4 px-4 font-medium text-sm transition-all duration-200 ease-in-out {{ 
                    $activeTab === 'productos' 
                    ? 'text-blue-600' 
                    : 'text-gray-500 hover:text-gray-700' 
                }} group">
                <div class="flex items-center">
                    <i class="fas fa-box mr-2 text-current"></i>
                    Productos
                </div>
                <span class="{{ $activeTab === 'productos' ? 'opacity-100' : 'opacity-0' }} absolute bottom-0 left-0 right-0 h-0.5 bg-blue-500 transform transition-all duration-300 ease-out"></span>
                <span class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-blue-400/0 via-blue-400/70 to-blue-400/0 {{ $activeTab === 'productos' ? 'opacity-100' : 'opacity-0' }} transition-opacity duration-300"></span>
            </button>

            <button 
                wire:click="$set('activeTab', 'personalizado')"
                class="relative py-4 px-4 font-medium text-sm transition-all duration-200 ease-in-out {{ 
                    $activeTab === 'personalizado' 
                    ? 'text-blue-600' 
                    : 'text-gray-500 hover:text-gray-700' 
                }} group">
                <div class="flex items-center">
                    <i class="fas fa-plus mr-2 text-current"></i>
                    Producto Personalizado
                </div>
                <span class="{{ $activeTab === 'personalizado' ? 'opacity-100' : 'opacity-0' }} absolute bottom-0 left-0 right-0 h-0.5 bg-blue-500 transform transition-all duration-300 ease-out"></span>
                <span class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-blue-400/0 via-blue-400/70 to-blue-400/0 {{ $activeTab === 'personalizado' ? 'opacity-100' : 'opacity-0' }} transition-opacity duration-300"></span>
            </button>

            <button 
                wire:click="$set('activeTab', 'cotizacion')"
                class="relative py-4 px-4 font-medium text-sm transition-all duration-200 ease-in-out {{ 
                    $activeTab === 'cotizacion' 
                    ? 'text-blue-600' 
                    : 'text-gray-500 hover:text-gray-700' 
                }} group">
                <div class="flex items-center">
                    <i class="fas fa-file-invoice mr-2 text-current"></i>
                    Cotización
                    @if($cotizacionCount > 0)
                    <span class="ml-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5 transform transition-all duration-150 ease-in-out group-hover:scale-110">{{ $cotizacionCount }}</span>
                    @endif
                </div>
                <span class="{{ $activeTab === 'cotizacion' ? 'opacity-100' : 'opacity-0' }} absolute bottom-0 left-0 right-0 h-0.5 bg-blue-500 transform transition-all duration-300 ease-out"></span>
                <span class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-blue-400/0 via-blue-400/70 to-blue-400/0 {{ $activeTab === 'cotizacion' ? 'opacity-100' : 'opacity-0' }} transition-opacity duration-300"></span>
            </button>
        </nav>
    </div>
</div>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-white">
        
        <!-- Flash Messages -->
        @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex">
                <i class="fas fa-check-circle text-green-400 mr-3 mt-0.5"></i>
                <p class="text-sm text-green-700">{{ session('message') }}</p>
            </div>
        </div>
        @endif

        @if (session()->has('cotizacion-generada'))
        <div class="mb-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex">
                <i class="fas fa-file-invoice text-blue-400 mr-3 mt-0.5"></i>
                <p class="text-sm text-blue-700">{{ session('cotizacion-generada') }}</p>
            </div>
        </div>
        @endif

        <!-- Productos Tab -->
        @if($activeTab === 'productos')
        <div class="space-y-6 bg-white">
            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Buscar productos</label>
                        <div class="relative">
                            <input 
                                type="text" 
                                wire:model.live="searchTerm"
                                placeholder="Buscar por nombre o descripción..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Category Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
                        <select 
                            wire:model.live="selectedCategory"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Todas las categorías</option>
                            @foreach($categorias as $key => $categoria)
                            <option value="{{ $key }}">{{ $categoria['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
                @foreach($categorias as $key => $categoria)
                <button 
                    wire:click="$set('selectedCategory', '{{ $key }}')"
                    class="p-4 rounded-lg border-2 transition-all duration-200 hover:shadow-md {{ 
                        $selectedCategory === $key 
                        ? 'border-' . $categoria['color'] . '-500 bg-' . $categoria['color'] . '-50' 
                        : 'border-gray-200 bg-white hover:border-gray-300' 
                    }}">
                    <i class="{{ $categoria['icon'] }} text-2xl text-{{ $categoria['color'] }}-600 mb-2"></i>
                    <p class="text-sm font-medium text-gray-900">{{ $categoria['name'] }}</p>
                </button>
                @endforeach
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($filteredProducts as $producto)
                <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow duration-200">
                    <div class="aspect-w-16 aspect-h-12 bg-gray-100 rounded-t-lg overflow-hidden">
                        <img 
                            src="{{ $producto['imagen'] }}" 
                            alt="{{ $producto['nombre'] }}"
                            class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">{{ $producto['nombre'] }}</h3>
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $categorias[$producto['categoria']]['color'] }}-100 text-{{ $categorias[$producto['categoria']]['color'] }}-800">
                                {{ $categorias[$producto['categoria']]['name'] }}
                            </span>
                        </div>
                        
                        <p class="text-sm text-gray-600 mb-3">{{ $producto['descripcion'] }}</p>
                        
                        <!-- Medidas -->
                        @if($producto['medidas']['ancho'] || $producto['medidas']['alto'] || $producto['medidas']['profundidad'])
                        <div class="flex flex-wrap gap-1 mb-3">
                            @if($producto['medidas']['ancho'])
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">A: {{ $producto['medidas']['ancho'] }}cm</span>
                            @endif
                            @if($producto['medidas']['alto'])
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">H: {{ $producto['medidas']['alto'] }}cm</span>
                            @endif
                            @if($producto['medidas']['profundidad'])
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">P: {{ $producto['medidas']['profundidad'] }}cm</span>
                            @endif
                        </div>
                        @endif
                        
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">
                                ${{ number_format($producto['precio'], 0, ',', '.') }}
                            </span>
                            <button 
                                wire:click="addToCotizacion({{ $producto['id'] }})"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                <i class="fas fa-plus mr-1"></i>
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-search text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-500">No se encontraron productos</p>
                </div>
                @endforelse
            </div>
        </div>
        @endif

        <!-- Producto Personalizado Tab -->
        @if($activeTab === 'personalizado')
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Agregar Producto Personalizado</h2>
            
            <form wire:submit.prevent="addCustomProduct" class="space-y-6 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Información básica -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nombre del producto *</label>
                            <input 
                                type="text" 
                                wire:model="productoNombre"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('productoNombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Categoría *</label>
                            <select 
                                wire:model="productoCategory"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleccionar categoría</option>
                                @foreach($categorias as $key => $categoria)
                                <option value="{{ $key }}">{{ $categoria['name'] }}</option>
                                @endforeach
                            </select>
                            @error('productoCategory') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Precio (COP) *</label>
                                <input 
                                    type="number" 
                                    wire:model="productoPrice"
                                    min="0"
                                    step="0.01"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @error('productoPrice') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cantidad *</label>
                                <input 
                                    type="number" 
                                    wire:model="productoCantidad"
                                    min="1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @error('productoCantidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Medidas y detalles -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Medidas (cm)</label>
                            <div class="grid grid-cols-3 gap-2">
                                <input 
                                    type="number" 
                                    wire:model="productoMedidas.ancho"
                                    placeholder="Ancho"
                                    min="0"
                                    step="0.1"
                                    class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <input 
                                    type="number" 
                                    wire:model="productoMedidas.alto"
                                    placeholder="Alto"
                                    min="0"
                                    step="0.1"
                                    class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <input 
                                    type="number" 
                                    wire:model="productoMedidas.profundidad"
                                    placeholder="Prof."
                                    min="0"
                                    step="0.1"
                                    class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">URL de imagen</label>
                            <input 
                                type="url" 
                                wire:model="productoImagen"
                                placeholder="https://ejemplo.com/imagen.jpg"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                            <textarea 
                                wire:model="productoDescripcion"
                                rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button 
                        type="button"
                        wire:click="resetProductForm"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Limpiar
                    </button>
                    <button 
                        type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Agregar a Cotización
                    </button>
                </div>
            </form>
        </div>
        @endif

        <!-- Cotización Tab -->
        @if($activeTab === 'cotizacion')
        <div class="space-y-6 bg-white">
            <!-- Cliente Info -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Información del Cliente</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo *</label>
                        <input 
                            type="text" 
                            wire:model="clienteName"
                            placeholder="Nombre del cliente"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('clienteName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input 
                            type="email" 
                            wire:model="clienteEmail"
                            placeholder="cliente@email.com"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('clienteEmail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Teléfono *</label>
                        <input 
                            type="tel" 
                            wire:model="clienteTelefono"
                            placeholder="+57 300 123 4567"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('clienteTelefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Items de Cotización -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Items de la Cotización</h2>
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ count($cotizacionItems) }} {{ count($cotizacionItems) == 1 ? 'item' : 'items' }}
                        </span>
                    </div>
                </div>

                @if(count($cotizacionItems) > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($cotizacionItems as $index => $item)
                    <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-center space-x-4">
                            <!-- Imagen del producto -->
                            <div class="flex-shrink-0">
                                <img 
                                    src="{{ $item['imagen'] }}" 
                                    alt="{{ $item['nombre'] }}"
                                    class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                            </div>
                            
                            <!-- Información del producto -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $item['nombre'] }}</h3>
                                        @if(isset($item['custom']) && $item['custom'])
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mt-1">
                                            <i class="fas fa-star mr-1"></i>
                                            Personalizado
                                        </span>
                                        @endif
                                        
                                        <!-- Medidas -->
                                        @if($item['medidas']['ancho'] || $item['medidas']['alto'] || $item['medidas']['profundidad'])
                                        <div class="flex flex-wrap gap-1 mt-2">
                                            @if($item['medidas']['ancho'])
                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">A: {{ $item['medidas']['ancho'] }}cm</span>
                                            @endif
                                            @if($item['medidas']['alto'])
                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">H: {{ $item['medidas']['alto'] }}cm</span>
                                            @endif
                                            @if($item['medidas']['profundidad'])
                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">P: {{ $item['medidas']['profundidad'] }}cm</span>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Precio unitario -->
                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Precio unitario</p>
                                        <p class="text-lg font-semibold text-gray-900">
                                            ${{ number_format($item['precio'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Controles de cantidad y subtotal -->
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center space-x-3">
                                        <label class="text-sm font-medium text-gray-700">Cantidad:</label>
                                        <div class="flex items-center space-x-2">
                                            <button 
                                                wire:click="updateCantidad({{ $index }}, {{ $item['cantidad'] - 1 }})"
                                                @if($item['cantidad'] <= 1) disabled @endif
                                                class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                                <i class="fas fa-minus text-xs"></i>
                                            </button>
                                            
                                            <input 
                                                type="number" 
                                                value="{{ $item['cantidad'] }}"
                                                wire:change="updateCantidad({{ $index }}, $event.target.value)"
                                                min="1"
                                                class="w-16 text-center px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            
                                            <button 
                                                wire:click="updateCantidad({{ $index }}, {{ $item['cantidad'] + 1 }})"
                                                class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                                <i class="fas fa-plus text-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center space-x-4">
                                        <!-- Subtotal -->
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">Subtotal</p>
                                            <p class="text-xl font-bold text-gray-900">
                                                ${{ number_format($item['subtotal'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                        
                                        <!-- Botón eliminar -->
                                        <button 
                                            wire:click="removeFromCotizacion({{ $index }})"
                                            class="w-10 h-10 rounded-full bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-600 hover:text-red-700 transition-colors duration-200">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Total y acciones -->
                <div class="p-6 bg-gray-50 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <p class="text-sm text-gray-600">Total de items: {{ count($cotizacionItems) }}</p>
                            <p class="text-sm text-gray-600">
                                Cantidad total: {{ collect($cotizacionItems)->sum('cantidad') }} unidades
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg text-gray-600">Total:</p>
                            <p class="text-3xl font-bold text-green-600">
                                ${{ number_format($cotizacionTotal, 0, ',', '.') }} COP
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button 
                            wire:click="$set('activeTab', 'productos')"
                            class="flex-1 px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Agregar más productos
                        </button>
                        
                        <button 
                            wire:click="generateCotizacion"
                            @if(count($cotizacionItems) == 0 || !$clienteName || !$clienteEmail || !$clienteTelefono) disabled @endif
                            class="flex-1 px-6 py-3 bg-green-600 hover:bg-green-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-file-invoice mr-2"></i>
                            Generar Cotización
                        </button>
                        
                        <button 
                            onclick="window.print()"
                            @if(count($cotizacionItems) == 0) disabled @endif
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-print mr-2"></i>
                            Imprimir
                        </button>
                    </div>
                </div>
                @else
                <!-- Estado vacío -->
                <div class="p-12 text-center">
                    <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shopping-cart text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No hay items en la cotización</h3>
                    <p class="text-gray-500 mb-6">Agrega productos desde el catálogo o crea productos personalizados</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <button 
                            wire:click="$set('activeTab', 'productos')"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-box mr-2"></i>
                            Ver Productos
                        </button>
                        <button 
                            wire:click="$set('activeTab', 'personalizado')"
                            class="px-6 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Producto Personalizado
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    <!-- Estilos adicionales para impresión -->

</div>
    </div>
    @endif
</div>
