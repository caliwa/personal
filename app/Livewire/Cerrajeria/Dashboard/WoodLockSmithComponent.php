<?php

namespace App\Livewire\Cerrajeria\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use App\Livewire\Modulos\Traits\CloseModalClickTrait;
use App\Livewire\Modulos\Traits\AdapterLivewireExceptionTrait;
use App\Livewire\Modulos\Traits\AdapterNoSymbolsCleaveZenJSTrait;
use App\Livewire\Modulos\Traits\AdapterValidateLivewireInputTrait;

class WoodLockSmithComponent extends Component
{
    use AdapterLivewireExceptionTrait,
        AdapterValidateLivewireInputTrait,
        AdapterNoSymbolsCleaveZenJSTrait,
        CloseModalClickTrait;


      // Propiedades principales
    public $activeTab = 'productos';
    public $selectedCategory = '';
    public $searchTerm = '';
    
    // Cotización actual
    #[Validate('required|string|min:3')]
    public $clienteName = '';
    
    #[Validate('required|email')]
    public $clienteEmail = '';
    
    #[Validate('required|string')]
    public $clienteTelefono = '';
    
    public $cotizacionItems = [];
    public $cotizacionTotal = 0;
    
    // Formulario de producto
    #[Validate('required|string')]
    public $productoNombre = '';
    
    #[Validate('required|numeric|min:0')]
    public $productoPrice = '';
    
    #[Validate('required|string')]
    public $productoCategory = '';
    
    #[Validate('required|numeric|min:1')]
    public $productoCantidad = 1;
    
    public $productoMedidas = [
        'ancho' => '',
        'alto' => '',
        'profundidad' => ''
    ];
    
    public $productoDescripcion = '';
    public $productoImagen = '';

    public $isVisibleQuoteFigureSaveValidation = false;
  #[On('isVisibleQuoteFigureSaveValidation')]
    public function setModalVariable($value){
        $this->ResetModalVariables();
        $this->isVisibleQuoteFigureSaveValidation = $value;
    }

    // Categorías de productos
    public $categorias = [
        'cerraduras' => [
            'name' => 'Cerraduras',
            'icon' => 'fas fa-lock',
            'color' => 'blue',
            'subcategorias' => ['Cerradura de sobreponer', 'Cerradura embutir', 'Cerradura multipunto', 'Cerradura digital']
        ],
        'llaves' => [
            'name' => 'Llaves',
            'icon' => 'fas fa-key',
            'color' => 'yellow',
            'subcategorias' => ['Llaves simples', 'Llaves maestras', 'Llaves de seguridad', 'Duplicados']
        ],
        'madera' => [
            'name' => 'Productos de Madera',
            'icon' => 'fas fa-tree',
            'color' => 'green',
            'subcategorias' => ['Mesas', 'Sillas', 'Estantes', 'Puertas de madera']
        ],
        'metal' => [
            'name' => 'Productos de Metal',
            'icon' => 'fas fa-tools',
            'color' => 'gray',
            'subcategorias' => ['Sillas metálicas', 'Estructuras', 'Pasamanos', 'Rejas']
        ],
        'vidrio' => [
            'name' => 'Vidrio y Aluminio',
            'icon' => 'fas fa-window-maximize',
            'color' => 'cyan',
            'subcategorias' => ['Cabinas de baño', 'Ventanas', 'Puertas de vidrio', 'Divisiones']
        ]
    ];

    // Productos predeterminados con las imágenes proporcionadas
    public $productos = [];

    #[On('mount-quote-figure-save-validation-modal')]
    public function mount_artificially()
    {
        $this->zIndexModal = 999;
        $this->productos = [
            [
                'id' => 1,
                'nombre' => 'Juego de Llaves Premium',
                'categoria' => 'llaves',
                'precio' => 25000,
                'imagen' => 'https://atlas-content-cdn.pixelsquid.com/stock-images/keys-key-2MZqy66-600.jpg',
                'descripcion' => 'Set de llaves de alta seguridad',
                'medidas' => ['ancho' => '5', 'alto' => '8', 'profundidad' => '0.3']
            ],
            [
                'id' => 2,
                'nombre' => 'Silla Metálica Industrial 4mm',
                'categoria' => 'metal',
                'precio' => 180000,
                'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_mASKqyX533bviwW0PYDKyqQSw735wYjqUA&s',
                'descripcion' => 'Silla de hierro resistente con acabado en pintura electrostática',
                'medidas' => ['ancho' => '20', 'alto' => '25', 'profundidad' => '8']
            ],
            [
                'id' => 3,
                'nombre' => 'Puerta de Madera Rustica',
                'categoria' => 'madera',
                'precio' => 450000,
                'imagen' => 'https://i.pinimg.com/236x/5a/1d/1a/5a1d1ad0c3ed37f19e49a681ba5f5085.jpg',
                'descripcion' => 'Puerta de comedor en madera maciza',
                'medidas' => ['ancho' => '120', 'alto' => '75', 'profundidad' => '80']
            ],
            [
                'id' => 4,
                'nombre' => 'Mesa de Madera',
                'categoria' => 'madera',
                'precio' => 120000,
                'imagen' => 'https://tugocolombia.vtexassets.com/arquivos/ids/288963/211740-2.jpg?v=638455270719130000',
                'descripcion' => 'Mesa de madera en roble con acabado natural',
                'medidas' => ['ancho' => '45', 'alto' => '85', 'profundidad' => '50']
            ],
            [
                'id' => 5,
                'nombre' => 'Manija de Puerta Premium',

                'categoria' => 'cerraduras',
                'precio' => 350000,
                'imagen' => 'https://flexoneh.com.co/wp-content/uploads/2022/07/6307A.png',
                'descripcion' => 'Manija de puerta en acero inoxidable',

                'medidas' => ['ancho' => '15', 'alto' => '20', 'profundidad' => '6']
            ],
            [
                'id' => 6,
                'nombre' => 'Cerradura Digital',

                'categoria' => 'cerraduras',
                'precio' => 85000,
                'imagen' => 'https://enchapesyapliques.com/wp-content/uploads/2021/09/150171-500x500.jpg',
                'descripcion' => 'Cerradura digital con código y tarjeta (módulo por separado)',

                'medidas' => ['ancho' => '12', 'alto' => '3', 'profundidad' => '2']
            ]
        ];
        $this->isVisibleQuoteFigureSaveValidation = true;

    }

