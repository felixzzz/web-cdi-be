@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Overview</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="about_us_company_overview_background_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_company_overview_background->file)"
            maxsize="5"
            name="about_us_company_overview_background_file"
            class="w-full"
        />
    </x-portal::form.group>

    <x-portal::form.group
        label="Logo"
        name="about_us_company_overview_tagline_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_company_overview_tagline->file)"
            maxsize="5"
            name="about_us_company_overview_tagline_file"
            class="w-full"
        />
    </x-portal::form.group>

    <x-portal::form.group
        label="Image"
        name="about_us_company_overview_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_company_overview->file)"
            maxsize="5"
            name="about_us_company_overview_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Tagline" placeholder="Tagline.. '#Your Growth Partner'" name="about_us_company_overview_tagline_title_{{ $lang }}" :value="@$data->about_us_company_overview_tagline->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Content"
    name="about_us_company_overview_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="about_us_company_overview_content_{{ $lang }}" height="150">{!! @$data->about_us_company_overview->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
