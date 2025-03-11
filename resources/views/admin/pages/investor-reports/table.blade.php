@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.investor.reports.create')" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="type">Type</x-portal::table.head>
                    <x-portal::table.head sortable key="name_en">Name EN</x-portal::table.head>
                    <x-portal::table.head sortable key="name_id">Name ID</x-portal::table.head>
                    <x-portal::table.head>File Information</x-portal::table.head>
                    <x-portal::table.head class="text-right">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->type->word() }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_en }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_id }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            <a href="{{ previewFile(@$row->file_id['path']) }}" target="_blank" class="flex items-center gap-1">
                                ID: {{ @$row->file_id['size'] }} @svg('tabler-external-link', ['class' => 'icon'])
                            </a>
                            <br>
                            <a href="{{ previewFile(@$row->file_en['path']) }}" target="_blank" class="flex items-center gap-1">
                                EN: {{ @$row->file_en['size'] }} @svg('tabler-external-link', ['class' => 'icon'])
                            </a>
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.investor.reports.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.investor.reports.destroy', $row->ulid) }}')">
                                        Delete
                                    </x-dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @empty
                <x-portal::table.row>
                    <x-portal::table.cell colspan="5">
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
