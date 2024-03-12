<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Clipboard extends Component
{
    public $value;
    public $class;
    public $componentId;

    public function mount($value = '',$class = '')
    {
        $this->value = $value;
        $this->class = $class;
        $this->componentId = "x_clipboard_" . uniqid(time());
    }

    public function render()
    {
        return view('livewire.com.forms.clipboard');
    }
}
