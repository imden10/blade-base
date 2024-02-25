<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class DateRangePicker extends Component
{
    public $title;
    public $format;
    public $placeholderStart;
    public $placeholderEnd;
    public $nameStart;
    public $nameEnd;
    public $hint;
    public $valueStart;
    public $valueEnd;
    public $width;
    public $icon;
    public $componentId;
    public $disabled;

    public function mount(
        $title = '',
        $placeholderStart = '',
        $placeholderEnd = '',
        $nameStart = '',
        $nameEnd = '',
        $hint = '',
        $valueStart = '',
        $valueEnd = '',
        $icon = '',
        $width = "100%",
        $disabled = false,
        $format = 'dd-mm-yyyy'
    )
    {
        $this->title = $title;
        $this->placeholderStart = $placeholderStart;
        $this->placeholderEnd = $placeholderEnd;
        $this->nameStart = $nameStart;
        $this->nameEnd = $nameEnd;
        $this->hint = $hint;
        $this->valueStart = $valueStart;
        $this->valueEnd = $valueEnd;
        $this->icon = $icon;
        $this->width = $width;
        $this->disabled = $disabled;
        $this->format = $format;
        $this->componentId = "x_daterangepicker_" . uniqid(time());

        $this->dispatch('x-daterangepicker-init',[
            'id'       => $this->componentId,
            'disabled' => $this->disabled,
            'format'   => $this->format,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.daterangepicker');
    }
}
