@extends('admin.layouts.main')

@section('content')
    <div class="flex items-center justify-between gap-4 mb-4">
        <x-portal::button href="{{ route('admin.teams.create') }}">
            <x-tabler-plus class="icon" />
            Add Data
        </x-portal::button>

        <form method="GET" class="flex items-center gap-2">
            <x-portal::form.input
                name="search"
                placeholder="Search name or position..."
                value="{{ request('search') }}"
                class="!mb-0 w-[240px]"
            />
            <x-portal::button variant="secondary" type="submit">
                <x-tabler-search class="icon" />
            </x-portal::button>
            @if(request('search'))
                <x-portal::button variant="ghost" href="{{ route('admin.teams.index') }}" as="a">
                    Clear
                </x-portal::button>
            @endif
        </form>
    </div>

    <div x-data="{
        activeTab: '{{ $data->first()->type->value ?? 'bod' }}',
        alertDialog: '',
        toastMessage: '',
        showToast: false,
        notify(msg) {
            this.toastMessage = msg;
            this.showToast = true;
            setTimeout(() => { this.showToast = false }, 2500);
        }
    }" class="relative">

        <!-- Toast Notification -->
        <div x-show="showToast"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="fixed bottom-5 right-5 z-50 bg-neutral-900 text-white px-4 py-2.5 rounded-lg shadow-lg flex items-center gap-2 text-sm"
             style="display: none;">
            @svg('tabler-check', ['class' => 'icon text-green-400 w-4 h-4'])
            <span x-text="toastMessage"></span>
        </div>

        <!-- Tabs -->
        <div class="flex border-b border-border mb-4">
            @foreach ($data as $group)
                <button
                    type="button"
                    @click="activeTab = '{{ $group->type->value }}'"
                    :class="activeTab === '{{ $group->type->value }}' ? 'border-b-2 border-primary text-primary font-bold' : 'text-muted-foreground hover:text-foreground'"
                    class="px-5 py-2.5 text-sm transition-colors cursor-pointer flex items-center gap-2">
                    <span>{{ $group->type->word() }}</span>
                    <span class="text-xs px-2 py-0.5 rounded-full bg-muted font-normal">
                        {{ $group->items->count() }}
                    </span>
                </button>
            @endforeach
        </div>

        <!-- Tables per Tab -->
        @foreach ($data as $group)
            <div x-show="activeTab === '{{ $group->type->value }}'" style="display: none;">
                <x-portal::card class="w-full">
                    <x-portal::table>
                        <thead>
                            <x-portal::table.row class="!text-neutral-800">
                                <th class="w-10"></th>
                                <x-portal::table.head class="w-16">Sort</x-portal::table.head>
                                <x-portal::table.head>Name</x-portal::table.head>
                                <x-portal::table.head>Position</x-portal::table.head>
                                <x-portal::table.head>Image</x-portal::table.head>
                                <x-portal::table.head>Image Hero</x-portal::table.head>
                                <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                            </x-portal::table.row>
                        </thead>
                        <tbody class="divide-y divide-border sortable" id="sortable-{{ $group->type->value }}" data-type="{{ $group->type->value }}">
                            @forelse($group->items as $row)
                                <x-portal::table.row data-id="{{ $row->id }}" class="draggable cursor-grab active:cursor-grabbing hover:bg-muted/40 transition-colors">
                                    <x-portal::table.cell class="font-medium">
                                        <span class="handle cursor-grab text-muted-foreground hover:text-foreground inline-block select-none" title="Drag to reorder">
                                            @svg('tabler-arrows-move', ['class' => 'icon w-4 h-4 pointer-events-none'])
                                        </span>
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">
                                        <span class="sort-badge inline-flex items-center justify-center w-6 h-6 rounded-full bg-muted text-xs font-semibold select-none">
                                            {{ $row->sort }}
                                        </span>
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">{{ $row->name }}</x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">{{ $row->position }}</x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">
                                        <img src="{{ previewFile($row->image) }}" alt="" class="h-[60px] rounded-md object-cover select-none pointer-events-none">
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium">
                                        <img src="{{ previewFile($row->image_hero) }}" alt="" class="h-[60px] rounded-md object-cover select-none pointer-events-none">
                                    </x-portal::table.cell>
                                    <x-portal::table.cell class="font-medium text-right">
                                        <x-portal::dropdown-menu class="flex justify-end">
                                            <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                                <x-tabler-dots class="h-4.5" />
                                            </x-portal::dropdown-menu.trigger>
                                            <x-portal::dropdown-menu.content class="w-fit" align="end">
                                                <x-portal::dropdown-menu.item :href="route('admin.teams.edit', $row->ulid)" as="a">
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
                                    <x-portal::table.cell colspan="7">
                                        <div class="flex items-center gap-3 justify-center py-6 text-muted-foreground">
                                            @svg('tabler-info-circle-f', ['class' => 'icon'])
                                            No members in this category
                                        </div>
                                    </x-portal::table.cell>
                                </x-portal::table.row>
                            @endforelse
                        </tbody>
                    </x-portal::table>
                </x-portal::card>
            </div>
        @endforeach

        <x-layouts.alert-delete />
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/dist/sortable.min.js') }}"></script>

    <script>
        (function() {
            function initSortable() {
                if (typeof Sortable === 'undefined') {
                    console.error('Sortable library is not loaded');
                    return;
                }

                document.querySelectorAll('.sortable').forEach(table => {
                    new Sortable(table, {
                        animation: 200,
                        ghostClass: "bg-blue-100",
                        dragClass: "opacity-75",
                        filter: "button, a, input, select, .dropdown-menu",
                        preventOnFilter: false,
                        onEnd: function (evt) {
                            let order = [];
                            table.querySelectorAll("tr.draggable").forEach((row, index) => {
                                let id = row.getAttribute("data-id");
                                if (id) {
                                    let newSort = index + 1;
                                    order.push({ id: id, sort: newSort });
                                    let badge = row.querySelector(".sort-badge");
                                    if (badge) badge.textContent = newSort;
                                }
                            });

                            if (order.length === 0) return;

                            fetch("{{ route('admin.teams.sort') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({ order: order })
                            })
                            .then(res => res.json())
                            .then(data => {
                                const container = document.querySelector('[x-data]');
                                if (container && container._x_dataStack) {
                                    const alpineData = container._x_dataStack[0];
                                    if (alpineData && typeof alpineData.notify === 'function') {
                                        alpineData.notify("Urutan berhasil diperbarui!");
                                    }
                                }
                            })
                            .catch(error => console.error("Failed to update sort order:", error));
                        }
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initSortable);
            } else {
                initSortable();
            }
        })();
    </script>
@endpush
