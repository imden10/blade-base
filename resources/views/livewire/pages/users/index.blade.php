<x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumb="$breadcrumb"/>
</x-slot>
<div class="x-grid">
    <div>
        <div class="flex gap-4 mb-4">
            <x-forms.input title="Пошук" inline icon="fa fa-search" width="300px" wire:model.live="search" wire:input="resetChecked" />

{{--            <x-forms.select2 title="Статус" inline width="300px" wire:model.live="status" wire:input="resetChecked" :options="$options" searchable />--}}
            <x-forms.x-select title="Статус" inline width="300px" :val="$status" wire:model.live="status" wire:click="resetChecked" :options="optionsTreeToList($options)" searchable />
            <x-forms.x-select-ajax title="Тест ajax" :optOpen="$optOpen" inline width="300px" :val="$opt" wire:model.live="opt" :options="optionsTreeToList($this->optFilter)" />
{{--            <x-forms.x-select-ajax title="Тест ajax 2" :optOpen="$optOpen" inline width="300px" :val="$opt" wire:model.live="opt" :options="optionsTreeToList($this->optFilter)" />--}}
{{--            <x-wrapper.select title="Статус" inline width="300px">--}}
{{--                <select wire:model.live="status" wire:input="resetChecked">--}}
{{--                    <option value="">---</option>--}}
{{--                    @foreach(\App\Models\User::getStatuses() as $key => $item)--}}
{{--                        <option value="{{$key}}">{{$item['title']}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </x-wrapper.select>--}}
            <div>
                <x-buttons.a href="{{route('admin.users.create')}}" wire:navigate>Додати</x-buttons.a>
            </div>
        </div>
    </div>

    <x-table>
        <x-slot name="head">
            <x-table.heading width="50px">
                <x-wrapper.checkbox>
                    <input type="checkbox" id="item_check_all" wire:model="selectAllState" wire:click="selectAll">
                </x-wrapper.checkbox>
            </x-table.heading>
            <x-table.heading sortable :direction="$sort === 'id' ? $direction : null" wire:click="sortBy('id')" width="50px">ID</x-table.heading>
            <x-table.heading sortable :direction="$sort === 'name' ? $direction : null" wire:click="sortBy('name')">Фото, ім'я та почта</x-table.heading>
            <x-table.heading sortable :direction="$sort === 'phone' ? $direction : null" wire:click="sortBy('phone')" width="200px">Телефон</x-table.heading>
            <x-table.heading sortable :direction="$sort === 'status' ? $direction : null" wire:click="sortBy('status')" width="200px">Статус</x-table.heading>
            <x-table.heading sortable :direction="$sort === 'last_seen_at' ? $direction : null" wire:click="sortBy('last_seen_at')" width="200px">Остання активність</x-table.heading>
            <x-table.heading sortable :direction="$sort === 'created_at' ? $direction : null" wire:click="sortBy('created_at')" width="200px">Дата створення</x-table.heading>
        </x-slot>
        <x-slot name="body">
            @foreach($model as $item)
                <x-table.row>
                    <x-table.cell>
                        <x-wrapper.checkbox>
                            <input type="checkbox" id="item_check_{{$item->id}}" wire:model.change="checked" wire:click="checkItem" value="{{$item->id}}">
                        </x-wrapper.checkbox>
                    </x-table.cell>
                    <x-table.cell>{{$item->id}}</x-table.cell>
                    <x-table.cell>
                        <div class="flex">
                            <x-labels.user-pic :user="$item" :online="$item->online" />
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$item->name}}</div>
                                <div class="font-normal text-gray-500">{{$item->email}}</div>
                            </div>
                        </div>
                    </x-table.cell>
                    <x-table.cell>{{$item->phone}}</x-table.cell>
                    <x-table.cell>
                        <x-labels.status :data="$item->getStatus()" />
                    </x-table.cell>
                    <x-table.cell>{{$item->last_seen_at->calendar()}}</x-table.cell>
                    <x-table.cell>{{$item->created_at->format('d.m.Y')}}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    <div class="flex justify-between my-4">
        <div>
            <x-buttons.dropdown title="Групові дії" class="group-actions-btn" :disabled="!count($checked)" >
                <x-buttons.dropdown-item title="Видалити" class="delete-all-btn" />
            </x-buttons.dropdown>
        </div>
        <div>
            {{ $model->appends(request()->all())->links() }}
        </div>
    </div>
</div>
<x-slot name="scripts">
    <script>
        window.Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
            console.log('users page update');
        });
    </script>
</x-slot>
