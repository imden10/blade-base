<x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumb="$breadcrumb"/>
</x-slot>
<div class="x-grid">
    <form wire:submit="save">

        <x-forms.input title="Ім'я" inline icon="fa fa-search" width="300px" wire:model="form.name" :error="$errors->get('form.name')[0] ?? false" />

        <br>

        <x-forms.editor hint="Підказка текст" title="Текст" name="form.text" wire:model="form.text" value="{!! $form->text !!}" :error="$errors->get('form.text')[0] ?? false" />

        <x-buttons.btn btn="green" type="submit">Save</x-buttons.btn>
    </form>
</div>
