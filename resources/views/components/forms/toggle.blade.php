<label x-data="{ isChecked:{{(isset($checked) && $checked) ? "true" : "false"}}, fieldName:'{{$name}}' }" class="flex items-center mb-5 cursor-pointer mb-2">
    <input x-bind:name="isChecked ? '' : fieldName" value="0" type="hidden" />
    <input type="checkbox"
           name="{{$name}}"
           value="1"
           @if(isset($checked) && $checked === "true") checked @endif
           @click="isChecked = !isChecked"
           class="sr-only peer"
           @if(isset($disabled) && $disabled) disabled @endif
    >
    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    <span class="@if(isset($disabled) && $disabled) text-gray-300 dark:text-gray-700 @else text-gray-900 dark:text-gray-300 @endif ms-3 text-sm font-medium select-none">{{$title}}</span>
</label>