    public function addToCotizacion($productoId)
    {
        $producto = collect($this->productos)->firstWhere('id', $productoId);
        
        if ($producto) {
            $itemExists = false;
            foreach ($this->cotizacionItems as &$item) {
                if ($item['id'] === $productoId) {
                    $item['cantidad']++;
                    $item['subtotal'] = $item['precio'] * $item['cantidad'];
                    $itemExists = true;
                    break;
                }
            }
            
            if (!$itemExists) {
                $this->cotizacionItems[] = [
                    'id' => $producto['id'],
                    'nombre' => $producto['nombre'],
                    'precio' => $producto['precio'],
                    'cantidad' => 1,
                    'subtotal' => $producto['precio'],
                    'imagen' => $producto['imagen'],
                    'medidas' => $producto['medidas']
                ];
            }
            
            $this->calculateTotal();
            session()->flash('message', 'Producto agregado a la cotización');
        }
    }

    public function removeFromCotizacion($index)
    {
        unset($this->cotizacionItems[$index]);
        $this->cotizacionItems = array_values($this->cotizacionItems);
        $this->calculateTotal();
    }

    public function updateCantidad($index, $cantidad)
    {
        if ($cantidad > 0) {
            $this->cotizacionItems[$index]['cantidad'] = $cantidad;
            $this->cotizacionItems[$index]['subtotal'] = $this->cotizacionItems[$index]['precio'] * $cantidad;
            $this->calculateTotal();
        }
    }

    public function calculateTotal()
    {
        $this->cotizacionTotal = collect($this->cotizacionItems)->sum('subtotal');
    }

    public function addCustomProduct()
    {
        $this->validate([
            'productoNombre' => 'required|string|min:3',
            'productoPrice' => 'required|numeric|min:0',
            'productoCategory' => 'required|string',
            'productoCantidad' => 'required|numeric|min:1',
        ]);

        $newId = count($this->productos) + 1;
        
        $this->cotizacionItems[] = [
            'id' => $newId,
            'nombre' => $this->productoNombre,
            'precio' => (float) $this->productoPrice,
            'cantidad' => (int) $this->productoCantidad,
            'subtotal' => (float) $this->productoPrice * (int) $this->productoCantidad,
            'imagen' => $this->productoImagen ?: 'https://via.placeholder.com/150x150?text=Producto',
            'medidas' => $this->productoMedidas,
            'descripcion' => $this->productoDescripcion,
            'custom' => true
        ];

        $this->calculateTotal();
        $this->resetProductForm();
        session()->flash('message', 'Producto personalizado agregado');
    }

    public function resetProductForm()
    {
        $this->productoNombre = '';
        $this->productoPrice = '';
        $this->productoCategory = '';
        $this->productoCantidad = 1;
        $this->productoMedidas = ['ancho' => '', 'alto' => '', 'profundidad' => ''];
        $this->productoDescripcion = '';
        $this->productoImagen = '';
    }

    public function generateCotizacion()
    {
        $this->validate([
            'clienteName' => 'required|string|min:3',
            'clienteEmail' => 'required|email',
            'clienteTelefono' => 'required|string',
        ]);

        // Aquí puedes guardar la cotización en la base de datos
        // Por ahora solo mostramos un mensaje de éxito
        
        session()->flash('cotizacion-generada', 'Cotización generada exitosamente para ' . $this->clienteName);
        
        // Reset form
        $this->clienteName = '';
        $this->clienteEmail = '';
        $this->clienteTelefono = '';
        $this->cotizacionItems = [];
        $this->cotizacionTotal = 0;
    }

    public function getFilteredProducts()
    {
        $products = collect($this->productos);
        
        if ($this->selectedCategory) {
            $products = $products->where('categoria', $this->selectedCategory);
        }
        
        if ($this->searchTerm) {
            $products = $products->filter(function ($product) {
                return stripos($product['nombre'], $this->searchTerm) !== false ||
                       stripos($product['descripcion'], $this->searchTerm) !== false;
            });
        }
        
        return $products->values()->all();
    }

        public function ResetModalVariables(){
        $this->resetErrorBag();
        $this->reset(array_keys($this->all()));
        $this->dispatch('x-unblock-open-quo-figure-save-validation');
    }
    
    public function render()
    {
        return view('livewire.cerrajeria.dashboard.wood-lock-smith-component', [
            'filteredProducts' => $this->getFilteredProducts(),
            'cotizacionCount' => count($this->cotizacionItems)
        ]);
    }
}
