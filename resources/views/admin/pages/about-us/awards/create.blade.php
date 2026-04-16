@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.awards-and-certificates.awards.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <x-portal::form.group
                label="Image"
                name="file"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload.image
                    required
                    maxsize="8"
                    name="file"
                    class="w-full"
                />
            </x-portal::form.group>
            <x-portal::form.input label="Date" placeholder="Date" name="date" :value="old('date')" type="date" required value="{{ now()->format('Y-m-d') }}" />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_en"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_en" height="150">{!! old('content_en') !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_en" :value="old('awarder_en')" type="text" required />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_id" :value="old('name_id')" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_id"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_id" height="150">{!! old('content_id') !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_id" :value="old('awarder_id')" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
