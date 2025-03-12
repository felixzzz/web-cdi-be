@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.awards-and-certificates.certificates.create')" :show-add="true" />
    <div x-data="{ showModal: false, images: [], currentIndex: 0 }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head key="file">Image</x-portal::table.head>
                    <x-portal::table.head sortable key="name_en">Name EN</x-portal::table.head>
                    <x-portal::table.head sortable key="name_id">Name ID</x-portal::table.head>
                    <x-portal::table.head class="text-right">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">
                            @if (is_array($row->files) && count($row->files) > 0)
                                <img
                                    src="{{ previewFile($row->files[0]) }}" alt="" class="h-[60px] rounded-md cursor-pointer"
                                    x-on:click="images = {{ json_encode(array_map(fn($file) => previewFile($file), $row->files ?? [])) }}; currentIndex = 0; showModal = true"
                                >
                            @endif
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_en }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->name_id }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.awards-and-certificates.certificates.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.awards-and-certificates.certificates.destroy', $row->ulid) }}')">
                                        Delete
                                    </x-dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @empty
                <x-portal::table.row>
                    <x-portal::table.cell colspan="4">
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

        <!-- Image Modal -->
        <div x-show="showModal" x-transition class="fixed inset-0 bg-black/75 flex items-center justify-center z-50">
                <button x-on:click="showModal = false" class="fixed top-3 right-3 bg-white rounded-full w-8 h-8 flex items-center justify-center">
                    &times;
                </button>
            <div class="relative w-full">
                <div class="relative w-full h-[80vh] flex items-center justify-center">
                    <button x-on:click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1" class="absolute left-3 bg-white rounded-full w-8 h-8 flex items-center justify-center">
                        <i class="isax icon-arrow-left-2"></i>
                    </button>
                    <img x-bind:src="images[currentIndex]" class="max-h-full max-w-full object-contain" />
                    <button x-on:click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0" class="absolute right-3 bg-white rounded-full w-8 h-8 flex items-center justify-center">
                        <i class="isax icon-arrow-right-3"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
