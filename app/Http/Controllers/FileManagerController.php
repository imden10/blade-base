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

    public function getInfo(Request $request)
    {
        $path     = get_image_uri($request->get('path'));
        $filePath = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'media' . $request->get('path');

        $uploadedFile = new \Symfony\Component\HttpFoundation\File\File($filePath);

        try {
            $name       = $uploadedFile->getFilename();
            $created_at = Carbon::createFromTimestamp($uploadedFile->getCTime())->format('d.m.Y');
            $mime       = $uploadedFile->getMimeType();
            $size       = $uploadedFile->getSize();
            $size       = $this->formatBytes($size);
            [$imgWidth, $imgHeight] = getimagesize($path);

        } catch (\Exception $e) {
            return [
                'success' => false
            ];
        }

        $html = view('layouts.com.x-image-info-data',[
            'data'   => [
                'path'       => $path,
                'name'       => $name,
                'created_at' => $created_at,
                'mime'       => $mime,
                'size'       => $size,
                'width'      => $imgWidth,
                'height'     => $imgHeight
            ]
        ])->render();

        return [
            'success'      => true,
            'html'         => $html,
            'alt_value'    => $request->get('alt_value'),
            'full_url'     => $path,
        ];
    }

    public function getInfoFile(Request $request)
    {
        $path     = get_file_uri($request->get('path'));
        $filePath = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'files' . $request->get('path');

        $uploadedFile = new \Symfony\Component\HttpFoundation\File\File($filePath);

        try {
            $name       = $uploadedFile->getFilename();
            $created_at = Carbon::createFromTimestamp($uploadedFile->getCTime())->format('d.m.Y');
            $mime       = $uploadedFile->getMimeType();
            $size       = $uploadedFile->getSize();
            $size       = $this->formatBytes($size);

        } catch (\Exception $e) {
            return [
                'success' => false
            ];
        }

        $pathInfo = pathinfo($path);
        $fileExtension = $pathInfo['extension'];
        $valueExt = "/img/file-ext/".$fileExtension.".png";

        $html = view('layouts.com.x-file-info-data',[
            'data'   => [
                'path'       => $path,
                'value_ext'  => $valueExt,
                'name'       => $name,
                'created_at' => $created_at,
                'mime'       => $mime,
                'size'       => $size,
            ]
        ])->render();

        return [
            'success'      => true,
            'html'         => $html,
            'full_url'     => $path,
        ];
    }

    private function formatBytes($bytes, $precision = 2) {
        $units = ['Б', 'КБ', 'МБ', 'ГБ', 'ТБ'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
