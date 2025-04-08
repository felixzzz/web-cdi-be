@php
    $user = auth()->user();
@endphp

@if ($footer)
    <x-portal::sidebar.footer.profile
        :title="$user->name"
        :description="$user->email"
        :profile="$user->profile"
        alias="SA"
    >

        <x-portal::dropdown-menu.separator />

        {{-- <x-portal::dropdown-menu.item as="a" href="/">
            <x-tabler-bell class="h-4 w-4" />
            Notification
        </x-portal::dropdown-menu.item> --}}

        <x-portal::dropdown-menu.separator />

        <x-portal::dropdown-menu.item as="button" type="button" variant="danger" onclick="showLogout()">
            <x-tabler-logout class="h-4 w-4" />
            Logout
        </x-portal::dropdown-menu.item>

    </x-portal::sidebar.footer.profile>
@else
    <x-portal::layout.profile
        :title="$user->name"
        :description="$user->email"
        :profile="$user->profile"
        alias="SA"
    >

        <x-portal::dropdown-menu.separator />

        {{-- <x-portal::dropdown-menu.item as="a" href="/">
            <x-tabler-bell class="h-4 w-4" />
            Notification
        </x-portal::dropdown-menu.item> --}}

        <x-portal::dropdown-menu.separator />

        <x-portal::dropdown-menu.item as="button" type="button" variant="danger" onclick="showLogout()">
            <x-tabler-logout class="h-4 w-4" />
            Logout
        </x-portal::dropdown-menu.item>

    </x-portal::layout.profile>
@endif

