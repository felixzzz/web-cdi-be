@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Overview</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Image"
        name="overview_image"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->overview_image)"
            maxsize="5"
            name="overview_image"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="overview_title_{{ $lang }}" :value="@$data->{'overview_title_' . $lang}" type="text"  />

<x-portal::form.group
    label="Description"
    name="overview_description_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="overview_description_{{ $lang }}" height="150">{!! @$data->{'overview_description_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
<x-portal::form.input label="Header Tab" placeholder="Header Tab" name="heading_tab_title_{{ $lang }}" :value="@$data->{'heading_tab_title_' . $lang}" type="text" descriptionTrailing="Header Tab will appear above the tabs and beneath the overview section" />
