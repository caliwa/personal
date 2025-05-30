<div wire:init='MediatorInitialized' class="animate-window" x-data="{
        escapeEnabled: $wire.entangle('escapeEnabled').live,
        modalStack: [],
        checkInterval: null,
        topModalId: null,
        isProcessingEscape: $wire.entangle('isProcessingEscape').live,
        lastEscapeTime: 0,
        openModal(event) {
            event.preventDefault();
            event.target.blur();
            this.escapeEnabled = false;
            this.addTabTrapListener();
        },
        addTabTrapListener() {
            document.addEventListener('keydown', this.trapTabKey);
        },
        removeTabTrapListener() {
            document.removeEventListener('keydown', this.trapTabKey);
        },
        trapTabKey(e) {
            if (e.key === 'Tab' && !this.escapeEnabled) {
                e.stopPropagation();
                e.preventDefault();
            }
        },
        closeTopModal() {
            const now = Date.now();
            // Verificar si han pasado al menos 150ms desde la última ejecución
            if (now - this.lastEscapeTime < 150) return;
            if (this.isProcessingEscape) return;
            
            this.isProcessingEscape = true;
            this.lastEscapeTime = now;
            
            if (this.escapeEnabled && this.modalStack.length > 0) {
                this.topModalId = this.modalStack[this.modalStack.length - 1];
                $wire.dispatch('MediatorSetModalFalse', [this.topModalId]);
                
                if(this.topModalId === 'isVisibleConfirmValidationModal'){
                    this.removeTabTrapListener();
                }
            }
            setTimeout(() => {
                this.isProcessingEscape = false;
            }, 150);
        },
        handleEnter(event) {
            event.preventDefault();
            event.target.blur();
            this.openModal(event);
            this.startCheckingEscapeEnabled(event.target);
        },
        startCheckingEscapeEnabled(inputElement) {
            if (this.checkInterval) {
                clearInterval(this.checkInterval);
            }
            this.checkInterval = setInterval(() => {
                if (this.escapeEnabled) {
                    clearInterval(this.checkInterval);
                    inputElement.focus();
                }
            }, 100);
        },
        isDisabledDocumentSelectionModal: false,
    }"
    x-on:x-block-open-document-selection-modal.window="
        isDisabledDocumentSelectionModal = true;
    "
    x-on:x-unblock-open-document-selection-modal.window="
        isDisabledDocumentSelectionModal = false;
    "
    x-init="
        escapeEnabled = true;
        isProcessingEscape = false;
    "
    @if(config('modalescapeeventlistener.is_active')) @keydown.escape.window.prevent="closeTopModal()" @endif
>

    <div id="bg-validation-input" x-show="!escapeEnabled" class="fixed inset-0 flex items-center justify-center z-100 bg-white dark:bg-black bg-opacity-30 select-none"></div>

    <div id="bg-validation-input" x-show="!escapeEnabled" 
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-50"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 flex items-center justify-center z-101 select-none">
        <div class="absolute top-0 bottom-0 left-0 right-0 flex items-center justify-center">
            <div class="flex items-center">
                <div class="absolute inset-0 flex mt-5 justify-center items-center pointer-events-none">
                    <span class="text-xl font-bold animate-pulse mt-20 ml-12 bg-gray-300 bg-opacity-60 px-1 border border-black border-opacity-30 rounded-sm">
                        Cargando
                    </span>
                    <img src="{{ asset('/gif/cargando.gif')}}" class="select-none mt-[101px] w-20 h-20 -ml-7" alt="Puntos sucesivos" />
                </div>
            </div>
        </div>
    </div>

    <div
        wire:offline
        x-data="{ showButton: false }"
        x-effect="
            let timer;

            timer = setTimeout(() => showButton = true, 30000);

            return () => {
                if (timer) clearTimeout(timer);
            }
        "
        class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50"
    >
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 rounded-lg p-8 max-w-sm w-full mx-auto text-center shadow-xl">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mr-3"></i>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Sin conexión</h2>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Vaya, tu dispositivo ha perdido la conexión. La página web que estás viendo está fuera de línea.
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                Este aviso desaparecerá automáticamente cuando se restablezca la conexión.
            </p>
            <button 
                x-show="showButton"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                onclick="window.location.reload()" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-sm transition duration-300"
            >
                Recargar cotizador (reinicio)
            </button>
        </div>
    </div>

    @if($isProcessingEscape)
        <div
            @if(config('modalescapeeventlistener.is_active'))
                class="fixed bottom-4 left-4 z-999 bg-gray-900 bg-opacity-80 text-white font-bold px-3 py-1.5 rounded-lg shadow-lg transition-opacity duration-300 opacity-100"
            @else
                class="fixed bottom-4 left-4 z-999 bg-gray-900 bg-opacity-80 text-white font-bold px-3 py-1.5 rounded-lg shadow-lg transition-opacity duration-300 opacity-0"
            @endif
            >
            <div class="flex items-center">
                <span class="text-2xl mr-2">⎵</span>
                <span class="text-2xl">ESC detectado</span>
            </div>
        </div>
    @endif

    <livewire:cerrajeria.dashboard.wood-lock-smith-component wire:key="wlsc"/>

    <livewire:cerrajeria.dashboard.index-component wire:key="iic"/>

    <livewire:modulos.validation.confirm-validation-modal-component wire:key="figure13-1"/>

    <livewire:modulos.validation.dichotomic-asking-modal-component wire:key="dicho-ask"/>

</div>