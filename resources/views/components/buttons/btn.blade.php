<?php
$btnClass = "text-white focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " . (isset($disabled) ? 'bg-blue-400' : 'hover:bg-blue-800 bg-blue-700');
if(isset($btn)){
    switch ($btn){
        case "dark":
            $btnClass = "text-white focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 " . (isset($disabled) ? 'bg-gray-400' : 'hover:bg-gray-900 bg-gray-800');
            break;
        case "light":
            $btnClass = "bg-white border border-gray-300 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 " . (isset($disabled) ? 'text-gray-500' : 'hover:bg-gray-100 text-gray-900');
            break;
        case "green":
            $btnClass = "text-white focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 "  . (isset($disabled) ? 'bg-green-300' : 'hover:bg-green-600 bg-green-500');
            break;
        case "red":
            $btnClass = "text-white focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 "  . (isset($disabled) ? 'bg-red-300' : 'hover:bg-red-700 bg-red-600');
            break;
        case "yellow":
            $btnClass = "text-white focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900 "  . (isset($disabled) ? 'bg-yellow-300' : 'bg-yellow-400 hover:bg-yellow-500');
            break;
        case "purple":
            $btnClass = "text-white focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 "  . (isset($disabled) ? 'bg-purple-300' : 'bg-purple-700 hover:bg-purple-800');
            break;
        case "link":
            $btnClass = "bg-transparent focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:text-white "   . (isset($disabled) ? 'text-gray-600' : 'hover:text-blue-700 text-gray-900');
            break;
    }
}
?>

<button type="{{$type ?? 'button'}}"
        @isset($onclick) onclick="{{$onclick}}" @endisset
        class="{{$class ?? ''}} focus:outline-none font-medium rounded-lg text-sm px-4 h-[42px] items-center inline-flex {{$btnClass}} @if(isset($disabled)) cursor-not-allowed @endif"
        @if(isset($disabled)) disabled @endif
>{{$slot}}</button>
