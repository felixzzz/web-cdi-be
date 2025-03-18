@props([
    'lang' => 'en',
])
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<!-- About Section -->
<x-portal::heading size="lg" class="!font-bold">About Us Section</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="home_about_section_file"
        description=""
        description-trailing=""
    >
        <x-file-upload.image
            value="{{ previewFile(@$data->home_about_section->file) }}"
            maxsize="5"
            name="home_about_section_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="home_about_section_title_{{ $lang }}" :value="@$data->home_about_section->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="home_about_section_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="home_about_section_content_{{ $lang }}" height="150">{!! @$data->home_about_section->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
