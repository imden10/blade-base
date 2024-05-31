<?php

if (!function_exists('get_image_uri')) {

    function get_image_uri($path) {
        return env('APP_URL') . "/storage/media" . $path;
    }
}

if (!function_exists('get_file_uri')) {

    function get_file_uri($path) {
        return env('APP_URL') . "/storage/files" . $path;
    }
}

if (!function_exists('optionsTreeToList')) {
    function optionsTreeToList($options,$parentText = '') {
        $result = [];

        foreach ($options as $option) {
            $id = $option['id'];
            $text = $option['text'];

            // Додаємо "Меблі > " до початку тексту
            $textWithParent = ($parentText ? $parentText . ' > ' : '') . $text;

            $result[$id] = [
                'text' => $textWithParent
            ];

            if(isset($option['icon'])){
                $result[$id]['icon'] = $option['icon'];
            }

            if (isset($option['children'])) {
                $childrenResult = optionsTreeToList($option['children'], $textWithParent);
                $result = array_merge($result, $childrenResult);
            }
        }

        return $result;
    }
}


