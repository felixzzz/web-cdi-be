@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.quick-links.update', $data->ulid) }}" class="flex flex-col gap-4">
            @csrf
            @method("PUT")

            <x-portal::form.select
                name="category"
                label="Category"
                description=""
                description-trailing=""
            >
                <option value="Select a category" selected disabled>
                    Select a category
                </option>
                <option value="1" {{ $data->category->value == 1 ? 'selected' : '' }}>Home</option>
                <option value="2" {{ $data->category->value == 2 ? 'selected' : '' }}>Governance</option>
                <option value="3" {{ $data->category->value == 3 ? 'selected' : '' }}>About Us</option>
            </x-portal::form.select>
            <x-portal::form.input label="Name EN" placeholder="Name EN" name="name_en" :value="$data->name_en" type="text" required />
            <x-portal::form.input label="Name ID" placeholder="Name ID" name="name_id" :value="$data->name_id" type="text" required />
            <x-portal::form.input label="URL" placeholder="URL" name="url" :value="$data->url" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
