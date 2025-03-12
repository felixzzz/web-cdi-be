@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.countries.store') }}" class="flex flex-col gap-4">
            @csrf

            <x-portal::form.input label="Name" placeholder="Name" name="name" :value="old('name')" type="text" required />
            <x-portal::form.input label="Code" placeholder="Code" name="code" :value="old('code')" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
