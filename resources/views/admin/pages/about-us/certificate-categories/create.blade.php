@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.awards-and-certificates.certificate-categories.store') }}" class="flex flex-col gap-4">
            @csrf

            <x-portal::form.input label="Name EN" placeholder="Name EN" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.input label="Name ID" placeholder="Name ID" name="name_id" :value="old('name_id')" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
