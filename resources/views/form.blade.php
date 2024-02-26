<x-app-layout>
    @isset($breadcrumb)
        <x-slot name="breadcrumb">
          <x-breadcrumb :breadcrumb="$breadcrumb"/>
        </x-slot>
    @endisset
    <x-forms.form action="/dasdf" method="post">
        <livewire:com.forms.datepicker width="200px" icon="fa fa-calendar" format="dd.mm.yyyy" value="01-01-2023"/>
        <livewire:com.forms.daterangepicker
            icon="fa fa-calendar"
            format="dd-mm-yyyy"
            nameStart="from"
            nameEnd="to"
            placeholderStart="Початок"
            placeholderEnd="Кінець"
        />

        <livewire:com.forms.input title="Livewire input" placeholder="123" name="name" icon="fa fa-pen" />
        <livewire:com.forms.number title="Number" placeholder="123" name="name" icon="fa fa-pen" />
        <livewire:com.forms.input-select
           title="Input select"
           name="amount"
           value="0"
           select_name="amount_unit"
           select_value="1"
           :select_options="[['id' => 1,'text' => 'т.'],['id' => 2,'text' => 'тис.м3']]"
        />
        <livewire:com.forms.select2 title="Select2" value="2" :options="[['id' => 2,'text' => '222222222']]" name="select1" searchable />
        <livewire:com.forms.select2 title="Select2 multiple" :value="[2]" multiple name="select2[]" :options="[['id' => 2,'text' => '222222222']]" />
        <livewire:com.forms.select2 title="Select2 ajax" value="2" :options="[['id' => 2,'text' => '222222222']]" name="select2" ajaxUrl="/search-options" />
        <livewire:com.forms.text title="Textarea" placeholder="Enter text" name="description" />
        <livewire:com.forms.checkbox title="Checkbox" name="yn" checked="true" />
        <livewire:com.forms.toggle title="Toggle" name="yn_toggle" />
        <livewire:com.forms.radio title="UK" name="lang" value="uk" checked="true" />
        <livewire:com.forms.radio title="EN" name="lang" value="en" />


        <div>
            <x-buttons.btn>Default</x-buttons.btn>
            <x-buttons.btn btn="dark">Dark</x-buttons.btn>
            <x-buttons.btn btn="light">Light</x-buttons.btn>
            <x-buttons.btn btn="green" onclick="notify('Все добре','x-success')">Green</x-buttons.btn>
            <x-buttons.btn btn="red" onclick="notify('Сталася помилка','x-error')">Red</x-buttons.btn>
            <x-buttons.btn btn="yellow" onclick="notify('Попередження','x-warning')">Yellow</x-buttons.btn>
            <x-buttons.btn btn="purple" onclick="swal('Ви впевнені','Ви намагаєтесь видалити компонент','error')">Purple</x-buttons.btn>
            <x-buttons.btn btn="link" onclick="alert('123')">Link</x-buttons.btn>
            <x-buttons.a href="/admin/test">Default link</x-buttons.a>
            <x-buttons.a btn="green" href="/admin/test" blank>Default link blank</x-buttons.a>
        </div>

        <div class="text-right">
            <x-buttons.btn type="submit">Submit</x-buttons.btn>
        </div>
    </x-forms.form>
</x-app-layout>
