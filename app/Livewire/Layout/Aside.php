<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Aside extends Component
{
    public $activeRoute;

    public function mount()
    {
        $this->activeRoute = Route::currentRouteName();
    }

    public function isActive($route)
    {
        return $this->activeRoute === $route;
    }

    public function isActiveGroup($group)
    {
        return strpos($this->activeRoute, $group) === 0;
    }

    public function render()
    {
        return view('livewire.layout.aside');
    }
}
