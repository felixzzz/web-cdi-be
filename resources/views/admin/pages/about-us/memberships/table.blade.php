@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.awards-and-certificates.memberships.create')" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head key="file">Image</x-portal::table.head>
                    <x-portal::table.head sortable key="name_en">Name EN</x-portal::table.head>
                    <x-portal::table.head sortable key="name_id">Name ID</x-portal::table.head>
                    <x-portal::table.head sortable key="content_en">Content EN</x-portal::table.head>
                    <x-portal::table.head sortable key="content_id">Content ID</x-portal::table.head>
                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">
                            <img src="{{ previewFile($row->file) }}" alt="" class="h-[60px] rounded-md">
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_en }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_id }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            <div class="w-[200px]">
                                {!! $row->content_en !!}
                            </div>
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            <div class="w-[200px]">
                                {!! $row->content_id !!}
                            </div>
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.awards-and-certificates.memberships.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.awards-and-certificates.memberships.destroy', $row->ulid) }}')">
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
