@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.article.press-releases.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.group
                label="File"
                name="file_en"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload
                    icon="file-type-pdf"
                    required
                    maxsize="5"
                    name="file_en"
                    class="w-full"
                    accept="application/pdf" description="Only PDF file are accepted"
                />
            </x-portal::form.group>

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_id" :value="old('name_id')" type="text" required />
            <x-portal::form.group
                label="File"
                name="file_id"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload
                    icon="file-type-pdf"
                    required
                    maxsize="5"
                    name="file_id"
                    class="w-full"
                    accept="application/pdf" description="Only PDF file are accepted"
                />
            </x-portal::form.group>

            <x-portal::form.select
                name="status"
                label="Status"
                description=""
                description-trailing=""
            >
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
            </x-portal::form.select>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
