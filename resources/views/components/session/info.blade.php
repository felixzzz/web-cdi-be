@session('info')
    <x-alert class="mb-3">
        <x-tabler-bell class="h-4 w-4" />
        <x-alert.title class="!mb-0 mt-1">{{ session()->get("info") }}</x-alert.title>
    </x-alert>
@endsession
