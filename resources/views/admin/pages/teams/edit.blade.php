@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.teams.update', $data->ulid) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.select
                name="type"
                label="Type"
                description=""
                description-trailing=""
                required
            >
                <option value="bod" {{ $data->type == 'bod' ? 'selected' : '' }}>BOD</option>
                <option value="boc" {{ $data->type == 'boc' ? 'selected' : '' }}>BOC</option>
                <option value="auti" {{ $data->type == 'auti' ? 'selected' : '' }}>Audit</option>
            </x-portal::form.select>

            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
            >
                <x-file-upload.image
                    value="{{ previewFile($data->image) }}"
                    maxsize="5"
                    name="image"
                    class="w-full"
                />
            </x-portal::form.group>

            <x-portal::form.group
                label="Image Hero"
                name="image_hero"
                description=""
                description-trailing="In the banner section in the details, make sure to use PNG format."
            >
                <x-file-upload.image
                    value="{{ previewFile($data->image_hero) }}"
                    maxsize="5"
                    name="image_hero"
                    class="w-full"
                />
            </x-portal::form.group>

            <x-portal::form.input label="Name" placeholder="Name" name="name" :value="$data->name" type="text" required />
            <x-portal::form.input label="Position" placeholder="Position" name="position" :value="$data->position" type="text" required />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.group
                label="Description"
                name="description_en"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="description_en" height="150">{!! $data->description_en !!}</x-editor.quill>
            </x-portal::form.group>

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.group
                label="Description"
                name="description_id"
                description=""
                description-trailing=""
            >
                <x-editor.quill name="description_id" height="150">{!! $data->description_id !!}</x-editor.quill>
            </x-portal::form.group>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
