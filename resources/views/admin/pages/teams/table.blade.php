@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.teams.create')" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="type">Type</x-portal::table.head>
                    <x-portal::table.head sortable key="name">Name</x-portal::table.head>
                    <x-portal::table.head sortable key="position">Position</x-portal::table.head>
                    <x-portal::table.head>Image</x-portal::table.head>
                    <x-portal::table.head>Image Hero</x-portal::table.head>
                    <x-portal::table.head class="text-right">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->type->word(0) }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->position }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            <img src="{{ previewFile($row->image) }}" alt="" class="h-[60px] rounded-md">
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            <img src="{{ previewFile($row->image_hero) }}" alt="" class="h-[60px] rounded-md">
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.teams.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.teams.destroy', $row->ulid) }}')">
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
