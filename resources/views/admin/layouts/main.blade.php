<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle ?? '' }} | {{ env("APP_NAME") }}</title>


    @portalUI
    <link rel="stylesheet" href="{{ asset('assets/dist/style.css') }}">
    @stack('css')
</head>
<body class="bg-background text-foreground">
    <x-sidebar.provider>

        <x-sidebar>
            <x-sidebar.logo
                :title="env('APP_NAME')"
                :description="auth()->user()->role->name"
                logo="{{ asset('logo.jpg') }}"
            />
            <x-sidebar.content>
                <x-sidebar.item.group>
                    <x-sidebar.item.label>Menu</x-sidebar.item.label>
                    <x-sidebar.items>
                        @foreach ($menus as $menu)
                            @if(count($menu->sub) == 0)
                                <x-sidebar.item
                                    :href="$menu->route"
                                    :label="$menu->name"
                                    :active="isset($pageActive) && $pageActive == $menu->active ? true : false"
                                >
                                    @svg('tabler-{{ $menu->icon }}', ['class' => 'icon'])
                                    {{ $menu->name }}
                                </x-sidebar.item>
                            @else
                                <x-sidebar.item.dropdown
                                    :label="$menu->name"
                                    :icon="$menu->icon"
                                    :active="isset($pageActive) && $pageActive == $menu->active ? true : false"
                                >
                                    @foreach($menu->sub as $sub)
                                        <x-sidebar.item
                                            :href="$sub->route"
                                            :active="isset($subPageActive) && $subPageActive == $sub->active ? true : false"
                                        >
                                            {{ $sub->name }}
                                        </x-sidebar.item>
                                    @endforeach
                                </x-sidebar.item.dropdown>
                            @endif
                        @endforeach
                    </x-sidebar.items>
                </x-sidebar.item.group>

            </x-sidebar.content>

            <x-sidebar.footer>
                @if (auth()->user()->role->is_superadmin)
                    <x-sidebar.items>
                        <x-sidebar.item href="{{ route('admin.users.index') }}" label="User Admin" :active="isset($pageActive) && $pageActive == 'users' ? true : false">
                            <x-tabler-user class="icon" />
                            User Admin
                        </x-sidebar.item>
                    </x-sidebar.items>
                    <x-sidebar.items>
                        <x-sidebar.item href="{{ route('admin.roles.index') }}" label="Roles" :active="isset($pageActive) && $pageActive == 'roles' ? true : false">
                            <x-tabler-user-cog class="icon" />
                            Role & Permissions
                        </x-sidebar.item>
                    </x-sidebar.items>
                @endif

                <x-layouts.profile :footer="true" />
            </x-sidebar.footer>
        </x-sidebar>

        <div class="w-full peer-data-[state=collzapsed]:w-[calc(100%-var(--sidebar-width-icon)-1rem)] transition-[width] duration-200 ease-linear md:peer-data-[state=expanded]:w-[calc(100%-var(--sidebar-width))] flex flex-col">
            <x-portal::layout.header class="!z-[9]">
                <x-sidebar.trigger />
                <x-portal::separator orientation="vertical" class="!h-4 me-2" />
                <div class="md:block hidden">
                    <x-portal::breadcrumb>
                        <x-portal::breadcrumb.item href="/">{{ env("APP_NAME") }}</x-portal::breadcrumb.item>
                        @if ($pageTitle)
                            <x-portal::breadcrumb.item>{{ $pageTitle }}</x-portal::breadcrumb.item>
                        @endif
                    </x-portal::breadcrumb>
                </div>

                <div class="ml-auto flex items-center space-x-4">
                    <x-layouts.profile :footer="false" />
                </div>
            </x-portal::layout.header>

            <x-portal::layout.content>
                <x-session.info />
                <div class="mb-4">
                    @if ($pageTitle)
                    <x-portal::heading size="xl" class="!font-bold">{{ $pageTitle }}</x-portal::heading>
                    @endif
                    @if (isset($pageDescription))
                        <x-portal::heading.sub>{{ $pageDescription }}</x-portal::heading.sub>
                    @endif
                </div>

                @yield('content')
            </x-portal::layout.content>
        </div>
    </x-sidebar.provider>

    <div x-data="{ alertDialog: '' }">
        <x-portal::alert-dialog id="dialog-logout">
            <x-portal::alert-dialog.content action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <x-portal::alert-dialog.title>
                    Confirm Logout
                </x-portal::alert-dialog.title>
                <x-portal::alert-dialog.description>
                    Are you sure you want to log out of your admin session? You will need to sign in again to access the dashboard.
                </x-portal::alert-dialog.description>
                <x-portal::alert-dialog.action>
                    <x-portal::alert-dialog.cancel>Cancel</x-portal::alert-dialog.cancel>
                    <x-portal::alert-dialog.confirm>Continue</x-portal::alert-dialog.confirm>
                </x-portal::alert-dialog.action>
            </x-portal::alert-dialog.content>
        </x-portal::alert-dialog>

        <a hidden id="show-logout" x-on:click="alertDialog='dialog-logout'"></a>
    </div>

    <script src="{{ asset('assets/dist/global.js') }}"></script>
    @stack('js')
</body>
</html>
