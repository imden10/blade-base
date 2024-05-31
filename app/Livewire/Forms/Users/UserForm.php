<?php

namespace App\Livewire\Forms\Users;

use App\Models\User;
use Livewire\Form;

class UserForm extends Form
{
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'text' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => "Ім'я - обов'язкове поле",
            'name.min' => "Ім'я - повинно бути мінімум 5 символів",
            'text.required' => "Текст - обов'язкове поле",
        ];
    }

    public $name = '';
    public $text = '<strong>1234567890</strong>';

    public function preValidate()
    {
        $this->validate();
    }

    public function store()
    {
        $this->validate();

        dd($this->all());


        User::query()->create($this->all());
    }
}
