<?php

namespace App\Livewire\Cerrajeria\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.cerrajeria')]
class CerrajeriaLoginComponent extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount()
    {
        $this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
    }

    public function login()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.cerrajeria.auth.cerrajeria-login-component');
    }
}
