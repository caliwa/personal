<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Isolate;

#[Isolate]
class IndexDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index-dashboard-component');
    }
}
