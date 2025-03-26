<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use Livewire\Attributes\Isolate;

#[Isolate]
class IndexGalleryComponent extends Component
{
    public function render()
    {
        return view('livewire.gallery.index-gallery-component');
    }
}
