<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Editor extends Component
{
    public $title;
    public $rows;
    public $placeholder;
    public $name;
    public $hint;
    public $value;
    public $required;
    public $disabled;
    public $componentId;
    public $error;


    public function mount(
        $title = '',
        $placeholder = '',
        $name = '',
        $hint = '',
        $value = '',
        $required = false,
        $disabled = false,
        $rows = 4,
        $error = null,
    )
    {
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->hint = $hint;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->rows = $rows;
        $this->error = $error;
        $this->componentId = "x_editor_" . uniqid(time());

        $this->dispatch('x-editor-init',[
            'id'       => $this->componentId,
            'disabled' => $this->disabled,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.editor');
    }
}
