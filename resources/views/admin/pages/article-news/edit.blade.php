@extends('admin.layouts.main')

@section('content')
    <div class="space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.article.news.update', $data->ulid) }}" class="w-full flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.group
                label="Thumbnail"
                name="thumbnail"
                description=""
                description-trailing=""
            >
                <x-file-upload.image
                    maxsize="5"
                    name="thumbnail"
                    class="w-full"
                    value="{{ previewFile($data->thumbnail) }}"
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
                    <option value="{{ $item->id }}" {{ $data->article_category_id == $item->id ? 'selected' : '' }}>{{ $item->name_en }}</option>
                @endforeach
            </x-portal::form.select>

            <x-portal::form.input label="Datetime" placeholder="Datetime" name="datetime" value="{{ $data->datetime }}" type="datetime-local" required />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" required />
            <x-portal::form.input label="Slug" placeholder="Slug" name="slug" :value="$data->slug" type="text" required />
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
                    {!! $data->content_en !!}
                </x-editor.ckeditor>
            </x-portal::form.group>
            <x-portal::form.input label="Meta Description" placeholder="Meta Description" name="meta_description" :value="@$data->meta_tag['description']" type="text" />
            <x-portal::form.input label="Meta Keyword" placeholder="Meta Keyword" name="meta_keyword" :value="@$data->meta_tag['keyword']" type="text" />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" required />
            <x-portal::form.input label="Slug" placeholder="Slug" name="slug_id" :value="$data->slug_id" type="text" required />
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
                    {!! $data->content_id !!}
                </x-editor.ckeditor>
            </x-portal::form.group>

            <x-portal::form.input label="Meta Description" placeholder="Meta Description" name="meta_description_id" :value="@$data->meta_tag_id['description']" type="text" />
            <x-portal::form.input label="Meta Keyword" placeholder="Meta Keyword" name="meta_keyword_id" :value="@$data->meta_tag_id['keyword']" type="text" />
            <x-portal::form.group
                label="Tags"
                name="tags"
                description=""
                description-trailing=""
            >
                <x-input-tag
                    name="tags"
                    :tags="$data->tags"
                />
            </x-portal::form.group>
            <x-portal::form.select
                name="status"
                label="Status"
                description=""
                description-trailing=""
            >
                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Draft</option>
                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Publish</option>
            </x-portal::form.select>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>

    </div>
@endsection
