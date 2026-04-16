@extends('admin.layouts.main')

@section('content')
<form method="POST" action="{{ route('admin.sustainability-reports.store') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
    @csrf
    <x-portal::form.select
        name="type"
        label="Type"
        id="typeSelect"
        description=""
        description-trailing=""
    >
        <option value="Select" selected disabled>
            Select
        </option>
        <option value="report" {{ old('type') == 'report' ? 'selected' : '' }}>Report</option>
        <option value="publication" {{ old('type') == 'publication' ? 'selected' : '' }}>Publication</option>
    </x-portal::form.select>
    <x-portal::form.group
        label="Thumbnail"
        name="image"
        description=""
        description-trailing=""
    >
        <x-portal::file-upload.image
            required
            maxsize="8"
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
            required
            maxsize="8"
            name="file"
            class="w-full"
            accept="application/pdf" description="Only PDF file are accepted"
        />
    </x-portal::form.group>

    <div class="flex gap-4 w-full" >
        <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="old('title_en')" type="text" required />
            <x-portal::form.group
                label="Description"
                name="description_en"
                description=""
                description-trailing=""
            >
                <x-editor.ckeditor
                    placeholder=""
                    name="description_en"
                    height="150"
                    uploadUrl="{{ route('admin.editor.upload') }}"
                >
                    {!! old('description_en') !!}
                </x-editor.ckeditor>
            </x-portal::form.group>
        </div>
        <div class="max-lg:hidden">
            <x-portal::separator orientation="vertical" />
        </div>
        <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="old('title_id')" type="text" required />
            <x-portal::form.group
                label="Description"
                name="description_id"
                description=""
                description-trailing=""
            >
                <x-editor.ckeditor
                    placeholder=""
                    name="description_id"
                    height="150"
                    uploadUrl="{{ route('admin.editor.upload') }}"
                >
                    {!! old('description_id') !!}
                </x-editor.ckeditor>
            </x-portal::form.group>
        </div>
    </div>

    <section id="publication" class="flex flex-col gap-4">
        <x-portal::form.input label="Release Year" placeholder="Release Year" name="release_year" :value="old('release_year')" type="number" />
        <x-portal::form.input label="Language" placeholder="Language" name="language" :value="old('language')" type="text" />
        <x-portal::form.input label="Author" placeholder="Author" name="author" :value="old('author')" type="text" />
        <x-portal::form.input label="Publisher" placeholder="Publisher" name="publisher" :value="old('publisher')" type="text" />
        <x-portal::form.input label="Pages" placeholder="Pages" name="pages" :value="old('pages')" type="number" />
        <x-portal::form.input label="Format" placeholder="Format" name="format" :value="old('format')" type="text" />
    </section>

    <div class="mt-6">
        <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
    </div>
</form>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('typeSelect');
            const publicationSection = document.getElementById('publication');

            function togglePublicationSection() {
                if (typeSelect.value === 'publication') {
                    publicationSection.style.display = 'flex';
                } else {
                    publicationSection.style.display = 'none';
                }
            }

            typeSelect.addEventListener('change', togglePublicationSection);

            // Call once on page load to apply correct visibility
            togglePublicationSection();
        });
    </script>
@endpush
