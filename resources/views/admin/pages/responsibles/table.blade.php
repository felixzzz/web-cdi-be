@extends('admin.layouts.main')

@section('content')
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="name_en">Key</x-portal::table.head>
                    <x-portal::table.head class="flex justify-end">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->key }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-portal::dropdown-menu.item :href="route('admin.responsibles.edit', $row->ulid)" as="a" >
                                        Edit
                                    </x-portal::dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @empty
                <x-portal::table.row>
                    <x-portal::table.cell colspan="2">
                        <div class="flex items-center gap-3 justify-center">
                            @svg('tabler-info-circle-f', ['class' => 'icon'])
                            Data Empty
                        </div>
                    </x-portal::table.cell>
                </x-portal::table.row>
                @endforelse
            </tbody>
        </x-portal::table>
        <x-layouts.alert-delete />
    </div>
@endsection
