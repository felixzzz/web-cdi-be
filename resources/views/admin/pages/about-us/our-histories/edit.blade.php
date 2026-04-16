@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.our-histories.update', $data->ulid) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
            >
                <x-file-upload.image
                    maxsize="8"
                    name="image"
                    class="w-full"
                    value="{{ previewFile($data->image) }}"
                />
            </x-portal::form.group>

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_en" :value="$data->tagline_en" type="text" required />
            <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_en"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_en" height="150">{!! $data->content_en !!}</x-editor.quill>
            </x-portal::form.group>

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_id" :value="$data->tagline_id" type="text" required />
            <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" required />
            <x-portal::form.group
                label="Content"
                name="content_id"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="content_id" height="150">{!! $data->content_id !!}</x-editor.quill>
            </x-portal::form.group>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
