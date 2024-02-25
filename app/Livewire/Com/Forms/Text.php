<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Text extends Component
{
    public $title;
    public $placeholder;
    public $name;
    public $hint;
    public $value;
    public $required;
    public $disabled;

    public function mount(
        $title = '',
        $placeholder = '',
        $name = '',
        $hint = '',
        $value = '',
        $required = false,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->hint = $hint;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('livewire.com.forms.text');
    }
}
