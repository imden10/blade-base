<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Radio extends Component
{
    public $title;
    public $value;
    public $name;
    public $hint;
    public $checked;
    public $disabled;

    public function mount(
        $title = '',
        $value = '',
        $name = '',
        $hint = '',
        $checked = false,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->value = $value;
        $this->name = $name;
        $this->hint = $hint;
        $this->checked = $checked;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('livewire.com.forms.radio');
    }
}
