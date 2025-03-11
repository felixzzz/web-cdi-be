@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.quick-links.store') }}" class="flex flex-col gap-4">
            @csrf
            <x-portal::form.select
                name="category"
                label="Category"
                description=""
                description-trailing=""
            >
                <option value="Select a category" selected disabled>
                    Select a category
                </option>
                <option value="1" {{ old('category') == 1 ? 'selected' : '' }}>Home</option>
                <option value="2" {{ old('category') == 2 ? 'selected' : '' }}>Governance</option>
                <option value="3" {{ old('category') == 3 ? 'selected' : '' }}>About Us</option>
            </x-portal::form.select>
            <x-portal::form.input label="Name EN" placeholder="Name EN" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.input label="Name ID" placeholder="Name ID" name="name_id" :value="old('name_id')" type="text" required />
            <x-portal::form.input label="URL" placeholder="URL" name="url" :value="old('url')" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
