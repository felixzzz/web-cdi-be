@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :route-add="route('admin.page-management.governance-files.create', ['type' => $type])" :show-add="true" />
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <th></th>
                    <x-portal::table.head>Key</x-portal::table.head>
                    <x-portal::table.head>Name EN</x-portal::table.head>
                    <x-portal::table.head>Name ID</x-portal::table.head>
                    <x-portal::table.head>File Information</x-portal::table.head>
                    <x-portal::table.head>Show on Governance Page?</x-portal::table.head>
                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border sortable">
                @forelse($data as $row)
                    <x-portal::table.row data-id="{{ $row->id }}" class="draggable">
                        <x-portal::table.cell class="font-medium">
                            <a href="javascript:;" class="handle cursor-move">
                                @svg('tabler-arrows-move', ['class' => 'icon'])
                            </a>
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->unique_key }}</x-portal::table.cell>
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
                        <x-portal::table.cell class="font-medium">
                            @if ($row->show_on_governance)
                                <x-portal::badge variant="solid" color="emerald">Yes</x-portal::badge>
                            @else
                                <x-portal::badge variant="solid">No</x-portal::badge>
                            @endif
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.page-management.governance-files.edit', ['governance_file' => $row->ulid, 'type' => $type])" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.page-management.governance-files.destroy', ['governance_file' => $row->ulid, 'type' => $type]) }}')">
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
                        let currentPage = parseInt("{{ $data->currentPage() }}");
                        let perPage = parseInt("{{ $data->perPage() }}");
                        let offset = (currentPage - 1) * perPage; // Hitung offset berdasarkan halaman

                        table.querySelectorAll("tr").forEach((row, index) => {
                            let id = row.getAttribute("data-id");
                            if (id) {
                                order.push({ id: id, sort: offset + index + 1 }); // Sesuaikan index dengan offset
                            }
                        });


                        fetch("{{ route('admin.page-management.governance-files.sort', ['type' => $type]) }}", {
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
