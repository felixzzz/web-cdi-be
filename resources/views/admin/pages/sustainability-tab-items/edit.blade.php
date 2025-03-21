@extends('admin.layouts.main')

@section('content')
    <div class="w-full space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.sustainability-tabs.items.update', ['category' => $category, 'tabId' => $tabId, 'itemId' => $data->ulid]) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.input label="Name Identifier" placeholder="Name Identifier" name="name" :value="$data->name" type="text" required />
            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
                >
                <x-file-upload.image
                    :value="previewFile(@$data->image)"
                    maxsize="5"
                    name="image"
                    class="w-full"
                />
            </x-portal::form.group>

            <x-portal::form.select
                name="align"
                label="Align Content"
                description=""
                description-trailing=""
            >
                <option value="left" {{ $data->align == 'left' ? 'selected' : '' }}>Left</option>
                <option value="right" {{ $data->align == 'right' ? 'selected' : '' }}>Right</option>
            </x-portal::form.select>
            <x-portal::form.select
                name="heading_position"
                label="Heading Position"
                description=""
                description-trailing=""
            >
                <option value="start" {{ $data->heading_position == 'start' ? 'selected' : '' }}>Left</option>
                <option value="center" {{ $data->heading_position == 'center' ? 'selected' : '' }}>Center</option>
                <option value="end" {{ $data->heading_position == 'end' ? 'selected' : '' }}>Right</option>
            </x-portal::form.select>

            <div class="flex gap-4">
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- EN -->
                    <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Header Text" placeholder="Header Text" name="heading_en" :value="$data->heading_en" type="text" />
                    <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_en" :value="$data->tagline_en" type="text" />
                    <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_en"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_en" height="150">{!! $data->content_en !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- ID -->
                    <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Header Text" placeholder="Header Text" name="heading_id" :value="$data->heading_id" type="text" />
                    <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_id" :value="$data->tagline_id" type="text" />
                    <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_id"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_id" height="150">{!! $data->content_id !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
