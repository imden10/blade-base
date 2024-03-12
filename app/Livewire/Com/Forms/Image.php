<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class Image extends Component
{
    public $title;
    public $name;
    public $value;
    public $altName;
    public $altValue;
    public $hint;
    public $hintSize;
    public $width;
    public $height;
    public $error;
    public $disabled;
    public $componentId;

    public function mount(
        $title = null,
        $name = null,
        $value = null,
        $altName = null,
        $altValue = null,
        $hint = "SVG, PNG, JPG, GIF",
        $hintSize = "",
        $width = "150px",
        $height = "150px",
        $error = null,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->name = $name;
        $this->value = $value;
        $this->altName = $altName;
        $this->altValue = $altValue;
        $this->hint = $hint;
        $this->hintSize = $hintSize;
        $this->width = $width;
        $this->height = $height;
        $this->error = $error;
        $this->disabled = $disabled;
        $this->componentId = "x_image_" . uniqid(time());

        $this->dispatch('x-image-init',[
            'id'     => $this->componentId,
            'width'  => $this->width,
            'height' => $this->height,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.image');
    }
}
