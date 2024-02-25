<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Datepicker extends Component
{
    public $title;
    public $format;
    public $placeholder;
    public $name;
    public $hint;
    public $value;
    public $width;
    public $icon;
    public $componentId;
    public $required;
    public $disabled;

    public function mount(
        $title = '',
        $placeholder = '',
        $name = '',
        $hint = '',
        $value = '',
        $icon = '',
        $width = "100%",
        $required = false,
        $disabled = false,
        $format = 'dd-mm-yyyy'
    )
    {
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->hint = $hint;
        $this->value = $value;
        $this->icon = $icon;
        $this->width = $width;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->format = $format;
        $this->componentId = "x_datepicker_" . uniqid(time());

        $this->dispatch('x-datepicker-init',[
            'id'       => $this->componentId,
            'disabled' => $this->disabled,
            'format'   => $this->format,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.datepicker');
    }
}
