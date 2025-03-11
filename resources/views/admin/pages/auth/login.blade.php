<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ env("APP_NAME") }}</title>


    @portalUI
    <link rel="stylesheet" href="{{ asset('assets/dist/style.css') }}">
</head>
<body>
    <section class="flex flex-col h-screen items-center justify-center bg-gray-300">
        <x-portal::card class="w-[350px] space-y-6">
            <div class="space-y-1 text-center">
                <img src="{{ asset('assets/frontend/logo_cdi_colored.svg') }}" alt="" class="w-1/2 text-center mx-auto mb-2">
                <x-portal::heading size="lg">Log in to your account</x-portal::heading>
                <x-portal::heading.sub>Welcome back!</x-portal::heading.sub>
            </div>
            <x-portal::form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <x-session.alert />

                <x-portal::form.input name="email" label="Email" placeholder="mail@gmail.com" type="text" />
                <x-portal::form.input name="password" label="Password" placeholder="password" type="password" />

                <x-portal::button x-bind:loading="submited" type="submit" class="w-full">Login</x-portal::button>
            </x-portal::form>
        </x-portal::card>
    </section>

    <script>
        window.onload = function () {
            document.documentElement.classList.remove("dark");
            localStorage.theme = "light";
        }
    </script>
</body>
</html>
