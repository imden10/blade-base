<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Checkbox extends Component
{
    public $title;
    public $class;
    public $name;
    public $hint;
    public $checked;
    public $disabled;

    public function mount(
        $title = '',
        $name = '',
        $hint = '',
        $class = '',
        $checked = false,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->class = $class;
        $this->name = $name;
        $this->hint = $hint;
        $this->checked = $checked;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('livewire.com.forms.checkbox');
    }
}
