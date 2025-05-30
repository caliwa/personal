<div role="status" id="toaster" x-data="toasterHub(@js($toasts), @js($config))" 
    @class([
        'fixed p-4 w-full flex flex-col pointer-events-none sm:p-6 transition-all duration-300 ease-in-out',
        'bottom-0' => $alignment->is('bottom'),
        'top-1/2 -translate-y-1/2' => $alignment->is('middle'),
        'top-0' => $alignment->is('top'),
        'items-start rtl:items-end' => $position->is('left'),
        'items-center' => $position->is('center'),
        'items-end rtl:items-start' => $position->is('right'),
    ])
    style="z-index: 2147483648;"
>
    <template class=" pt-3" x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.isVisible"
             x-init="$nextTick(() => toast.show($el))"
             @if($alignment->is('bottom'))
             x-transition:enter-start="translate-y-12 opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             @elseif($alignment->is('top'))
             x-transition:enter-start="-translate-y-12 opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             @else
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             @endif
             x-transition:leave-end="opacity-0 scale-90"
             @class([
                 'relative duration-300 transform transition ease-in-out max-w-xs w-full pointer-events-auto mb-0.5',
                 'text-center' => $position->is('center'),
                 'shadow-lg rounded-lg overflow-hidden'
             ])
             :class="toast.select({ 
                 error: 'bg-red-500 text-white', 
                 info: 'bg-blue-500 text-white', 
                 success: 'bg-green-500 text-white', 
                 warning: 'bg-yellow-500 text-white' 
             })"
        >
            <div class="flex items-center justify-between px-4 py-2">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" :class="toast.select({ 
                        error: 'text-red-200', 
                        info: 'text-blue-200', 
                        success: 'text-green-200', 
                        warning: 'text-yellow-200' 
                    })" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span x-text="toast.message" class="font-semibold text-sm"></span>
                </div>
                @if($closeable)
                <button @click="toast.dispose()" aria-label="@lang('close')" class="ml-4 focus:outline-hidden hover:text-gray-100 transition-colors duration-200">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                @endif
            </div>
            <div class="px-4 pb-1 bg-opacity-20">
                <div class="h-1 w-full bg-white bg-opacity-40 rounded-full">
                    <div class="h-1 bg-white text-black rounded-full" style="width: 100%;" x-bind:style="{ width: `${toast.progress}%` }"></div>
                </div>
            </div>
        </div>
    </template>
</div>