@php($id = "checkbox_" . uniqid(time()))

<div x-data="{ isChecked:{{(isset($checked) && $checked) ? "true" : "false"}}, fieldName:'{{$name}}' }" class="mb-2">
    <div class="flex mb-4">
        <div class="flex items-center h-5">
            <input x-bind:name="isChecked ? '' : fieldName" value="0" type="hidden" />
            <input type="checkbox"
                   id="{{$id}}"
                   name="{{$name}}"
                   value="1"
                   @if(isset($checked) && $checked === "true") checked @endif
                   @click="isChecked = !isChecked"
                   class="@if(isset($disabled) && $disabled) bg-gray-50 focus:ring-3 focus:ring-blue-300 @else bg-gray-100 focus:ring-blue-500 @endif w-4 h-4 text-blue-600  border-gray-300 rounded  dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                   @if(isset($disabled) && $disabled) disabled @endif
            >
        </div>
        <div class="ms-2 text-sm">
            @isset($title)
                <label for="{{$id}}"
                       class="@if(isset($disabled) && $disabled) text-gray-400 dark:text-gray-500 @else text-gray-900 dark:text-gray-300 @endif font-medium select-none"
                >{{$title}}</label>
            @endisset
            @isset($hint)
                <p class="text-xs font-normal text-gray-500 dark:text-gray-400">{{$hint}}</p>
            @endisset
        </div>
    </div>
</div>
