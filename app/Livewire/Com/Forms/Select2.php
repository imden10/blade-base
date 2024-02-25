<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Select2 extends Component
{
    public $value;
    public $title;
    public $name;
    public $hint;
    public $multiple = false;
    public $width;
    public $error;
    public $options = [];
    public $select2Class;
    public $required = false;
    public $searchable;
    public $disabled = false;
    public $ajaxUrl;
    public $minimumInputLength = 2;

    public function renderOptions($options, $prefix = '')
    {
        $html = '';

        foreach ($options as $option) {
            $text = $prefix . $option['text'];

            $html .= '<option value="' . $option['id'] . '" '
                . ($this->multiple ? (in_array($option['id'],$this->value) ? 'selected' : '') : ($this->value == $option['id'] ? 'selected' : ''))
                . '>' . $text . '</option>';

            if (isset($option['children'])) {
                $html .= $this->renderOptions($option['children'], $text . ' > ');
            }
        }

        return $html;
    }

    public function mount($title = null,$value = null, $error = null, $width = "100%", $name = null, $hint = null, $searchable = false, $ajaxUrl = null)
    {
        $this->value = $value;
        $this->width = $width;
        $this->title = $title;
        $this->error = $error;
        $this->name = $name;
        $this->hint = $hint;
        $this->ajaxUrl = $ajaxUrl;
        $this->select2Class = "x-select2-" . uniqid(time());

        $this->dispatch('x-select-init',[
            'class'                => $this->select2Class,
            'width'                => $this->width,
            'searchable'           => $this->searchable,
            'disabled'             => $this->disabled,
            'ajax_url'             => $this->ajaxUrl,
            'minimum_input_length' => $this->minimumInputLength,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.select2');
    }
}
