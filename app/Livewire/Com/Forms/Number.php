<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Number extends Component
{
    public $type;
    public $title;
    public $placeholder;
    public $name;
    public $hint;
    public $value;
    public $icon;
    public $min;
    public $max;
    public $step;
    public $required;
    public $disabled;
    public $class;
    public $inline;
    public $error;
    public $width;

    public function mount(
        $title = '',
        $placeholder = '',
        $name = '',
        $error = '',
        $hint = '',
        $value = '',
        $icon = '',
        $min = null,
        $max = null,
        $step = null,
        $required = false,
        $disabled = false,
        $class = '',
        $inline = null,
        $width = "100%",
    )
    {
        $this->type = 'number';
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->hint = $hint;
        $this->value = $value;
        $this->icon = $icon;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->class = $class;
        $this->inline = $inline;
        $this->error = $error;
        $this->width = $width;
    }

    public function render()
    {
        return view('livewire.com.forms.input');
    }
}
