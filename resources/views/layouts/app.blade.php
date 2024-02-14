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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex ">

            <livewire:layout.aside />

            <div class="bg-gray-100 w-full min-h-screen">
                <div class="min-h-full">
                    <livewire:layout.nav />

                    <main>
                        <div class="p-3">
                            {{ $slot }}
                        </div>
                    </main>
                </div>


            </div>
        </div>
        <script>
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

            function toggleMobileMenu(e)
            {
                let btn = e;
                let attr = btn.getAttribute('data-opened');

                let menu = document.getElementById('mobile-menu');
                let icon_0 = document.getElementById('mobile_menu_icon_0');
                let icon_1 = document.getElementById('mobile_menu_icon_1');

                if(attr === '0'){
                    menu.classList.remove('hidden');
                    menu.classList.add('block');
                    icon_0.classList.remove('block');
                    icon_0.classList.add('hidden');
                    icon_1.classList.remove('hidden');
                    icon_1.classList.add('block');
                    btn.setAttribute('data-opened','1');
                } else {
                    menu.classList.remove('block');
                    menu.classList.add('hidden');
                    icon_0.classList.remove('hidden');
                    icon_0.classList.add('block');
                    icon_1.classList.remove('block');
                    icon_1.classList.add('hidden');
                    btn.setAttribute('data-opened','0');
                }
            }
        </script>
    </body>
</html>
