@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.awards-and-certificates.awards.update', $data->ulid) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.group
                label="Image"
                name="file"
                description=""
                description-trailing=""
            >
                <x-file-upload.image
                    maxsize="5"
                    name="file"
                    class="w-full"
                    value="{{ previewFile($data->file) }}"
                />
            </x-portal::form.group>
            <x-portal::form.input label="Date" placeholder="Date" name="date" type="date" required value="{{ $data->date }}" />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_en" :value="$data->name_en" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_en"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_en" height="150">{!! $data->content_en !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_en" :value="$data->awarder_en" type="text" required />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_id" :value="$data->name_id" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_id"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_id" height="150">{!! $data->content_id !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_id" :value="$data->awarder_id" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
