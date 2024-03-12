<?php

namespace App\Livewire\Com\Forms;

use Livewire\Component;

class File extends Component
{
    public $title;
    public $name;
    public $value;
    public $valueExt;
    public $hint;
    public $width;
    public $height;
    public $error;
    public $disabled;
    public $componentId;

    public function mount(
        $title = null,
        $name = null,
        $value = null,
        $hint = "MP4, DOC, XLSX, PDF",
        $width = "150px",
        $height = "150px",
        $error = null,
        $disabled = false
    )
    {
        $this->title = $title;
        $this->name = $name;
        $this->value = $value;
        $this->hint = $hint;
        $this->width = $width;
        $this->height = $height;
        $this->error = $error;
        $this->disabled = $disabled;
        $this->componentId = "x_file_" . uniqid(time());

        if($this->value){
            $pathInfo = pathinfo($this->value);
            $fileExtension = $pathInfo['extension'];
            $this->valueExt = "/img/file-ext/".$fileExtension.".png";
        } else {
            $this->valueExt = "";
        }

        $this->dispatch('x-file-init',[
            'id'     => $this->componentId,
            'width'  => $this->width,
            'height' => $this->height,
        ]);
    }

    public function render()
    {
        return view('livewire.com.forms.file');
    }
}
