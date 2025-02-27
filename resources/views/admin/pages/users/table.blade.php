@extends('admin.layouts.main')

@section('content')
    <x-layouts.search :popup-form="true" :show-add="true" :form-action="route('admin.users.store')" form-method="POST">
        <x-slot:form-content>
            @csrf
            <x-portal::alert-dialog.title>
                Create User Admin
            </x-portal::alert-dialog.title>
            <div class="flex flex-col gap-2 my-4">
                <x-portal::form.input name="name" label="Name" placeholder="Name" type="text" required />
                <x-portal::form.input name="email" label="Email" placeholder="Email" type="email" required />
                <x-portal::form.select
                    name="role_id"
                    label="Role"
                    placeholder="Role"
                    description=""
                    description-trailing=""
                >
                    <option value="Select" selected disabled>
                        Select
                    </option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </x-portal::form.select>
                <x-portal::form.select
                    name="status"
                    label="Status"
                    placeholder="Status"
                    description=""
                    description-trailing=""
                >
                    <option value="Select" selected disabled>
                        Select
                    </option>
                    <option value="1">Active</option>
                    <option value="0">Non Active</option>
                </x-portal::form.select>
                <x-portal::form.input name="password" label="Password" placeholder="Password" type="password" viewable required />
            </div>
            <x-portal::alert-dialog.action>
                <x-portal::alert-dialog.cancel>Cancel</x-portal::alert-dialog.cancel>
                <x-portal::alert-dialog.confirm>Submit</x-portal::alert-dialog.confirm>
            </x-portal::alert-dialog.action>

        </x-slot>
    </x-layouts.search>
    <div x-data="{ alertDialog: '' }">
        <x-portal::table>
            <thead>
                <x-portal::table.row class="!text-neutral-800">
                    <x-portal::table.head sortable key="users.name">Name</x-portal::table.head>
                    <x-portal::table.head sortable key="users.email">Email</x-portal::table.head>
                    <x-portal::table.head sortable key="roles.name">Role</x-portal::table.head>
                    <x-portal::table.head sortable key="users.status">Status</x-portal::table.head>
                    <x-portal::table.head class="text-right">Action</x-portal::table.head>
                </x-portal::table.row>
            </thead>
            <tbody class="divide-y divide-border">
                @foreach($data as $row)
                    <x-portal::table.row>
                        <x-portal::table.cell class="font-medium">{{ $row->name }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->email }}</x-portal::table.cell>
                        <x-portal::table.cell class="font-medium">{{ $row->role }}</x-portal::table.cell>
                        <x-portal::table.cell>
                            @if ($row->status)
                                <x-portal::badge variant="solid" color="emerald">Active</x-portal::badge>
                            @else
                                <x-portal::badge variant="solid">Non Active</x-portal::badge>
                            @endif
                        </x-portal::table.cell>
                        <x-portal::table.cell class="font-medium text-right">
                            <x-portal::dropdown-menu class="flex justify-end">
                                <x-portal::dropdown-menu.trigger variant="ghost" class="h-fit !px-1 !py-1">
                                    <x-tabler-dots class="h-4.5" />
                                </x-portal::dropdown-menu.trigger>
                                <x-portal::dropdown-menu.content class="w-fit" align="end">
                                    <x-dropdown-menu.item x-on:click="alertDialog='dialog-form-edit-popup';menuOpen=false" onclick="showPopupEdit('{{ route('admin.users.update', $row->ulid) }}', {{ $row }})">
                                        Edit
                                    </x-dropdown-menu.item>
                                    <x-dropdown-menu.item variant="danger" x-on:click="alertDialog='dialog-form-delete-popup';menuOpen=false" onclick="showPopupDelete('{{ route('admin.users.destroy', $row->ulid) }}')">
                                        Delete
                                    </x-dropdown-menu.item>
                                </x-portal::dropdown-menu.content>
                            </x-portal::dropdown-menu>
                        </x-portal::table.cell>
                    </x-portal::table.row>
                @endforeach
            </tbody>
        </x-portal::table>

        <section id="dialog-form-edit-popup">
            <x-portal::alert-dialog id="dialog-form-edit-popup">
                <x-portal::alert-dialog.content method="POST" class="z-[99]">
                    @csrf
                    @method("PUT")
                    <x-portal::alert-dialog.title>
                        Edit User Admin
                    </x-portal::alert-dialog.title>
                    <div class="flex flex-col gap-2 my-4">
                        <x-portal::form.input name="name" label="Name" placeholder="Name" type="text" required />
                        <x-portal::form.input name="email" label="Email" placeholder="Email" type="email" required />
                        <x-portal::form.select
                            name="role_id"
                            label="Role"
                            placeholder="Role"
                            description=""
                            description-trailing=""
                        >
                            <option value="Select" selected disabled>
                                Select
                            </option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </x-portal::form.select>
                        <x-portal::form.select
                            name="status"
                            label="Status"
                            placeholder="Status"
                            description=""
                            description-trailing=""
                        >
                            <option value="Select" selected disabled>
                                Select
                            </option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </x-portal::form.select>
                        <x-portal::form.input name="password" label="New Password" placeholder="Password" type="password" viewable />
                    </div>
                    <x-portal::alert-dialog.action>
                        <x-portal::alert-dialog.cancel>Cancel</x-portal::alert-dialog.cancel>
                        <x-portal::alert-dialog.confirm>Submit</x-portal::alert-dialog.confirm>
                    </x-portal::alert-dialog.action>
                </x-portal::alert-dialog.content>
            </x-portal::alert-dialog>
        </section>

        <x-layouts.alert-delete />
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/dist/js/pages/admin.users.js') }}"></script>
@endpush
