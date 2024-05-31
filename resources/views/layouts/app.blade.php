<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{asset('/js/summernote/summernote-lite.min.css')}}" rel="stylesheet">

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css','resources/css/blade-base-admin.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex ">
            <livewire:layout.aside />
            <div class="bg-gray-100 w-full min-h-screen">
                <div class="min-h-full">
                    <livewire:layout.nav />
                    <main>
                        <div class="p-3">
                            @isset($breadcrumb) {{ $breadcrumb }} @endisset
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>
        </div>

        @include('layouts.com.x-image-info-modal')
        @include('layouts.com.x-file-info-modal')

        <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script data-navigate-once src="{{asset('/js/notify.min.js')}}"></script>
        <script data-navigate-once src="{{asset('/js/components/x-select.js')}}"></script>
        <script data-navigate-once src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script data-navigate-once src="{{asset('/js/summernote/summernote-lite-modified.js')}}"></script>
        <script data-navigate-once src="{{ asset('/js/summernote/summernote_plugins/summernote-uk-UA.js') }}"></script>
        <script data-navigate-once src="{{ asset('/js/summernote/summernote_plugins/summernote_lfm.js') }}"></script>
        <script data-navigate-once>
            function toggleAside(e)
            {
                let sidebar = document.getElementById('bb-aside');
                let btn = e;
                let attr = btn.getAttribute('data-opened');
                let icon_0 = document.getElementById('aside_menu_icon_0');
                let icon_1 = document.getElementById('aside_menu_icon_1');

                if(attr === '0'){
                    sidebar.classList.remove('left-[-250px]');
                    sidebar.classList.add('left-0');

                    icon_0.classList.remove('block');
                    icon_0.classList.add('hidden');
                    icon_1.classList.remove('hidden');
                    icon_1.classList.add('block');
                    btn.setAttribute('data-opened','1');
                } else {
                    sidebar.classList.remove('left-0');
                    sidebar.classList.add('left-[-250px]');
                    icon_0.classList.remove('hidden');
                    icon_0.classList.add('block');
                    icon_1.classList.remove('block');
                    icon_1.classList.add('hidden');
                    btn.setAttribute('data-opened','0');
                }
            }

            $.notify.addStyle('x-success', {
                html: '<div><div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert"> <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200"> <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"> <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/> </svg> <span class="sr-only">Check icon</span> </div> <div class="ms-3 text-sm font-normal min-w-[200px]" data-notify-text></div> <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close"> <span class="sr-only">Close</span> <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/> </svg> </button> </div></div>',
            });
            $.notify.addStyle('x-warning', {
                html: '<div><div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert"> <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-green-800 dark:text-green-200"> <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"> <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/> </svg> <span class="sr-only">Check icon</span> </div> <div class="ms-3 text-sm font-normal min-w-[200px]" data-notify-text></div> <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close"> <span class="sr-only">Close</span> <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/> </svg> </button> </div></div>',
            });
            $.notify.addStyle('x-error', {
                html: '<div><div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert"> <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-green-800 dark:text-green-200"> <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/> </svg> <span class="sr-only">Check icon</span> </div> <div class="ms-3 text-sm font-normal min-w-[200px]" data-notify-text></div> <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close"> <span class="sr-only">Close</span> <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/> </svg> </button> </div></div>',
            });

            function notify(text,type,time = 5000){
                $.notify(text, {
                    style: type,
                    autoHideDelay: time,
                });
            }

            const XSwal = Swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: "mx-2 px-4 py-2 rounded-lg text-white focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:bg-blue-800 bg-blue-700",
                    cancelButton: "mx-2 px-4 py-2 rounded-lg bg-white border border-gray-300 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 hover:bg-gray-100 text-gray-900",
                }
            });

            function swal(title,text,icon){
                // XSwal.fire({
                //     title: title,
                //     text: text,
                //     icon: icon,
                //     confirmButtonText: 'Cool',
                // })

                XSwal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        XSwal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            }
        </script>
        @livewireScripts
        @isset($scripts) {{ $scripts }} @endisset
    </body>
</html>
