<div class="mb-6 x-select2">
    @isset($title)
    <label class="block mb-2 text-sm font-medium @if(isset($error) && $error) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @endif">{{$title}}</label>
    @endisset
    <select
        {{$attributes->except(['class','width','title','inline','searchable','options'])}}
        class="{{$class ?? ''}} text-gray-700 border-gray-300 text-sm rounded-lg focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 focus:border-{{ isset($error) ? 'red' : 'blue' }}-500 block w-full p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-{{ isset($error) ? 'red' : 'blue' }}-500 dark:focus:border-{{ isset($error) ? 'red' : 'blue' }}-500
                  @if(isset($disabled) && $disabled) bg-gray-100 cursor-not-allowed @else bg-gray-50 @endif
                  @if(isset($error)) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @endif"
    >
        @if(isset($options) && count($options))
            <x-forms.select.options :options="$options"></x-forms.select.options>
        @endif
    </select>
    @isset($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
    @endisset
    @isset($hint)
    <p class="mt-[2px] text-sm text-gray-500 dark:text-gray-400">{{$hint}}</p>
    @endisset
</div>
