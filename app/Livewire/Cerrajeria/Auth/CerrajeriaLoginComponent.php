<?php

namespace App\Livewire\Cerrajeria\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.cerrajeria')]
class CerrajeriaLoginComponent extends Component
{
    #[Validate('required', message: 'El campo :attribute es obligatorio.')]
    #[Validate('email', message: 'El campo :attribute debe ser un correo electrónico válido.')]
    public $email;
    #[Validate('required', message: 'La contraseña es obligatoria.')]
    public $password;
    public $remember_me = false;

    public function mount()
    {
        //$this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
    }

    public function login()
    {
        $this->validate();
        $this->redirectRoute('dashboard-cerrajeria', navigate:true);
    }

    public function render()
    {
        return view('livewire.cerrajeria.auth.cerrajeria-login-component');
    }
}
