<?php

namespace App\Livewire\Modulos\Traits;

trait InitFlowbiteModalTrait
{
    public function initFlowbiteModal(){
        $this->js('initFlowbite();');
    }
}