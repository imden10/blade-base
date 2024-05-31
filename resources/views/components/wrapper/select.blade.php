<div class="select-wrapper {{$class ?? ''}} @if(isset($error) && $error) select-wrapper-error @endif @isset($icon) select-wrapper-icon @endisset" style="{{$style ?? ''}} @isset($width) ;width:{{$width}} @endisset">
    <div class="@if(isset($inline) && $inline) select-wrapper-inline @endif">
        @if(isset($title) && $title)
            <label class="@if(isset($inline) && $inline) flex items-center p-2.5 border-solid border-gray-300 border-[1px] rounded-l-lg bg-gray-200 @else block mb-2 @endif text-nowrap text-sm font-medium @if(isset($error) && $error) text-red-700 dark:text-red-500 @else text-gray-800 dark:text-white @endif">{{$title}}</label>
        @endif
        <div class="relative @if(isset($inline) && $inline) w-full @endif">
            @isset($icon)
                <span class="absolute text-gray-400 text-xs inset-y-0 left-0 flex items-center pl-3">
                    <i class="{{$icon}}"></i>
                </span>
            @endisset
            {{$slot}}
        </div>
    </div>
    @if(isset($error) && $error)
        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
    @endif
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500 dark:text-gray-400">{{$hint}}</p>
    @endisset
</div>
