@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Banner</x-portal::heading>
@if ($lang == 'en')
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

@endif
<x-portal::form.input label="Title" placeholder="Title" name="title_{{ $lang }}" :value="@$data->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="description_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="description_{{ $lang }}" height="150">{!! @$data->{'description_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
