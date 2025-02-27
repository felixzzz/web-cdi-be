@session('message')
    <x-alert>
        <x-tabler-bell class="h-4 w-4" />
        <x-alert.title class="!mb-0 mt-1">{{ session()->get("message") }}</x-alert.title>
    </x-alert>
@endsession
