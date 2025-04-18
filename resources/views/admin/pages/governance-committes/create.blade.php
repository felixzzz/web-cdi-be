@extends('admin.layouts.main')

@section('content')
<form method="POST" action="{{ route('admin.governance-committes.store') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
    @csrf
    <x-portal::form.select
        name="is_show"
        label="Show?"
        description=""
        description-trailing=""
    >
        <option value="1" {{ old('is_show') == 1 ? 'selected' : '' }}>Show</option>
        <option value="0" {{ old('is_show') == 0 ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
    <x-portal::form.group
        label="Image"
        name="image"
        description=""
        description-trailing=""
    >
        <x-portal::file-upload.image
            maxsize="5"
            name="image"
            class="w-full"
        />
    </x-portal::form.group>
    <x-portal::form.group
        label="File"
        name="file"
        description=""
        description-trailing=""
    >
        <x-portal::file-upload
            icon="file-type-pdf"
            maxsize="5"
            name="file"
            class="w-full"
            accept="application/pdf" description="Only PDF file are accepted"
        />
    </x-portal::form.group>

    <x-portal::form.input label="File Name" placeholder="File Name" name="file_name" :value="old('file_name')" type="text" />

    <div class="flex gap-4 w-full" >
        <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Tab Title" placeholder="Tab Title" name="tab_title_en" :value="old('tab_title_en')" type="text" required />
            <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="old('title_en')" type="text" />
            <x-portal::form.group
                label="Content"
                name="content_en"
                description=""
                description-trailing=""
            >
                <x-editor.ckeditor
                    placeholder=""
                    name="content_en"
                    height="150"
                    uploadUrl="{{ route('admin.editor.upload') }}"
                >
                    {!! old('content_en') !!}
                </x-editor.ckeditor>
            </x-portal::form.group>
        </div>
        <div class="max-lg:hidden">
            <x-portal::separator orientation="vertical" />
        </div>
        <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Tab Title" placeholder="Tab Title" name="tab_title_id" :value="old('tab_title_id')" type="text" required />
            <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="old('title_id')" type="text" />
            <x-portal::form.group
                label="Content"
                name="content_id"
                description=""
                description-trailing=""
            >
                <x-editor.ckeditor
                    placeholder=""
                    name="content_id"
                    height="150"
                    uploadUrl="{{ route('admin.editor.upload') }}"
                >
                    {!! old('content_id') !!}
                </x-editor.ckeditor>
            </x-portal::form.group>
        </div>
    </div>
    <div class="mt-6">
        <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
    </div>
</form>
@endsection
