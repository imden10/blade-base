@props(['isActive' => false, 'title' => 'Title', 'route' => false, 'icon' => ''])
<li>
    <a href="{{route($route)}}" wire:navigate class="{{ $isActive ? 'bg-gray-200' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <i class=" {{ $isActive ? 'text-gray-900' : '' }} {{$icon}} w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
        <span class="ms-3">{{$title}}</span>
    </a>
</li>
