<?php

namespace App\Livewire\Cerrajeria\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Layout;
use App\Livewire\Modulos\Traits\ModalEnableTrait;
use App\Livewire\Modulos\Traits\EscapeEnableTrait;
use App\Livewire\Modulos\Traits\ProcessingEscapeTrait;
use App\Livewire\Modulos\Traits\AdapterLivewireExceptionTrait;


#[Layout('components.layouts.cerrajeria-dashboard')]
class DashboardMediatorComponent extends Component
{
    use AdapterLivewireExceptionTrait,
        ModalEnableTrait,
        EscapeEnableTrait,
        ProcessingEscapeTrait;

    public function mount()
    {
    }

    public function MediatorInitialized(){
        $this->dispatch('unblock-sidebar');
        Toaster::success("QR verificado éxitosamente!");
    }

    #[On('confirm-validation-modal')]
    public function MediatorConfirmValidationModal($aux_conf_val_modal){
        $this->dispatch('mount-confirm-validation', $aux_conf_val_modal);
    }

    #[On('mediator-mount-dichotomic-asking-modal')]
    public function MediatorDichotomicAskingModal($value){
        $this->dispatch('mount-dichotomic-asking-modal', $value);
    }
    public function render()
    {
        return view('livewire.cerrajeria.dashboard.dashboard-mediator-component');
    }
}
