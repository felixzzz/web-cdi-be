@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Contact Us</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="contact_us_main_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->contact_us_main->file)"
            maxsize="5"
            name="contact_us_main_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="contact_us_main_title_{{ $lang }}" :value="@$data->contact_us_main->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Tagline" placeholder="Tagline.. '#Your Growth Partner'" name="contact_us_main_content_{{ $lang }}" :value="@$data->contact_us_main->{'content_' . $lang}" type="text"  />
{{-- <x-portal::form.group
    label="Description"
    name="contact_us_main_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="contact_us_main_content_{{ $lang }}" height="150">{!! @$data->contact_us_main->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group> --}}
