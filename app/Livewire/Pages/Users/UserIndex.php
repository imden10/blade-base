<?php

namespace App\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $model = User::query()->paginate(5);
        $user_ids = $model->pluck('id')->toArray();

        $breadcrumb = [
            [
                'title' => 'Користувачі'
            ]
        ];

        return view('livewire.pages.users.index', compact('model','user_ids','breadcrumb'))
            ->layout('layouts.app');
    }
}
