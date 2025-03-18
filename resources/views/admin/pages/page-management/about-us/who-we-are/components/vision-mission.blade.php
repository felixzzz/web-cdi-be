@props([
    'lang' => 'en',
])
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::form.input label="Tagline Vision Mission" placeholder="Tagline Vision Mission" name="about_us_vision_mission_tagline_title_{{ $lang }}" :value="@$data->about_us_vision_mission_tagline->{'title_' . $lang}" type="text"  />
<x-portal::heading size="lg" class="!font-bold">Vision</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Icon"
        name="about_us_vision_file"
        description=""
        description-trailing=""
    >
        <x-file-upload.image
            value="{{ previewFile(@$data->about_us_vision->file) }}"
            maxsize="5"
            name="about_us_vision_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="about_us_vision_title_{{ $lang }}" :value="@$data->about_us_vision->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="about_us_vision_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="about_us_vision_content_{{ $lang }}" height="150">{!! @$data->about_us_vision->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>


<x-portal::heading size="lg" class="!font-bold">Mission</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Icon"
        name="about_us_mission_file"
        description=""
        description-trailing=""
    >
        <x-file-upload.image
            value="{{ previewFile(@$data->about_us_mission->file) }}"
            maxsize="5"
            name="about_us_mission_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="about_us_mission_title_{{ $lang }}" :value="@$data->about_us_mission->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="about_us_mission_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="about_us_mission_content_{{ $lang }}" height="150">{!! @$data->about_us_mission->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
