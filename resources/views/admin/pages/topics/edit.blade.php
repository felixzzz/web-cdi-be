@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.topics.update', $data->ulid) }}" class="flex flex-col gap-4">
            @csrf
            @method("PUT")

            <x-portal::form.select
                name="type"
                label="Type"
                description=""
                description-trailing=""
            >
                <option value="Select" selected disabled>
                    Select
                </option>
                <option value="whistleblowing" {{ $data->type == 'whistleblowing' ? 'selected' : '' }}>Whistleblowing</option>
                <option value="contact_us" {{ $data->type == 'contact_us' ? 'selected' : '' }}>Contact Us</option>
            </x-portal::form.select>

            <x-portal::form.input label="Name EN" placeholder="Name EN" name="name_en" :value="$data->name_en" type="text" required />
            <x-portal::form.input label="Name ID" placeholder="Name ID" name="name_id" :value="$data->name_id" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
