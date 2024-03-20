<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('dashboard.index', [
            'breadcrumb' => [
                ['title' => 'Панель керування'],
            ]
        ]);
    }

}
