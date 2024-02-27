<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FileManagerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function file()
    {
        return view('file-manager.file', [
            'breadcrumb' => [
                ['title' => 'Медіафайли'],
                ['title' => 'Файли']
            ]
        ]);
    }

    public function image()
    {
        return view('file-manager.image', [
            'breadcrumb' => [
                ['title' => 'Медіафайли'],
                ['title' => 'Зображення']
            ]
        ]);
    }
}
