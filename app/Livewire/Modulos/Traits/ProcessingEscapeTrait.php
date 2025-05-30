<?php

namespace App\Livewire\Modulos\Traits;

trait ProcessingEscapeTrait
{
    public $isProcessingEscape;

    public function __construct()
    {
        $this->isProcessingEscape = config('modalescapeeventlistener.is_active') ? false : true;
    }
}