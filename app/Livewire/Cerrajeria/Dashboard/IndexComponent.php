<?php

namespace App\Livewire\Cerrajeria\Dashboard;

use Livewire\Component;

class IndexComponent extends Component
{

    public function openModal()
    {
        $this->dispatch('mount-quote-figure-save-validation-modal');
    }

    public function render()
    {
        return view('livewire.cerrajeria.dashboard.index-component');
    }
}
