<div class="x-grid">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="p-4">
                <livewire:com.forms.checkbox class="check-all" />
            </th>
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">Фото, ім'я та почта</th>
            <th class="px-6 py-3">Телефон</th>
            <th class="px-6 py-3">Статус</th>
            <th class="px-6 py-3">Остання активність</th>
            <th class="px-6 py-3">Дата створення</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model as $item)
            <tr class="bg-white border-b hover:bg-gray-50" style="vertical-align: center">
                <td class="w-4 pl-4">
                    <livewire:com.forms.checkbox class="checkbox-item" />
                </td>
                <td class="px-6 py-4">{{$item->id}}</td>
                <td class="px-6 py-4">
                    <div class="flex">
                        <x-labels.user-pic :user="$item" />
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{$item->name}}</div>
                            <div class="font-normal text-gray-500">{{$item->email}}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">{{$item->phone}}</td>
                <td class="px-6 py-4">
                    <x-labels.status :data="$item->getStatus()" />
                </td>
                <td class="px-6 py-4">{{$item->last_seen_at->calendar()}}</td>
                <td class="px-6 py-4">{{$item->created_at->format('d.m.Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="flex justify-between my-4">
        <div>
            <x-buttons.dropdown title="Групові дії" class="group-actions-btn" disabled>
                <x-buttons.dropdown-item title="Видалити" class="delete-all-btn" />
            </x-buttons.dropdown>
        </div>
        <div>
            {{ $model->appends(request()->all())->links() }}
        </div>
    </div>
</div>
