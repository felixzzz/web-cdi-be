@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.article.blog.create')" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head key="articles.thumbnail">Thumbnail</x-portal::table.head>
                    <x-portal::table.head sortable key="articles.datetime">Datetime</x-portal::table.head>
                    <x-portal::table.head sortable key="articles.title_en">Title EN</x-portal::table.head>
                    <x-portal::table.head sortable key="articles.title_id">Title ID</x-portal::table.head>
                    <x-portal::table.head sortable key="articles.status">Status</x-portal::table.head>
                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">
                            <img src="{{ previewFile($row->thumbnail) }}" alt="" class="h-[60px] rounded-md">
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->datetime }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->title_en }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->title_id }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">
                            @if ($row->status)
                                <x-portal::badge variant="solid" color="emerald">Published</x-portal::badge>
                            @else
                                <x-portal::badge variant="solid">Draft</x-portal::badge>
                            @endif
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.article.blog.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.article.blog.destroy', $row->ulid) }}')">
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
