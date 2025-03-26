@assets
<!-- Required external resources -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<style>

    
    .pdf-viewer-background {
        background-color: #171725;
    }

    .top-bar {
        background: rgba(23, 23, 37, 0.1);
        color: #fff;
        padding: 3px;
        position: fixed;
        transition: background 0.3s, opacity 0.3s;
        opacity: 0.7;
    }

    .top-bar:hover {
        background: rgba(23, 23, 37, 0.9);
        opacity: 1;
    }

    .btn {
        background: rgba(255, 127, 80, 0.1);
        color: #fff;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0.5rem 2rem;
        transition: background 0.3s, opacity 0.3s;
    }

    .btn:hover {
        background: rgba(255, 127, 80, 1);
        opacity: 1;
    }

    .error {
        background: orangered;
        color: #fff;
        padding: 1rem;
        margin-top: 50vh;
    }

    #pdf-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #canvas-container {
        width: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 10px;
        position: relative;
    }

    .canvas-wrapper {
        position: relative;
        margin: auto;
    }

    #pdf_canvas {
        max-width: 100%;
        height: auto;
    }

    #drawing_canvas, #text_canvas {
        position: absolute;
        top: 0;
        left: 0;
        cursor: crosshair;
    }

    .text-input {
    position: absolute;
    background: transparent;
    border: none;
    color: black;
    font-family: Arial, sans-serif;
    outline: none;
    display: none;
    resize: none;
    white-space: nowrap;
    border: none;
    padding: 0;
    margin: 0;
    min-width: 1px; /* Esto es importante para el auto-resize */
}

    .page-info {
        text-align: center;
        margin-top: 5px;
    }

    .loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #429867;
        color: #fff;
        padding: 1rem;
        border-radius: 5px;
        display: none;
    }

    #page_num_input {
        width: 40px;
        text-align: center;
        outline: none;
        border: none;
        color: rgba(255, 255, 255, 1);
        background: rgba(255, 255, 255, 0.1);
    }

    .color-picker {
        margin: 0 10px;
        padding: 0;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .brush-size, .font-size {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: none;
        padding: 5px;
        margin: 0 10px;
        cursor: pointer;
    }

    .drawing-active, .text-active {
        background: rgba(255, 127, 80, 1) !important;
    }

    /* Loading animation styles remain the same */
    .container {
        width: 100px;
        height: 125px;
        margin: auto auto;
        position: absolute;
        top: 50%;
    }

    .loading-title {
        display: block;
        text-align: center;
        font-size: 20px;
        font-family: 'Inter', sans-serif;
        font-weight: bold;
        padding-bottom: 15px;
        color: #888;
    }

    .shape-size {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: none;
    padding: 5px;
    margin: 0 10px;
    cursor: pointer;
}

.shapes-active {
    background: rgba(255, 127, 80, 1) !important;
}


    /* Rest of the loading animation styles... */
</style>
@endassets

<div class="pdf-viewer-background">
    <div id="pdf-container">
        <div class="container" id="loading-message">
            <label class="loading-title">Cargando ...</label>
            <span class="loading-circle sp1">
                <span class="loading-circle sp2">
                    <span class="loading-circle sp3"></span>
                </span>
            </span>
        </div>

        <div id="canvas-container">
            <div class="canvas-wrapper">
                <canvas id="pdf_canvas"></canvas>
                <canvas id="drawing_canvas"></canvas>
                <canvas id="text_canvas"></canvas>
                <textarea class="text-input" id="text_input"></textarea>
            </div>
        </div>

        <div class="top-bar" id="top-bar" style="display: none;">
            <div class="container-btn">
                <button class="btn" id="prev">
                    <i class="fas fa-arrow-circle-left"></i> Anterior
                </button>
                <button class="btn" id="next">
                    Siguiente <i class="fas fa-arrow-circle-right"></i>
                </button>
    
                
                <!-- Drawing Controls -->
                <button id="toggleDraw" class="btn"><i class="fas fa-pencil-alt"></i></button>
                <button id="toggleText" class="btn"><i class="fas fa-font"></i></button>
                <button id="toggleShapes" class="btn"><i class="fas fa-shapes"></i></button>
                <select id="shapeType" class="shape-size" style="display: none;">
                    <option value="rectangle" style="color: black;">Rectángulo</option>
                    <option value="circle" style="color: black;">Círculo</option>
                    <option value="arrow" style="color: black;">Flecha</option>
                </select>
                <input type="color" id="colorPicker" value="#ff0000" class="color-picker">
                <select id="brushSize" class="brush-size">
                    <option value="1" style="color: black;">Fig. 1px</option>
                    <option value="3" style="color: black;">Fig. 3px</option>
                    <option value="5" style="color: black;">Fig. 5px</option>
                    <option value="8" style="color: black;">Fig. 8px</option>
                </select>
                <select id="fontSize" class="font-size">
                    <option value="12" style="color: black;">Trazo 12px</option>
                    <option value="16" style="color: black;">Trazo 16px</option>
                    <option value="20" style="color: black;">Trazo 20px</option>
                    <option value="24" style="color: black;">Trazo 24px</option>
                </select>
                <button id="clearCanvas" class="btn"><i class="fas fa-eraser"></i></button>
                <button id="undoBtn" class="btn"><i class="fas fa-undo"></i></button>
                <button id="downloadPdf" class="btn">
                    <i class="fas fa-download"></i> Guardar cambios y Enviar a Caja
                </button>
            </div>
            <div class="page-info">
                Página <input type="number" id="page_num_input" value="1" min="1"/> de <span id="page_count"></span>
            </div>
        </div>
    </div>

    @script
    <script>
        document.addEventListener("livewire:initialized", function() {
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

            function base64ToUint8Array(base64) {
                const raw = window.atob(base64);
                const uint8Array = new Uint8Array(raw.length);
                for (let i = 0; i < raw.length; i++) {
                    uint8Array[i] = raw.charCodeAt(i);
                }
                return uint8Array;
            }


            var archivoPDF = '{{$pdfName}}';
            var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = window.innerWidth < 768 ? 2.25 : 1.35,
                canvas = document.getElementById("pdf_canvas"),
                ctx = canvas.getContext('2d');

            // Drawing and text canvas setup
            const drawingCanvas = document.getElementById('drawing_canvas');
            const textCanvas = document.getElementById('text_canvas');
            const textInput = document.getElementById('text_input');
            const drawingCtx = drawingCanvas.getContext('2d');
            const textCtx = textCanvas.getContext('2d');
            
            const toggleDrawBtn = document.getElementById('toggleDraw');
            const toggleTextBtn = document.getElementById('toggleText');
            const colorPicker = document.getElementById('colorPicker');
            const brushSize = document.getElementById('brushSize');
            const fontSize = document.getElementById('fontSize');
            const clearCanvasBtn = document.getElementById('clearCanvas');

            const imageCanvas = document.createElement('canvas');
imageCanvas.id = 'image_canvas';
document.querySelector('.canvas-wrapper').appendChild(imageCanvas);
imageCanvas.style.position = 'absolute';
imageCanvas.style.top = '0';
imageCanvas.style.left = '0';
imageCanvas.style.pointerEvents = 'none';


// Add image button to the toolbar
// Create the dropdown container
const imageDropdownContainer = document.createElement('div');
imageDropdownContainer.style.display = 'inline-block';
imageDropdownContainer.style.position = 'relative';

// Create the main button
const imageBtn = document.createElement('button');
imageBtn.id = 'toggleImage';
imageBtn.className = 'btn';
imageBtn.innerHTML = '<i class="fas fa-image"></i>';

// Create the dropdown menu
const dropdownMenu = document.createElement('div');
dropdownMenu.className = 'image-dropdown-menu';
dropdownMenu.style.display = 'none';
dropdownMenu.style.position = 'absolute';
dropdownMenu.style.backgroundColor = '#171725';
dropdownMenu.style.border = '1px solid rgba(255, 255, 255, 0.1)';
dropdownMenu.style.borderRadius = '4px';
dropdownMenu.style.zIndex = '1000';
dropdownMenu.style.minWidth = '150px';

const option2 = document.createElement('button');
option2.className = 'dropdown-option';
option2.innerHTML = 'Modo selección imagen';
option2.onclick = function() {
    isImageMode = !isImageMode;
    if(isImageMode){
        option2.innerHTML = 'Desactivar modo selección imagen';
    }else{
        option2.innerHTML = 'Modo selección imagen';
        const images = imageHistory.get(pageNum) || [];

        images.forEach(img => {
            imageCtx.save();
            img.noStroke(imageCtx);
            imageCtx.restore();
        });
    }
    isDrawMode = false;
    isTextMode = false;
    isShapeMode = false;
    
    imageCanvas.style.pointerEvents = isImageMode ? 'auto' : 'none';
    drawingCanvas.style.pointerEvents = 'none';
    textCanvas.style.pointerEvents = 'none';
    
    imageBtn.classList.toggle('image-active');
    toggleDrawBtn.classList.remove('drawing-active');
    toggleTextBtn.classList.remove('text-active');
    toggleShapesBtn.classList.remove('shapes-active');
    dropdownMenu.style.display = 'none';
};
// Create the dropdown options
const option1 = document.createElement('button');
option1.className = 'dropdown-option';
option1.innerHTML = 'Adjuntar imagen';
option1.onclick = function(e) {
    const currentPageImages = imageHistory.get(pageNum) || [];
    if (currentPageImages.length >= 2) {
        option1.style.opacity = 0.5;
        option1.innerHTML = 'Máximo 2 imagenes por hoja';
        e.preventDefault();
        return;
    }
    option1.innerHTML = 'Adjuntar imagen';
    option1.style.opacity = 1; 

    isImageMode = true;
    isDrawMode = false;
    isTextMode = false;
    isShapeMode = false;
    
    option2.innerHTML = 'Desactivar modo selección imagen';

    imageCanvas.style.pointerEvents = isImageMode ? 'auto' : 'none';
    drawingCanvas.style.pointerEvents = 'none';
    textCanvas.style.pointerEvents = 'none';
    
    imageBtn.classList.add('image-active');
    toggleDrawBtn.classList.remove('drawing-active');
    toggleTextBtn.classList.remove('text-active');
    toggleShapesBtn.classList.remove('shapes-active');
    if (isImageMode) {
        fileInput.click();
    }
    dropdownMenu.style.display = 'none';
};



// Add styles for dropdown options by appending to existing stylesheet
const styleElement = document.createElement('style');
styleElement.textContent = `
    .image-dropdown-menu {
        margin-top: 5px;
    }
    .dropdown-option {
        display: block;
        width: 100%;
        padding: 8px 16px;
        background: none;
        border: none;
        color: white;
        text-align: left;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .dropdown-option:hover {
        background-color: rgba(255, 127, 80, 0.2);
    }
`;
document.head.appendChild(styleElement);


// Add click event to main button
imageBtn.onclick = function(e) {
    e.stopPropagation();
    dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
};

// Close dropdown when clicking outside
document.addEventListener('click', function() {
    dropdownMenu.style.display = 'none';
});

// Prevent dropdown from closing when clicking inside it
dropdownMenu.onclick = function(e) {
    e.stopPropagation();
};

// Assemble the dropdown
dropdownMenu.appendChild(option1);
dropdownMenu.appendChild(option2);
imageDropdownContainer.appendChild(imageBtn);
imageDropdownContainer.appendChild(dropdownMenu);

// Insert into the document
document.querySelector('.container-btn').insertBefore(
    imageDropdownContainer,
    document.getElementById('clearCanvas')
);

// Add file input (hidden)
const fileInput = document.createElement('input');
fileInput.type = 'file';
fileInput.accept = 'image/*';
fileInput.style.display = 'none';
document.body.appendChild(fileInput);

// Add to existing variables
let isImageMode = false;
let imageHistory = new Map();
let selectedImage = null;
let isDragging = false;
let lastX = 0;
let lastY = 0;
const imageCtx = imageCanvas.getContext('2d');

            
            let isDrawing = false;
            let isDrawMode = false;
            let isTextMode = false;
            let drawingHistory = new Map();
            let textHistory = new Map();

            // Nuevo: Variables para el historial de deshacer
            let undoStack = new Map(); // Almacena el historial por página
            let currentPath = []; // Almacena el trazo actual
            let isNewPath = true;

            const pixelRatio = window.devicePixelRatio;

            
            // Función para inicializar el historial de deshacer para una nueva página
            function initUndoStack() {
                if (!undoStack.has(pageNum)) {
                    undoStack.set(pageNum, []);
                }
            }

            function renderPage(num) {
    pageRendering = true;
    
    pdfDoc.getPage(num).then(function(page) {
        // Use a fixed scale initially
        const viewport = page.getViewport({ scale: 1.5 });
        
        // Set canvas dimensions
        canvas.width = viewport.width;
        canvas.height = viewport.height;
        
        // Render PDF page into canvas context
        const renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };

        // Update the other canvases to match dimensions
        [drawingCanvas, textCanvas, imageCanvas].forEach(canvasElement => {
            canvasElement.width = viewport.width;
            canvasElement.height = viewport.height;
            canvasElement.style.width = viewport.width + 'px';
            canvasElement.style.height = viewport.height + 'px';
        });

        page.render(renderContext).promise.then(function() {
            pageRendering = false;
            if (pageNumPending !== null) {
                renderPage(pageNumPending);
                pageNumPending = null;
            }
            initializeDrawingContext();
            loadAnnotations();
        }).catch(function(error) {
            console.error('Error rendering page:', error);
            pageRendering = false;
        });
    }).catch(function(error) {
        console.error('Error getting page:', error);
        pageRendering = false;
        document.getElementById('loading-message').style.display = 'none';
        document.getElementById('pdf-container').innerHTML = 
            `<div class="error">Error al cargar la página ${num}: ${error.message}</div>`;
    });

    document.getElementById('page_num_input').value = num;
}


// Update initialization of drawing context
function initializeDrawingContext() {
    // Configure drawing context
    drawingCtx.strokeStyle = colorPicker.value;
    drawingCtx.lineWidth = brushSize.value;
    drawingCtx.lineCap = 'round';
    drawingCtx.lineJoin = 'round';
    
    // Configure text context
    textCtx.fillStyle = colorPicker.value;
    textCtx.font = `${fontSize.value}px Arial`;
    
    // Reset transformations
    drawingCtx.setTransform(1, 0, 0, 1, 0, 0);
    textCtx.setTransform(1, 0, 0, 1, 0, 0);
}

// Modificar la función fileInput.addEventListener
fileInput.addEventListener('change', (e) => {
    if (e.target.files && e.target.files[0]) {
        const currentPageImages = imageHistory.get(pageNum) || [];
        if (currentPageImages.length >= 2) {
            alert('Máximo 2 imágenes por página');
            return;
        }

        const reader = new FileReader();
        reader.onload = (event) => {
            const img = new Image();
            img.onload = () => {
                // Obtener las dimensiones reales del canvas PDF
                const pdfWidth = canvas.width;
                const pdfHeight = canvas.height;
                
                // Calcular el 60% de las dimensiones reales
                const maxWidth = (pdfWidth / pixelRatio) * 0.6;
                const maxHeight = (pdfHeight / pixelRatio) * 0.6;
                
                // Calcular las dimensiones manteniendo la proporción
                let width = img.width;
                let height = img.height;
                
                // Ajustar si excede el ancho máximo
                if (width > maxWidth) {
                    height = (height / width) * maxWidth;
                    width = maxWidth;
                }
                
                // Ajustar si aún excede el alto máximo
                if (height > maxHeight) {
                    width = (width / height) * maxHeight;
                    height = maxHeight;
                }
                
                // Crear nueva imagen con dimensiones ajustadas
                const newImage = new PDFImage(
                    img,
                    50 * pixelRatio, // Posición inicial ajustada
                    50 * pixelRatio,
                    width * pixelRatio, // Dimensiones ajustadas
                    height * pixelRatio
                );
                
                if (!imageHistory.has(pageNum)) {
                    imageHistory.set(pageNum, []);
                }
                imageHistory.get(pageNum).push(newImage);
                redrawImages();
                
                // Update undo stack
                initUndoStack();
                undoStack.get(pageNum).push({
                    type: 'image',
                    imageData: event.target.result,
                    x: newImage.x,
                    y: newImage.y,
                    width: newImage.width,
                    height: newImage.height
                });
            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    }
    fileInput.value = '';
});

// Modificar la clase PDFImage para manejar el escalado correctamente
class PDFImage {
    constructor(image, x, y, width, height) {
        this.image = image;
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;
        this.selected = false;
        this.resizing = false;
        this.originalWidth = width / pixelRatio;  // Guardar dimensiones originales
        this.originalHeight = height / pixelRatio;
    }

    draw(ctx) {
        // Ajustar el contexto para dibujar con el escalado correcto
        ctx.save();
        ctx.scale(1/pixelRatio, 1/pixelRatio);
        
        // Dibujar la imagen con coordenadas y dimensiones escaladas
        ctx.drawImage(
            this.image, 
            this.x,
            this.y,
            this.width,
            this.height
        );
        
        if (this.selected) {
            ctx.strokeStyle = '#00ff00';
            ctx.lineWidth = 2 * pixelRatio;
            ctx.strokeRect(this.x, this.y, this.width, this.height);
            
            ctx.fillStyle = '#00ff00';
            ctx.fillRect(
                this.x + this.width - (10 * pixelRatio),
                this.y + this.height - (10 * pixelRatio),
                10 * pixelRatio,
                10 * pixelRatio
            );
        }
        
        ctx.restore();
    }

    noStroke(ctx) {
        // Ajustar el contexto para dibujar con el escalado correcto
        ctx.save();
        ctx.scale(1/pixelRatio, 1/pixelRatio);

        ctx.clearRect(this.x - 1, this.y - 1, this.width + 2, 2);
        // Borde inferior
        ctx.clearRect(this.x - 1, this.y + this.height - 1, this.width + 2, 2);
        // Borde izquierdo
        ctx.clearRect(this.x - 1, this.y, 2, this.height);
        // Borde derecho
        ctx.clearRect(this.x + this.width - 1, this.y, 2, this.height);
        
        // Limpiar el cuadrado de redimensionamiento
        ctx.clearRect(
            this.x + this.width - (10 * pixelRatio),
            this.y + this.height - (10 * pixelRatio),
            10 * pixelRatio,
            10 * pixelRatio
        );
        // Solo dibujar la imagen sin los elementos de selección
        ctx.drawImage(
            this.image, 
            this.x,
            this.y,
            this.width,
            this.height
        );
        
        ctx.restore();
    }


    isInside(x, y) {
        const scaledX = x * pixelRatio;
        const scaledY = y * pixelRatio;
        return (
            scaledX >= this.x &&
            scaledX <= this.x + this.width &&
            scaledY >= this.y &&
            scaledY <= this.y + this.height
        );
    }

    isOnResizeHandle(x, y) {
        const scaledX = x * pixelRatio;
        const scaledY = y * pixelRatio;
        return (
            scaledX >= this.x + this.width - (10 * pixelRatio) &&
            scaledX <= this.x + this.width &&
            scaledY >= this.y + this.height - (10 * pixelRatio) &&
            scaledY <= this.y + this.height
        );
    }

    getPDFDimensions() {
        return {
            x: this.x / pixelRatio,
            y: this.y / pixelRatio,
            width: this.width / pixelRatio,
            height: this.height / pixelRatio
        };
    }
}

            function initializeCanvases() {
                // Initialize drawing canvas
                drawingCanvas.style.width = canvas.style.width;
                drawingCanvas.style.height = canvas.style.height;
                drawingCanvas.width = canvas.width;
                drawingCanvas.height = canvas.height;
                drawingCtx.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
                drawingCtx.strokeStyle = colorPicker.value;
                drawingCtx.lineWidth = brushSize.value * pixelRatio;
                drawingCtx.lineCap = 'round';
                drawingCtx.lineJoin = 'round';

                // Initialize text canvas
                textCanvas.style.width = canvas.style.width;
                textCanvas.style.height = canvas.style.height;
                textCanvas.width = canvas.width;
                textCanvas.height = canvas.height;
                textCtx.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
                textCtx.fillStyle = colorPicker.value;
                textCtx.font = `${fontSize.value}px Arial`;
                
                imageCanvas.style.width = canvas.style.width;
    imageCanvas.style.height = canvas.style.height;
    imageCanvas.width = canvas.width;
    imageCanvas.height = canvas.height;
    imageCtx.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
            }

            function saveAnnotations() {
    drawingHistory.set(pageNum, drawingCanvas.toDataURL());
    textHistory.set(pageNum, textCanvas.toDataURL());
    
    // Save image data
    if (!imageHistory.has(pageNum)) {
        imageHistory.set(pageNum, []);
    }
    const pageImages = imageHistory.get(pageNum);
    pageImages.forEach(img => {
        img.selected = false;
    });
    redrawImages();
}

function redrawImages() {
    imageCtx.clearRect(0, 0, imageCanvas.width, imageCanvas.height);
    if (imageHistory.has(pageNum)) {
        const images = imageHistory.get(pageNum);
        if (images.length >= 2) {
            // Optional: Add a visual indicator or log
            console.warn('Límite de imágenes alcanzado (2 por página)');
        }

        images.forEach(img => {
            imageCtx.save();
            img.draw(imageCtx);
            imageCtx.restore();
        });
    }
}


            function loadAnnotations() {
                // Load drawings
                const drawing = drawingHistory.get(pageNum);
                if (drawing) {
                    const imgDraw = new Image();
                    imgDraw.onload = () => {
                        drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
                        drawingCtx.drawImage(imgDraw, 0, 0);
                    };
                    imgDraw.src = drawing;
                } else {
                    drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
                }

                // Load text
                const text = textHistory.get(pageNum);
                if (text) {
                    const imgText = new Image();
                    imgText.onload = () => {
                        textCtx.clearRect(0, 0, textCanvas.width, textCanvas.height);
                        textCtx.drawImage(imgText, 0, 0);
                    };
                    imgText.src = text;
                } else {
                    textCtx.clearRect(0, 0, textCanvas.width, textCanvas.height);
                }

                if (imageHistory.has(pageNum)) {
        redrawImages();
    }
            }

            // Text mode handlers
            toggleTextBtn.addEventListener('click', () => {
    isTextMode = !isTextMode;
    isDrawMode = false;
    isShapeMode = false;
    textCanvas.style.pointerEvents = isTextMode ? 'auto' : 'none';
    drawingCanvas.style.pointerEvents = 'none';
    toggleTextBtn.classList.toggle('text-active');
    imageBtn.classList.remove('image-active');
    toggleDrawBtn.classList.remove('drawing-active');
    toggleShapesBtn.classList.remove('shapes-active');
    textInput.style.display = 'none';
    shapeTypeSelect.style.display = 'none';

    const images = imageHistory.get(pageNum) || [];

    images.forEach(img => {
        imageCtx.save();
        img.noStroke(imageCtx);
        imageCtx.restore();
    });

    isDragging = false;
    isImageMode = false;
    imageCanvas.style.pointerEvents = 'none';
    images.forEach(img => img.selected = false);
    option2.innerHTML = 'Modo selección imagen';

});

// Agregar después de la definición de textInput
function autoResizeTextInput() {
    // Crear un elemento div temporal oculto
    const tempDiv = document.createElement('div');
    tempDiv.style.position = 'absolute';
    tempDiv.style.top = '-9999px';
    tempDiv.style.left = '-9999px';
    tempDiv.style.width = 'auto';
    tempDiv.style.whiteSpace = 'nowrap';
    tempDiv.style.font = window.getComputedStyle(textInput).font;
    document.body.appendChild(tempDiv);
    
    // Función para actualizar el ancho
    function updateWidth() {
        tempDiv.textContent = textInput.value || ' '; // Usa espacio si está vacío
        const width = tempDiv.offsetWidth;
        textInput.style.width = `${width + 2}px`; // +2 para un pequeño padding
    }
    
    // Actualizar el ancho cuando se escribe
    textInput.addEventListener('input', updateWidth);
    
    // Limpiar
    textInput.addEventListener('blur', () => {
        document.body.removeChild(tempDiv);
    });
    
    // Inicializar el ancho
    updateWidth();
}

// Modificar el evento click del textCanvas para incluir el auto-resize
textCanvas.addEventListener('click', (e) => {
    if (!isTextMode) return;
    
    const rect = textCanvas.getBoundingClientRect();
    const x = (e.clientX - rect.left) * (textCanvas.width / rect.width) / pixelRatio;
    const y = (e.clientY - rect.top) * (textCanvas.height / rect.height) / pixelRatio;
    
    textInput.style.display = 'block';
    textInput.style.left = (e.clientX - rect.left) + 'px';
    textInput.style.top = (e.clientY - rect.top) + 'px';
    textInput.style.color = colorPicker.value;
    textInput.style.fontSize = fontSize.value + 'px';
    textInput.focus();
    
    textInput.dataset.canvasX = x;
    textInput.dataset.canvasY = y;
    
    // Iniciar el auto-resize
    autoResizeTextInput();
});

textInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        e.preventDefault(); // Prevent new line
        textInput.blur();  // This will trigger the blur event and add the text
    }

});

document.addEventListener('keydown', function(event) {
    // Verificar si se presionó Ctrl + Z
    if (event.ctrlKey && event.key === 'z' && !isTextMode) {
        undo();
    }
    if (event.key === 'Escape') {
        imageBtn.classList.remove('image-active');
        toggleTextBtn.classList.remove('text-active');
        toggleShapesBtn.classList.remove('shapes-active');
        toggleDrawBtn.classList.remove('drawing-active');
        isDrawing = false;
        isDrawMode = false;
        isTextMode = false;
    }
});


textInput.addEventListener('blur', () => {
        if (textInput.value.trim() !== '') {
            const rect = textCanvas.getBoundingClientRect();
            const x = parseFloat(textInput.dataset.canvasX);
            const y = parseFloat(textInput.dataset.canvasY);
            
            initUndoStack();
            const textData = {
                type: 'text',
                x: x,
                y: y,
                text: textInput.value,
                color: colorPicker.value,
                fontSize: fontSize.value
            };
            undoStack.get(pageNum).push(textData);
            
            textCtx.save();
            textCtx.scale(pixelRatio, pixelRatio);
            textCtx.fillStyle = colorPicker.value;
            textCtx.font = `${fontSize.value}px Arial`;
            textCtx.fillText(textInput.value, x, y + parseInt(fontSize.value));
            textCtx.restore();
        }
        textInput.style.display = 'none';
        textInput.value = '';
        saveAnnotations();
    });



// Mouse event handlers for image manipulation
imageCanvas.addEventListener('mousedown', (e) => {
    if (!isImageMode) return;
    
    const rect = imageCanvas.getBoundingClientRect();
    const scaleX = imageCanvas.width / rect.width;
    const scaleY = imageCanvas.height / rect.height;
    const x = (e.clientX - rect.left) * scaleX;
    const y = (e.clientY - rect.top) * scaleY;
    
    const images = imageHistory.get(pageNum) || [];
    // Check images in reverse order (top to bottom)
    for (let i = images.length - 1; i >= 0; i--) {
        const img = images[i];
        if (img.selected && img.isOnResizeHandle(x, y)) {
            img.resizing = true;
            isDragging = false;
            lastX = x;
            lastY = y;
            return;
        }
        if (img.isInside(x, y)) {
            images.forEach(i => i.selected = false);
            img.selected = true;
            selectedImage = img;
            isDragging = true;
            lastX = x;
            lastY = y;
            redrawImages();
            return;
        }
    }
    
    // Deselect if clicked outside
    images.forEach(img => img.selected = false);
    selectedImage = null;
    redrawImages();
});

imageCanvas.addEventListener('mousemove', (e) => {
    if (!isImageMode || (!isDragging && !selectedImage?.resizing)) return;
    
    const rect = imageCanvas.getBoundingClientRect();
    const scaleX = imageCanvas.width / rect.width;
    const scaleY = imageCanvas.height / rect.height;
    const x = (e.clientX - rect.left) * scaleX;
    const y = (e.clientY - rect.top) * scaleY;
    
    if (selectedImage.resizing) {
        const dx = (x - lastX) * pixelRatio;
        const dy = (y - lastY) * pixelRatio;
        
        const maxWidth = imageCanvas.width * 0.6;
        const maxHeight = imageCanvas.height * 0.6;
        
        selectedImage.width = Math.min(
            Math.max(50 * pixelRatio, selectedImage.width + dx),
            maxWidth
        );
        selectedImage.height = Math.min(
            Math.max(50 * pixelRatio, selectedImage.height + dy),
            maxHeight
        );
    } else if (isDragging) {
        const dx = (x - lastX) * pixelRatio;
        const dy = (y - lastY) * pixelRatio;
        
        const newX = selectedImage.x + dx;
        const newY = selectedImage.y + dy;
        
        if (newX >= 0 && newX + selectedImage.width <= imageCanvas.width * pixelRatio) {
            selectedImage.x = newX;
        }
        if (newY >= 0 && newY + selectedImage.height <= imageCanvas.height * pixelRatio) {
            selectedImage.y = newY;
        }
    }
    
    lastX = x;
    lastY = y;
    redrawImages();
});

imageCanvas.addEventListener('mouseup', () => {
    if (selectedImage?.resizing || isDragging) {
        // Add to undo stack
        initUndoStack();
        undoStack.get(pageNum).push({
            type: 'imageUpdate',
            imageIndex: imageHistory.get(pageNum).indexOf(selectedImage),
            x: selectedImage.x,
            y: selectedImage.y,
            width: selectedImage.width,
            height: selectedImage.height
        });
    }
    
    isDragging = false;
    if (selectedImage) {
        selectedImage.resizing = false;
    }
});
     // Función para deshacer la última acción
function undo() {
    if (!undoStack.has(pageNum) || undoStack.get(pageNum).length === 0) return;

    const pageStack = undoStack.get(pageNum);
    const lastAction = pageStack[pageStack.length - 1];
    
    if (lastAction.type === 'image') {
        const images = imageHistory.get(pageNum) || [];
        images.pop();
        imageHistory.set(pageNum, images);
    } else if (lastAction.type === 'imageUpdate') {
        const images = imageHistory.get(pageNum);
        const img = images[lastAction.imageIndex];
        // You might want to store previous state in the undo stack
        // For now, we'll just remove the image
        images.splice(lastAction.imageIndex, 1);
    }
    
    pageStack.pop();
    redrawFromUndoStack();
    redrawImages();
    saveAnnotations();
    const currentPageImages = imageHistory.get(pageNum) || [];
    if (currentPageImages.length < 2) {
        option1.innerHTML = 'Adjuntar imagen';
        option1.style.opacity = 1; 
    }
}

const style = document.createElement('style');
style.textContent = `
.image-active {
    background: rgba(255, 127, 80, 1) !important;
}
`;
document.head.appendChild(style);

            // Drawing mode handlers
toggleDrawBtn.addEventListener('click', () => {
    isDrawMode = !isDrawMode;
    isTextMode = false;
    isShapeMode = false;
    drawingCanvas.style.pointerEvents = isDrawMode ? 'auto' : 'none';
    textCanvas.style.pointerEvents = 'none';
    toggleDrawBtn.classList.toggle('drawing-active');
    imageBtn.classList.remove('image-active');
    toggleTextBtn.classList.remove('text-active');
    toggleShapesBtn.classList.remove('shapes-active');
    textInput.style.display = 'none';
    shapeTypeSelect.style.display = 'none';

    isDragging = false;
    isImageMode = false;
    imageCanvas.style.pointerEvents = 'none';
    const images = imageHistory.get(pageNum) || [];
        
    images.forEach(img => img.selected = false);
    images.forEach(img => {
            imageCtx.save();
            img.noStroke(imageCtx);
            imageCtx.restore();
        });

    option2.innerHTML = 'Modo selección imagen';


});

// Modificar las funciones de dibujo para usar la escala correcta
function startDrawing(e) {
    if (!isDrawMode && !isShapeMode) return;
    isDrawing = true;
    isNewPath = true;
    
    const rect = drawingCanvas.getBoundingClientRect();
    const x = e.offsetX * (drawingCanvas.width / rect.width);
    const y = e.offsetY * (drawingCanvas.height / rect.height);
    
    if (isShapeMode) {
        shapeStartX = x;
        shapeStartY = y;
        // Store the current canvas state before drawing new shape
        currentPath = [];
    } else {
        currentPath = [{x, y}];
        drawingCtx.beginPath();
        drawingCtx.moveTo(x, y);
    }
}


function draw(e) {
    if (!isDrawing) return;
    
    const rect = drawingCanvas.getBoundingClientRect();
    const x = e.offsetX * (drawingCanvas.width / rect.width);
    const y = e.offsetY * (drawingCanvas.height / rect.height);
    
    if (isShapeMode) {
        drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
        redrawFromUndoStack();
        
        // Vista previa de la forma actual
        drawingCtx.save();
        drawShape(
            shapeTypeSelect.value,
            shapeStartX,
            shapeStartY,
            x,
            y,
            drawingCtx,
            colorPicker.value,
            brushSize.value
        );
        drawingCtx.restore();
    } else if (isDrawMode) {
        currentPath.push({x, y});
        drawingCtx.lineTo(x, y);
        drawingCtx.stroke();
    }
}



function stopDrawing(e) {
    if (!isDrawing) return;
    isDrawing = false;
    
    if (isShapeMode) {
        const rect = drawingCanvas.getBoundingClientRect();
        const endX = e.offsetX * (drawingCanvas.width / rect.width);
        const endY = e.offsetY * (drawingCanvas.height / rect.height);
        
        initUndoStack();
        const shapeData = {
            type: 'shape',
            shape: shapeTypeSelect.value,
            startX: shapeStartX,
            startY: shapeStartY,
            endX: endX,
            endY: endY,
            color: colorPicker.value,
            lineWidth: brushSize.value // Guardar el grosor actual
        };
        undoStack.get(pageNum).push(shapeData);
        
        // Dibujar la figura final con su color y grosor específicos
        drawShape(shapeTypeSelect.value, shapeStartX, shapeStartY, endX, endY, drawingCtx, shapeData.color, shapeData.lineWidth);
    } else if (currentPath.length > 1) {
        initUndoStack();
        const pathData = {
            type: 'drawing',
            points: currentPath,
            color: colorPicker.value,
            lineWidth: brushSize.value
        };
        undoStack.get(pageNum).push(pathData);
    }
    
    drawingCtx.closePath();
    saveAnnotations();
    currentPath = [];
}

            // Mouse events
            drawingCanvas.addEventListener('mousedown', startDrawing);
            drawingCanvas.addEventListener('mousemove', draw);
            drawingCanvas.addEventListener('mouseup', stopDrawing);
            drawingCanvas.addEventListener('mouseout', stopDrawing);

            // Touch events
// También actualizar los event listeners para touch events
drawingCanvas.addEventListener('touchstart', (e) => {
    e.preventDefault();
    const touch = e.touches[0];
    const rect = drawingCanvas.getBoundingClientRect();
    const scaleX = drawingCanvas.width / rect.width;
    const scaleY = drawingCanvas.height / rect.height;
    
    // Calcular las coordenadas correctas considerando el escalado
    const x = (touch.clientX - rect.left) * scaleX;
    const y = (touch.clientY - rect.top) * scaleY;
    
    if (isShapeMode) {
        isDrawing = true;
        shapeStartX = x;
        shapeStartY = y;
        currentPath = [];
    } else if (isDrawMode) {
        isDrawing = true;
        currentPath = [{x, y}];
        drawingCtx.beginPath();
        drawingCtx.moveTo(x, y);
    }
});


drawingCanvas.addEventListener('touchmove', (e) => {
    e.preventDefault();
    if (!isDrawing) return;
    
    const touch = e.touches[0];
    const rect = drawingCanvas.getBoundingClientRect();
    const scaleX = drawingCanvas.width / rect.width;
    const scaleY = drawingCanvas.height / rect.height;
    
    // Calcular las coordenadas correctas considerando el escalado
    const x = (touch.clientX - rect.left) * scaleX;
    const y = (touch.clientY - rect.top) * scaleY;
    
    if (isShapeMode) {
        drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
        redrawFromUndoStack();
        drawShape(shapeTypeSelect.value, shapeStartX, shapeStartY, x, y, drawingCtx, colorPicker.value);
    } else if (isDrawMode) {
        currentPath.push({x, y});
        drawingCtx.lineTo(x, y);
        drawingCtx.stroke();
    }
});
drawingCanvas.addEventListener('touchend', (e) => {
    e.preventDefault();
    if (!isDrawing) return;
    
    const touch = e.changedTouches[0];
    const rect = drawingCanvas.getBoundingClientRect();
    const scaleX = drawingCanvas.width / rect.width;
    const scaleY = drawingCanvas.height / rect.height;
    
    // Calcular las coordenadas correctas considerando el escalado
    const x = (touch.clientX - rect.left) * scaleX;
    const y = (touch.clientY - rect.top) * scaleY;
    
    if (isShapeMode) {
        initUndoStack();
        const shapeData = {
            type: 'shape',
            shape: shapeTypeSelect.value,
            startX: shapeStartX,
            startY: shapeStartY,
            endX: x,
            endY: y,
            color: colorPicker.value,
            lineWidth: drawingCtx.lineWidth
        };
        undoStack.get(pageNum).push(shapeData);
        drawShape(shapeTypeSelect.value, shapeStartX, shapeStartY, x, y, drawingCtx, shapeData.color);
    } else if (currentPath.length > 1) {
        initUndoStack();
        const pathData = {
            type: 'drawing',
            points: currentPath,
            color: colorPicker.value,
            lineWidth: drawingCtx.lineWidth
        };
        undoStack.get(pageNum).push(pathData);
    }
    
    isDrawing = false;
    drawingCtx.closePath();
    saveAnnotations();
    currentPath = [];
});

            // Control event listeners
            brushSize.addEventListener('change', () => {
                drawingCtx.lineWidth = brushSize.value * pixelRatio;
            });

            colorPicker.addEventListener('change', () => {
                drawingCtx.strokeStyle = colorPicker.value;
                textCtx.fillStyle = colorPicker.value;
            });

            fontSize.addEventListener('change', () => {
                textCtx.font = `${fontSize.value}px Arial`;
            });
            undoBtn.addEventListener('click', undo);

// Modificar la función clearCanvas para limpiar también el historial de deshacer
clearCanvasBtn.addEventListener('click', () => {
    drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
    textCtx.clearRect(0, 0, textCanvas.width, textCanvas.height);
    imageCtx.clearRect(0, 0, imageCanvas.width, imageCanvas.height);
    drawingHistory.delete(pageNum);
    textHistory.delete(pageNum);
    imageHistory.delete(pageNum);
    undoStack.set(pageNum, []); // Limpiar el historial de deshacer
    const currentPageImages = imageHistory.get(pageNum) || [];
    if (currentPageImages.length < 2) {
        option1.innerHTML = 'Adjuntar imagen';
        option1.style.opacity = 1;
    }
});


            // PDF navigation handlers
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            function onPrevPage() {
                option1.innerHTML = 'Adjuntar imagen';
                option1.style.opacity = 1;
                isDragging = false;
                isImageMode = false;
                isDrawMode = false;
                isTextMode = false;
                isShapeMode = false;
                selectedImage = null;
                const images = imageHistory.get(pageNum) || [];
                images.forEach(img => img.selected = false);
                imageCanvas.style.pointerEvents = 'none';
                drawingCanvas.style.pointerEvents = 'none';
                textCanvas.style.pointerEvents = 'none';
                toggleTextBtn.classList.remove('text-active');
                toggleShapesBtn.classList.remove('shapes-active');
                toggleDrawBtn.classList.remove('drawing-active');
                imageBtn.classList.remove('image-active');
                option2.innerHTML = 'Modo selección imagen';
                if (pageNum <= 1) return;
                pageNum--;
                queueRenderPage(pageNum);
                
            }

            function onNextPage() {
                option1.innerHTML = 'Adjuntar imagen';
                option1.style.opacity = 1;
                isDragging = false;
                isImageMode = false;
                isDrawMode = false;
                isTextMode = false;
                isShapeMode = false;
                selectedImage = null;
                const images = imageHistory.get(pageNum) || [];
                images.forEach(img => img.selected = false);
                imageCanvas.style.pointerEvents = 'none';
                drawingCanvas.style.pointerEvents = 'none';
                textCanvas.style.pointerEvents = 'none';
                toggleTextBtn.classList.remove('text-active');
                toggleShapesBtn.classList.remove('shapes-active');
                toggleDrawBtn.classList.remove('drawing-active');
                imageBtn.classList.remove('image-active');
                option2.innerHTML = 'Modo selección imagen';
                if (pageNum >= pdfDoc.numPages) return;
                pageNum++;
                queueRenderPage(pageNum);
                
            }

            // Page input handler
            document.getElementById('page_num_input').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    const inputPageNum = parseInt(this.value, 10);
                    if (inputPageNum >= 1 && inputPageNum <= pdfDoc.numPages) {
                        pageNum = inputPageNum;
                        queueRenderPage(pageNum);
                    } else {
                        alert(`Por favor, ingrese un número de página válido (1 - ${pdfDoc.numPages}).`);
                    }
                }
            });

            // PDF navigation button handlers
            document.getElementById('prev').addEventListener('click', onPrevPage);
            document.getElementById('next').addEventListener('click', onNextPage);
            // document.getElementById('zoomOut').addEventListener('click', zoomOut);
            // document.getElementById('zoomIn').addEventListener('click', zoomIn);

            const pdfData = base64ToUint8Array('{{ $pdfBase64 }}');

            // Initialize PDF
            function loadPDF() {
    document.getElementById('loading-message').style.display = 'block';
    
    // Add loading options
    const loadingTask = pdfjsLib.getDocument({
        data: pdfData,
        cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/cmaps/',
        cMapPacked: true,
        disableFontFace: false,
        nativeImageDecoderSupport: 'all'
    });

    loadingTask.promise
        .then((pdfDoc_) => {
            pdfDoc = pdfDoc_;
            document.getElementById('loading-message').style.display = 'none';
            document.getElementById('top-bar').style.display = 'block';
            document.getElementById('page_count').textContent = pdfDoc.numPages;
            
            // Add initial render delay
            setTimeout(() => renderPage(pageNum), 100);
        })
        .catch((error) => {
            console.error('Error loading PDF:', error);
            document.getElementById('loading-message').style.display = 'none';
            document.getElementById('pdf-container').innerHTML = 
                `<div class="error">Error al cargar el PDF: ${error.message}</div>`;
        });
}

            loadPDF();
            
            // Prevent right-click context menu
            document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
            });

            const downloadBtn = document.getElementById('downloadPdf');
    
            downloadBtn.addEventListener('click', async () => {
    try {
        downloadBtn.disabled = true;
        downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';

        saveAnnotations();

        const pdfBytes = await pdfDoc.getData();
        const pdfBase64 = arrayBufferToBase64(pdfBytes);

        let allAnnotations = [];
        for (let i = 1; i <= pdfDoc.numPages; i++) {
            // Crear un canvas temporal con las dimensiones exactas del PDF
            const tempCanvas = document.createElement('canvas');
            const viewport = await pdfDoc.getPage(i).then(page => page.getViewport({ scale: 1.5 }));
            tempCanvas.width = viewport.width;
            tempCanvas.height = viewport.height;
            const tempCtx = tempCanvas.getContext('2d');

            // Dibujar todas las imágenes para esta página
            if (imageHistory.has(i)) {
                const images = imageHistory.get(i);
                images.forEach(img => {
                    // Convertir las coordenadas y dimensiones al espacio del PDF
                    const pdfX = img.x / pixelRatio;
                    const pdfY = img.y / pixelRatio;
                    const pdfWidth = img.width / pixelRatio;
                    const pdfHeight = img.height / pixelRatio;

                    tempCtx.drawImage(
                        img.image,
                        pdfX,
                        pdfY,
                        pdfWidth,
                        pdfHeight
                    );
                });
            }

            allAnnotations.push({
                pageNumber: i,
                drawings: drawingHistory.get(i) || null,
                text: textHistory.get(i) || null,
                images: imageHistory.has(i) ? tempCanvas.toDataURL() : null
            });
        }

        const annotationData = {
            pdfData: pdfBase64,
            annotations: allAnnotations,
            totalPages: pdfDoc.numPages
        };

        const response = await Livewire.dispatch('annotationDataJS', [JSON.stringify(annotationData)]);
        
        if (response.detail) {
            const downloadUrl = URL.createObjectURL(new Blob([response.detail], { type: 'application/pdf' }));
            const link = document.createElement('a');
            link.href = downloadUrl;
            link.download = 'annotated_document.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(downloadUrl);
        }

    } catch (error) {
        console.error('Error downloading PDF:', error);
    } finally {
        downloadBtn.disabled = false;
        downloadBtn.innerHTML = '<i class="fas fa-download"></i> Guardar cambios y Enviar a Caja';
    }
});


            // Utility function to convert ArrayBuffer to Base64
                function arrayBufferToBase64(buffer) {
                    let binary = '';
                    const bytes = new Uint8Array(buffer);
                    const len = bytes.byteLength;
                    for (let i = 0; i < len; i++) {
                        binary += String.fromCharCode(bytes[i]);
                    }
                    return window.btoa(binary);
                }


                //

                // Add to the existing JavaScript variables:
