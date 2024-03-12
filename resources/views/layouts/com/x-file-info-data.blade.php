<div class="flex flex-wrap">
    <div>
        <img src="{{$data['value_ext']}}" class="size-[120px] rounded-md">
    </div>
    <div class="w-[calc(100%-120px)] pl-4">
        <div id="tooltip-filename" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            {{$data['name']}}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <p class="text-left rtl:text-right text-gray-500 dark:text-gray-400"><b>Ім'я файлу:</b> <span class="truncate w-[350px] inline-block align-middle" data-tooltip-target="tooltip-filename">{{$data['name']}}</span></p>
        <p class="text-left rtl:text-right text-gray-500 dark:text-gray-400"><b>Тип файлу:</b> <span>{{$data['mime']}}</span></p>
        <p class="text-left rtl:text-right text-gray-500 dark:text-gray-400"><b>Завантажено:</b> <span>{{$data['created_at']}}</span></p>
        <p class="text-left rtl:text-right text-gray-500 dark:text-gray-400"><b>Розмір файлу:</b> <span>{{$data['size']}}</span></p>
    </div>
</div>
