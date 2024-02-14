@php($dropdownId = "dropdown-" . uniqid(time()))
<li x-data="{ isOpen: {{ $isActiveGroup ? 'true' : 'false' }} }">
    <button type="button" @click="isOpen = !isOpen" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="{{$dropdownId}}" data-collapse-toggle="{{$dropdownId}}">
        <i class="{{$icon}} w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{$title}}</span>
        @if(!$isActiveGroup)
            <i x-bind:class="{ 'rotate-180': isOpen }" class="fa-solid fa-angle-down w-4 h-4 transition-all"></i>
        @else
            <i x-bind:class="{ 'rotate-180': !isOpen }" class="fa-solid fa-angle-up w-4 h-4 transition-all"></i>
        @endif

    </button>
    <ul id="{{$dropdownId}}" x-bind:class="{ 'hidden': !isOpen }" class="{{$isActiveGroup ? '' : 'hidden'}} py-2 space-y-2">
        {{$slot}}
    </ul>
</li>
