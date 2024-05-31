<?php

namespace App\Livewire\Pages\Users;

use App\Livewire\Forms\Users\UserForm;
use Livewire\Component;

class UserCreate extends Component
{
    public UserForm $form;

    public function preValidate()
    {
        $this->form->preValidate();
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('admin.users');
    }

    public function render()
    {
        $breadcrumb = [
            ['title' => 'Користувачі', 'route' => 'admin.users'],
            ['title' => 'Додати']
        ];

        return view('livewire.pages.users.user-create', compact('breadcrumb'))
            ->layout('layouts.app');
    }
}
