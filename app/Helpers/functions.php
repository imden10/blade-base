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
