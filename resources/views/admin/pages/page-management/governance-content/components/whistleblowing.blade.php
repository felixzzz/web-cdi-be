@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Whistleblowing</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Image"
        name="governance_whistleblowing_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_whistleblowing->file)"
            maxsize="5"
            name="governance_whistleblowing_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
@if ($lang == 'id')
    <x-portal::form.group
        label="Image"
        name="governance_whistleblowing_id_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_whistleblowing_id->file)"
            maxsize="5"
            name="governance_whistleblowing_id_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
@if ($lang == 'en')
    <x-portal::form.group
        label="Hero Image"
        name="governance_whistleblowing_detail_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_whistleblowing_detail->file)"
            maxsize="5"
            name="governance_whistleblowing_detail_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Tagline" placeholder="Tagline.. '#Your Growth Partner'" name="governance_whistleblowing_detail_title_{{ $lang }}" :value="@$data->governance_whistleblowing_detail->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Title" placeholder="Title" name="governance_whistleblowing_title_{{ $lang }}" :value="@$data->governance_whistleblowing->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="governance_whistleblowing_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_whistleblowing_content_{{ $lang }}" height="150">{!! @$data->governance_whistleblowing->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
