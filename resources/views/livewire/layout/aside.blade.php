<aside id="bb-aside" class="min-w-[250px] w-[250px] bg-gray-50 min-h-screen fixed top-0 left-[-250px] md:static z-50">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">

        <a href="#" class="flex items-center ps-2.5 mb-5">
            <img src="/img/logo.svg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{env('APP_NAME')}}</span>
        </a>

        <ul class="space-y-2 font-medium">
            <x-aside.item route="admin.dashboard" title="Dashboard" icon="fa-solid fa-house" is-active="{{ $this->isActive('admin.dashboard')}}" />
            <x-aside.item route="admin.test" title="Test" icon="fa-solid fa-pen" is-active="{{ $this->isActive('admin.test')}}" />
            <x-aside.dropdown is-active-group="{{$this->isActiveGroup('admin.e-commence')}}" title="E-commerce" icon="fa-solid fa-user">
                <x-aside.sub-item route="admin.e-commence.products" title="Products" is-active="{{ $this->isActive('admin.e-commence.products')}}" />
                <x-aside.sub-item title="Pages" />
            </x-aside.dropdown>
        </ul>
    </div>
</aside>
