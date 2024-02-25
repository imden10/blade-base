<div
    class="x-daterangepicker @if(isset($error) && $error) x-daterangepicker-error @endif {{isset($width) ? ('w-['.$width.']') : 'w-full'}}"
    id="{{$componentId}}"
>
    <div class="mb-6">
        @isset($title)
            <label class="block mb-2 text-sm font-medium @isset($error) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @endisset">{{$title}}</label>
        @endisset
        <div class="relative">
            @isset($icon)
                <span class="absolute text-gray-400 text-xs inset-y-0 left-0 flex items-center pl-3">
                    <i class="{{$icon}}"></i>
                </span>
            @endisset
            <div class="flex">
                <input type="text"
                       name="{{$nameStart ?? ''}}"
                       class="@if(isset($icon) && $icon) pl-[30px] @endif text-gray-700 border-gray-300 text-sm rounded-l-lg focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 focus:border-{{ isset($error) ? 'red' : 'blue' }}-500 block w-full p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 dark:focus:border-{{ isset($error) ? 'red' : 'blue' }}-500
                  @if(isset($disabled) && $disabled) bg-gray-100 cursor-not-allowed @else bg-gray-50 @endif
                  @if(isset($error)) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @endif"
                       placeholder="{{$placeholderStart ?? ''}}"
                       @if(isset($valueStart) && $valueStart !== null) value="{{$valueStart}}" @endif

                       @if(isset($disabled) && $disabled) disabled @endif
                />
                <input type="text"
                       name="{{$nameEnd ?? ''}}"
                       class="text-gray-700 border-gray-300 text-sm rounded-r-lg focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 focus:border-{{ isset($error) ? 'red' : 'blue' }}-500 block w-full p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 dark:focus:border-{{ isset($error) ? 'red' : 'blue' }}-500
                  @if(isset($disabled) && $disabled) bg-gray-100 cursor-not-allowed @else bg-gray-50 @endif
                  @if(isset($error)) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @endif"
                       placeholder="{{$placeholderEnd ?? ''}}"
                       @if(isset($valueEnd) && $valueEnd !== null) value="{{$valueEnd}}" @endif
                       @if(isset($disabled) && $disabled) disabled @endif
                />
            </div>
        </div>
        @isset($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
        @endisset
        @isset($hint)
            <p class="mt-[2px] text-sm text-gray-500 dark:text-gray-400">{{$hint}}</p>
        @endisset
    </div>

</div>
