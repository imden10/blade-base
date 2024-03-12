<div class="{{$class ?? ''}} w-full @if(isset($inline) && $inline) flex @endif">
    @if(isset($title) && $title)
    <label class="@if(isset($inline) && $inline) flex items-center p-2.5 border-solid border-gray-300 border-[1px] rounded-l-lg bg-gray-200 @else block mb-2 @endif text-nowrap text-sm font-medium @isset($error) text-red-700 dark:text-red-500 @else text-gray-800 dark:text-white @endisset">{{$title}}</label>
    @endif
    <div class="relative @if(isset($inline) && $inline) w-full @endif">
    @isset($icon)
    <span class="absolute text-gray-400 text-xs inset-y-0 left-0 flex items-center pl-3">
        <i class="{{$icon}}"></i>
    </span>
    @endisset
    <input type="{{$type ?? 'text'}}"
           name="{{$name ?? ''}}"
           @isset($id) id="{{$id}}" @endisset
           @isset($step) step="{{$step}}" @endisset
           @isset($min) min="{{$min}}" @endisset
           @isset($max) max="{{$max}}" @endisset
           class="@if(isset($icon) && $icon) pl-[30px] @endif w-full text-gray-700 border-gray-300 text-sm @if(isset($inline) && $inline && isset($title) && $title) rounded-r-lg @else rounded-lg @endif focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 focus:border-{{ isset($error) ? 'red' : 'blue' }}-500 block p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 dark:focus:border-{{ isset($error) ? 'red' : 'blue' }}-500
                  @if(isset($disabled) && $disabled) bg-gray-100 cursor-not-allowed @else bg-gray-50 @endif
                  @if(isset($error)) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @endif"
           placeholder="{{$placeholder ?? ''}}"
           @if(isset($id) && $id !== null) id="{{$id}}" @endif
           @if(isset($value) && $value !== null) value="{{$value}}" @endif
           @if(isset($required) && $required) required @endif
           @if(isset($disabled) && $disabled) disabled @endif
    />
    </div>
    @isset($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
    @endisset
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500 dark:text-gray-400">{{$hint}}</p>
    @endisset
</div>
