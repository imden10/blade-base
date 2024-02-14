<x-app-layout>
    <div class="flex gap-4 p-2">
        <button class="py-2 px-5 bg-yg-500 text-white font-semibold rounded-full shadow-md hover:bg-yg-700 focus:outline-none focus:ring focus:ring-yg-400 focus:ring-opacity-75">
            My color
        </button>

        <!-- After extracting a custom class -->
        <button class="btn-primary">
            Save changes
        </button>

        <!-- After extracting a custom class -->
        <button class="btn-success">
            Save changes
        </button>
    </div>
    <div class="container mx-auto md:columns-6 sm:columns-1">
        <div>1111111</div>
        <div>2222222</div>
        <div>3333333</div>
        <div>4444444</div>
        <div>5555555</div>
        <div>6666666</div>
    </div>
    <div class="flex gap-[10px] mx-[15px] justify-between items-center">
        <div class="bg-yg-500 rounded-full shadow cursor-pointer px-4 py-1">
            <p>1111111</p>
        </div>
        <div class="bg-yg-500">
            2222222
            <p>3333333</p>
        </div>
    </div>

    <table class="w-full">
        <thead>
            <tr>
                <th>11</th>
                <th>2222222</th>
                <th>3333</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>11111111</td>
                <td>2222222</td>
                <td>33333333 3333 3333</td>
            </tr>
        </tbody>
    </table>

    <div>
        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
        <div class="relative mt-2 rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-500 sm:text-sm">$</span>
            </div>
            <input type="text" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0.00">
            <div class="absolute inset-y-0 right-0 flex items-center">
                <label for="currency" class="sr-only">Currency</label>
                <select id="currency" name="currency" class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                    <option>USD</option>
                    <option>CAD</option>
                    <option>EUR</option>
                </select>
            </div>
        </div>
    </div>

    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" class="sr-only peer" checked="">
        <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] ltr:after:left-[2px] rtl:after:right-5 peer-checked:after:left-1.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-zinc-600 peer-checked:bg-sky-500"></div>
        <span class="text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3 dark:text-zinc-100">Info</span>
    </label>

    {{-- tabs --}}

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
    </div>


    <x-forms.input>Hello</x-forms.input>
</x-app-layout>
