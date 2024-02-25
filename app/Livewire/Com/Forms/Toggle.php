<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Toggle extends Component
{
    public $title;
    public $name;
    public $hint;
    public $checked;
    public $disabled;

    public function mount(
        $title = '',
        $name = '',
        $hint = '',
        $checked = false,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->name = $name;
        $this->hint = $hint;
        $this->checked = $checked;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('livewire.com.forms.toggle');
    }
}
