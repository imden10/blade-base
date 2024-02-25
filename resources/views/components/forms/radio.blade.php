@php($id = "radio_" . uniqid(time()))

<div class="mb-2">
    <div class="flex items-center">
        <input id="{{$id}}" type="radio" name="{{$name}}" value="{{$value}}"
               class="@if(isset($disabled) && $disabled) border-gray-200 @else border-gray-300 @endif w-4 h-4 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
               @if(isset($checked) && $checked === "true") checked @endif
               @if(isset($disabled) && $disabled) disabled @endif
        >
        <label for="{{$id}}" class="@if(isset($disabled) && $disabled) text-gray-300 dark:text-gray-700 @else text-gray-900 dark:text-gray-300 @endif block ms-2 text-sm font-medium select-none">
            {{$title}}
        </label>
    </div>
    @isset($hint)
        <p class="mt-[2px] ml-6 text-xs text-gray-500 dark:text-gray-400">{{$hint}}</p>
    @endisset
</div>
