<div id="{{$componentId}}" class="x-image-component inline-flex @if($disabled) pointer-events-none @endif" data-app-url="{{env("APP_URL")}}">
    <div>
        @isset($title)
            <label class="block mb-2 text-sm font-medium @isset($error) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @endisset">{{$title}}</label>
        @endisset
        <span class="x-image-box relative flex flex-col items-center justify-center @if($value) border-0 @else border-2 @endif border-gray-300  @if($disabled) border-solid @else border-dashed @endif rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="media-image-wrapper relative @if($value) flex @else hidden @endif bg-gray-300 rounded w-full h-full items-center overflow-hidden justify-center group">
                <img src="{{isset($value) ? (env('APP_URL') . "/storage/media" . $value) : ''}}" class="media-image max-w-full max-h-full" />
                <div class="absolute right-[4px] top-[4px] h-[36px] hidden group-hover:block">
                    <span data-modal-target="x_image_info_modal" data-modal-toggle="x_image_info_modal" class="x-image-info-btn inline-flex shadow-xl text-gray-700 w-[36px] h-[36px] bg-white rounded-full cursor-pointer items-center justify-center hover:text-blue-700">
                        <i class="fa-solid fa-info"></i>
                    </span>
                    <span class="x-image-clear-btn shadow-xl text-gray-700 inline-flex w-[36px] h-[36px] bg-white rounded-full cursor-pointer items-center justify-center hover:text-blue-700">
                        <i class="fa-regular fa-trash-can"></i>
                    </span>
                </div>
            </div>
            <div class="media-empty-wrapper flex flex-col items-center justify-center pt-5 pb-6 @if($value) hidden @endif">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{$hint}}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{$hintSize}}</p>
            </div>
            @if($disabled)
               <div class="absolute w-full h-full bg-gray-500 opacity-75 rounded">

               </div>
            @endif
        </span>
        @isset($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
        @endisset
        <input type="hidden" name="{{$name}}" value="{{$value}}" class="media-input">
        <input type="hidden" name="{{$altName}}" value="{{$altValue}}" class="media-input-alt">
    </div>
</div>

