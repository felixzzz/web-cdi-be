@extends('admin.layouts.main')

@section('content')
    <x-portal::button href="{{ route('admin.rating-recognitions.create') }}" class="mb-3">
        <x-tabler-plus class="icon" />
        Add Data
    </x-portal::button>

    <div x-data="{ activeTab: '{{ $data->first()->type->value ?? '' }}' }">
        <!-- Tabs -->
        <div class="flex border-b">
            @foreach ($data as $group)
                <button
                    @click="activeTab = '{{ $group->type->value }}'"
                    :class="activeTab === '{{ $group->type->value }}' ? 'border-b-2 border-primary text-primary font-bold' : ''"
                    class="px-4 py-2">
                    {{ $group->type->word() }}
                </button>
            @endforeach
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 gap-6 mt-4">
            @foreach ($data as $group)
                <div x-show="activeTab === '{{ $group->type->value }}'">
                    <x-portal::card class="w-full space-y-6">
                        <x-portal::table>
                            <thead>
                                <x-portal::table.row class="!text-neutral-800">
                                    <td></td>
                                    <x-portal::table.head>Image</x-portal::table.head>
                                    <x-portal::table.head sortable key="name_en">Name EN</x-portal::table.head>
                                    <x-portal::table.head sortable key="name_id">Name ID</x-portal::table.head>
                                    <x-portal::table.head sortable key="content_en">Content EN</x-portal::table.head>
                                    <x-portal::table.head sortable key="content_id">Content ID</x-portal::table.head>
                                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                                </x-portal::table.row>
                            </thead>
                            <tbody class="divide-y divide-border sortable" id="sortable-{{ $group->type->value }}">
                                @forelse($group->items as $row)
                                    <x-portal::table.row data-id="{{ $row->id }}" class="draggable">
                                        <x-portal::table.cell class="font-medium">
                                            <a href="javascript:;" class="handle cursor-move">
                                                @svg('tabler-arrows-move', ['class' => 'icon'])
                                            </a>
                                        </x-portal::table.cell>
                                        <x-portal::table.cell class="font-medium">
                                            <img src="{{ previewFile($row->image) }}" alt="" class="h-[60px] rounded-md">
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
                                                    <x-portal::dropdown-menu.item :href="route('admin.rating-recognitions.edit', $row->ulid)" as="a">
                                                        Edit
                                                    </x-portal::dropdown-menu.item>
                                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.rating-recognitions.destroy', $row->ulid) }}')">
                                                        Delete
                                                    </x-dropdown-menu.item>
                                                </x-portal::dropdown-menu.content>
                                            </x-portal::dropdown-menu>
                                        </x-portal::table.cell>
                                    </x-portal::table.row>
                                @empty
                                    <x-portal::table.row>
                                        <x-portal::table.cell colspan="7">
                                            <div class="flex items-center gap-3 justify-center">
                                                @svg('tabler-info-circle-f', ['class' => 'icon'])
                                                Data Empty
                                            </div>
                                        </x-portal::table.cell>
                                    </x-portal::table.row>
                                @endforelse
                            </tbody>
                        </x-portal::table>
                    </x-portal::card>
                </div>
            @endforeach
        </div>
        <x-layouts.alert-delete />
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.sortable').forEach(table => {
                new Sortable(table, {
                    handle: ".handle",
                    animation: 150,
                    ghostClass: "bg-gray-100",
                    onEnd: function (evt) {
                        let order = [];
                        table.querySelectorAll("tr").forEach((row, index) => {
                            let id = row.getAttribute("data-id");
                            if (id) {
                                order.push({ id: id, sort: index + 1 });
                            }
                        });

                        fetch("{{ route('admin.rating-recognitions.sort') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({ order: order })
                        }).catch(error => console.error(error));
                    }
                });
            });
        });
    </script>
@endpush
