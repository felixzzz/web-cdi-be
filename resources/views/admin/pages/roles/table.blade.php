@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.roles.create')" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="name">Name</x-portal::table.head>
                    <x-portal::table.head sortable key="is_superadmin">Superadmin?</x-portal::table.head>
                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @foreach($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->name }}</x-portal::table.cell>
                        <x-portal::table.cell>
                            @if ($row->is_superadmin)
                                <x-portal::badge variant="solid" color="emerald">Superadmin</x-portal::badge>
                            @else
                                <x-portal::badge variant="solid">Normal</x-portal::badge>
                            @endif
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.roles.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.roles.destroy', $row->ulid) }}')">
                                        Delete
                                    </x-dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @endforeach
            </tbody>
        </x-portal::table>

        <div class="mt-5">
            {{ $data->links() }}
        </div>

        <x-layouts.alert-delete />
    </div>
@endsection
