@extends('admin.layouts.main')

@section('content')
    <div class="space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.article.news.store') }}" class="w-full flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <x-portal::form.group
                label="Thumbnail"
                name="thumbnail"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload.image
                    required
                    maxsize="8"
                    name="thumbnail"
                    class="w-full"
                />
            </x-portal::form.group>
            <x-portal::form.select
                name="article_category_id"
                label="Category"
                description=""
                description-trailing=""
            >
                <option value="Select" selected disabled>
                    Select
                </option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ old('article_category_id') == $item->id ? 'selected' : '' }}>{{ $item->name_en }}</option>
                @endforeach
            </x-portal::form.select>
            <x-portal::form.input label="Datetime" placeholder="Datetime" name="datetime" value="{{ old('datetime', now()) }}" type="datetime-local" required />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="old('title_en')" type="text" required />
            <x-portal::form.input label="Slug" placeholder="Slug" name="slug_en" :value="old('slug_en')" type="text" required />
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
            <x-portal::form.input label="Meta Description" placeholder="Meta Description" name="meta_description" :value="old('meta_description')" type="text" />
            <x-portal::form.input label="Meta Keyword" placeholder="Meta Keyword" name="meta_keyword" :value="old('meta_keyword')" type="text" />
            <x-editor.json-editor label="JSON-LD Schema (English)" name="json_ld" :value="old('json_ld')" />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="old('title_id')" type="text" required />
            <x-portal::form.input label="Slug" placeholder="Slug" name="slug_id" :value="old('slug_id')" type="text" required />
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

            <x-portal::form.input label="Meta Description" placeholder="Meta Description" name="meta_description_id" :value="old('meta_description_id')" type="text" />
            <x-portal::form.input label="Meta Keyword" placeholder="Meta Keyword" name="meta_keyword_id" :value="old('meta_keyword_id')" type="text" />
            <x-editor.json-editor label="JSON-LD Schema (Indonesian)" name="json_ld_id" :value="old('json_ld_id')" />
            <x-editor.references-repeater label="Article References / Sources" :value="old('references')" />
            <x-portal::form.group
                label="Tags"
                name="tags"
                description=""
                description-trailing=""
            >
                <x-input-tag
                    name="tags"
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
