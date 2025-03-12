@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :show-add="false" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="created_at">Datetime</x-portal::table.head>
                    <x-portal::table.head sortable key="email">Email</x-portal::table.head>
                    <x-portal::table.head sortable key="first_name">Name</x-portal::table.head>
                    <x-portal::table.head>Topic</x-portal::table.head>
                    <x-portal::table.head>Country</x-portal::table.head>
                    <x-portal::table.head class="text-right">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->created_at }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->email }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->full_name }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->topic?->name_en }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->country?->name }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.inbox.contact-us.show', $row->ulid)" as="a" >
                                        Detail
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.inbox.contact-us.destroy', $row->ulid) }}')">
                                        Delete
                                    </x-dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @empty
                <x-portal::table.row>
                    <x-portal::table.cell colspan="6">
                        <div class="flex items-center gap-3 justify-center">
                            @svg('tabler-info-circle-f', ['class' => 'icon'])
                            Data Empty
                        </div>
                    </x-portal::table.cell>
                </x-portal::table.row>
                @endforelse
            </tbody>
        </x-portal::table>

        <div class="mt-5">
            {{ $data->links() }}
        </div>

        <x-layouts.alert-delete />
    </div>
@endsection
