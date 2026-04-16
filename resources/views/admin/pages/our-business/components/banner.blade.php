@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Banner</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="banner_image"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->banner_image)"
            maxsize="8"
            name="banner_image"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="banner_title_{{ $lang }}" :value="@$data->{'banner_title_' . $lang}" type="text"  />
{{-- <x-portal::form.group
    label="Description"
    name="banner_description_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="banner_description_{{ $lang }}" height="150">{!! @$data->{'banner_description_' . $lang} !!}</x-editor.quill>
</x-portal::form.group> --}}
