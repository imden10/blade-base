<div class="checkbox-wrapper {{$class ?? ''}} @if(isset($error) && $error) checkbox-wrapper-error @endif">
    <div class="flex">
        <div class="flex items-center h-5">
            {{$slot}}
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
