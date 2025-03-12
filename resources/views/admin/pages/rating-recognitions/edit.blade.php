@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.rating-recognitions.update', $data->ulid) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.select
                name="type"
                label="Type"
                description=""
                description-trailing=""
            >
                <option value="rating" {{ $data->type == 'rating' ? 'selected' : '' }}>Rating</option>
                <option value="recognition" {{ $data->type == 'recognition' ? 'selected' : '' }}>Recognition</option>
            </x-portal::form.select>
            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload.image
                    required
                    maxsize="5"
                    name="image"
                    class="w-full"
                />
            </x-portal::form.group>

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

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