let isShapeMode = false;
let currentShape = null;
let shapeStartX = 0;
let shapeStartY = 0;

// Add these new function declarations:
function drawShape(shape, startX, startY, endX, endY, ctx, shapeColor, shapeLineWidth) {
    // No hacer save/restore aquí - lo manejaremos en el llamador
    ctx.beginPath();
    ctx.strokeStyle = shapeColor;
    ctx.lineWidth = shapeLineWidth * pixelRatio;
    
    switch(shape) {
        case 'rectangle':
            const width = endX - startX;
            const height = endY - startY;
            ctx.strokeRect(startX, startY, width, height);
            break;
            
        case 'circle':
            const radius = Math.sqrt(Math.pow(endX - startX, 2) + Math.pow(endY - startY, 2));
            ctx.arc(startX, startY, radius, 0, 2 * Math.PI);
            break;
            
        case 'arrow':
            const angle = Math.atan2(endY - startY, endX - startX);
            const headlen = 20;
            
            ctx.moveTo(startX, startY);
            ctx.lineTo(endX, endY);
            
            ctx.lineTo(endX - headlen * Math.cos(angle - Math.PI / 6), 
                      endY - headlen * Math.sin(angle - Math.PI / 6));
            ctx.moveTo(endX, endY);
            ctx.lineTo(endX - headlen * Math.cos(angle + Math.PI / 6),
                      endY - headlen * Math.sin(angle + Math.PI / 6));
            break;
    }
    ctx.stroke();
}

