<?php

namespace App\Livewire\Modulos\Validation;

use Livewire\Component;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use App\Livewire\Modulos\Traits\CloseModalClickTrait;

#[Isolate]
class DichotomicAskingModalComponent extends Component
{
    use CloseModalClickTrait;

    public $isVisibleDichotomicAskingModal = false;

    public $message = '';
    public $livewire_dispatch = '';
    public $dict = [];

    #[On('isVisibleDichotomicAskingModal')]
    public function setModalVariable($value){
        $this->ResetModalVariables();
        $this->isVisibleDichotomicAskingModal = $value;
    }

    #[On('mount-dichotomic-asking-modal')]
    public function mount_artificially($dict){
        $this->dict = $dict;
        $this->message = $this->dict["message"];
        $this->livewire_dispatch = $this->dict["livewire_dispatch"];
        $this->isVisibleDichotomicAskingModal = true;
        $this->dispatch('EscapeEnabled');
    }

    public function DoDispatch(){
        if(isset($this->dict["sub_dict"])){
            $this->dispatch($this->livewire_dispatch, $this->dict["sub_dict"]);
        }else{
            $this->dispatch($this->livewire_dispatch);
        }
    }

    public function ResetModalVariables(){
        $this->reset(array_keys($this->all()));
    }

    public function render()
    {
        return view('livewire.modulos.validation.dichotomic-asking-modal-component');
    }
}
