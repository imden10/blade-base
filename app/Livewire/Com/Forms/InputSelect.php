<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class InputSelect extends Component
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
    public $select_name;
    public $select_value;
    public $select_options;

    public function mount(
        $type = 'text',
        $title = '',
        $placeholder = '',
        $name = '',
        $select_name = '',
        $select_value = '',
        $select_options = [],
        $hint = '',
        $value = '',
        $icon = '',
        $min = null,
        $max = null,
        $step = null,
        $required = false,
        $disabled = false
    )
    {
        $this->type = $type;
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
        $this->select_name = $select_name;
        $this->select_value = $select_value;
        $this->select_options = $select_options;
    }

    public function render()
    {
        return view('livewire.com.forms.input-select');
    }
}