// Función para redibujar una acción específica
function redrawAction(action, drawingCtx, textCtx) {
    drawingCtx.save();
    
    switch(action.type) {
        case 'drawing':
            drawingCtx.beginPath();
            drawingCtx.strokeStyle = action.color;
            drawingCtx.lineWidth = action.lineWidth * pixelRatio;
            
            action.points.forEach((point, index) => {
                if (index === 0) {
                    drawingCtx.moveTo(point.x, point.y);
                } else {
                    drawingCtx.lineTo(point.x, point.y);
                }
            });
            drawingCtx.stroke();
            drawingCtx.stroke();
            drawingCtx.stroke();
            break;
            
        case 'shape':
            drawShape(
                action.shape,
                action.startX,
                action.startY,
                action.endX,
                action.endY,
                drawingCtx,
                action.color,
                action.lineWidth
            );
            
            break;
            
        case 'text':
            textCtx.save();
            textCtx.scale(pixelRatio, pixelRatio);
            textCtx.fillStyle = action.color;
            textCtx.font = `${action.fontSize}px Arial`;
            textCtx.fillText(action.text, action.x, action.y + parseInt(action.fontSize));
            textCtx.restore();
            break;
    }
    
    drawingCtx.restore();
}




// Add these event listeners:
const toggleShapesBtn = document.getElementById('toggleShapes');
const shapeTypeSelect = document.getElementById('shapeType');


