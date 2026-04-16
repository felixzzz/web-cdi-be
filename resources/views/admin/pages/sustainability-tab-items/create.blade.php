@extends('admin.layouts.main')

@section('content')
    <div class="w-full space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.sustainability-tabs.items.store', ['category' => $category, 'tabId' => $tabId]) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <x-portal::form.input label="Name Identifier" placeholder="Name Identifier" name="name" :value="old('name')" type="text" required />
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
                />
            </x-portal::form.group>

            <x-portal::form.select
                name="align"
                label="Align Content"
                description=""
                description-trailing=""
            >
                <option value="left" {{ old('align') == 'left' ? 'selected' : '' }}>Left</option>
                <option value="right" {{ old('align') == 'right' ? 'selected' : '' }}>Right</option>
            </x-portal::form.select>
            <x-portal::form.select
                name="heading_position"
                label="Heading Position"
                description=""
                description-trailing=""
            >
                <option value="start" {{ old('heading_position') == 'start' ? 'selected' : '' }}>Left</option>
                <option value="center" {{ old('heading_position') == 'center' ? 'selected' : '' }}>Center</option>
                <option value="end" {{ old('heading_position') == 'end' ? 'selected' : '' }}>Right</option>
            </x-portal::form.select>

            <div class="flex gap-4 w-full">
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- EN -->
                    <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Header Text" placeholder="Header Text" name="heading_en" :value="old('heading_en')" type="text" />
                    <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_en" :value="old('tagline_en')" type="text" />
                    <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="old('title_en')" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_en"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_en" height="150">{!! old('content_en') !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- ID -->
                    <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Header Text" placeholder="Header Text" name="heading_id" :value="old('heading_id')" type="text" />
                    <x-portal::form.input label="Tagline" placeholder="Tagline" name="tagline_id" :value="old('tagline_id')" type="text" />
                    <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="old('title_id')" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_id"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_id" height="150">{!! old('content_id') !!}</x-editor.quill>
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
