@extends('admin.layouts.main')

@section('content')
    <x-portal::button href="{{ route('admin.quick-links.create') }}" class="mb-3">
        <x-tabler-plus class="icon" />
        Add Data
    </x-portal::button>
    <div x-data="{ alertDialog: '' }">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($data as $group)
                <x-portal::card class="w-full space-y-6">
                    <div class="space-y-1">
                        <x-portal::heading size="lg">{{ $group->category->word() }}</x-portal::heading>
                    </div>
                    <x-portal::table>
                        <thead>
                            <x-portal::table.row class="!text-neutral-800">
                                <td></td>
                                <x-portal::table.head sortable key="name_en">Name EN</x-portal::table.head>
                                <x-portal::table.head sortable key="name_id">Name ID</x-portal::table.head>
                                <x-portal::table.head sortable key="url">URL</x-portal::table.head>
                                <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                            </x-portal::table.row>
                        </thead>
                        <tbody class="divide-y divide-border sortable" id="sortable-{{ $group->category->value }}">
                            @forelse($group->items as $row)
                                <x-portal::table.row data-id="{{ $row->id }}" class="draggable">
                                    <x-portal::table.cell class="font-medium">
                                        <a href="javascript:;" class="handle cursor-move">
                                            @svg('tabler-arrows-move', ['class' => 'icon'])
                                        </a>
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">{{ $row->name_en }}</x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">{{ $row->name_id }}</x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">
                                        <a href="{{ $row->url }}" target="_blank">
                                            @svg('tabler-external-link', ['class' => 'icon'])
                                        </a>
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium text-right">
                                        <x-portal::dropdown-menu class="flex justify-end">
                                            <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                                <x-tabler-dots class="h-4.5" />
                                            </x-portal::dropdown-menu.trigger>
                                            <x-portal::dropdown-menu.content class="w-fit" align="end">
                                                <x-portal::dropdown-menu.item :href="route('admin.quick-links.edit', $row->ulid)" as="a" >
                                                    Edit
                                                </x-portal::dropdown-menu.item>
                                                <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.quick-links.destroy', $row->ulid) }}')">
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
                </x-portal::card>
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

                        fetch("{{ route('admin.quick-links.sort') }}", {
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
