<x-app-layout>
    @isset($breadcrumb)
        <x-slot name="breadcrumb">
            <x-breadcrumb :breadcrumb="$breadcrumb"/>
        </x-slot>
    @endisset
    <iframe src="/filemanager?type=file" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
</x-app-layout>