toggleShapesBtn.addEventListener('click', () => {
    isShapeMode = !isShapeMode;
    isDrawMode = false;
    isTextMode = false;
    drawingCanvas.style.pointerEvents = isShapeMode ? 'auto' : 'none';
    textCanvas.style.pointerEvents = 'none';
    toggleShapesBtn.classList.toggle('shapes-active');
    imageBtn.classList.remove('image-active');
    toggleDrawBtn.classList.remove('drawing-active');
    toggleTextBtn.classList.remove('text-active');
    shapeTypeSelect.style.display = isShapeMode ? 'inline-block' : 'none';
    textInput.style.display = 'none';

    isDragging = false;
    isImageMode = false;
    imageCanvas.style.pointerEvents = 'none';
    const images = imageHistory.get(pageNum) || [];
    images.forEach(img => img.selected = false);
    images.forEach(img => {
        imageCtx.save();
        img.noStroke(imageCtx);
        imageCtx.restore();
    });

    option2.innerHTML = 'Modo selección imagen';

});
                
function redrawFromUndoStack() {
    const pageStack = undoStack.get(pageNum) || [];
    
    // Limpiar ambos canvas
    drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
    textCtx.clearRect(0, 0, textCanvas.width, textCanvas.height);
    
    // Redibujar cada acción de forma independiente
    pageStack.forEach(action => {
        redrawAction(action, drawingCtx, textCtx);
    });
}


        });
    </script>
    @endscript
</div>