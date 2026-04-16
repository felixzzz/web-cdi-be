@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Share Banner</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="investor_share_banner_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->investor_share_banner->file)"
            maxsize="8"
            name="investor_share_banner_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="investor_share_banner_title_{{ $lang }}" :value="@$data->investor_share_banner->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="investor_share_banner_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="investor_share_banner_content_{{ $lang }}" height="150">{!! @$data->investor_share_banner->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
