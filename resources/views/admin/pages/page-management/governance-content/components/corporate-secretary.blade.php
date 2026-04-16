@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Corporate Secretary</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Image Team"
        name="governance_corporate_secretary_team_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_corporate_secretary_team->file)"
            maxsize="8"
            name="governance_corporate_secretary_team_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Name" placeholder="Name" name="governance_corporate_secretary_team_title_{{ $lang }}" :value="@$data->governance_corporate_secretary_team->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Position" placeholder="Position" name="governance_corporate_secretary_team_content_{{ $lang }}" :value="@$data->governance_corporate_secretary_team->{'content_' . $lang}" type="text"  />

<x-portal::form.input label="Title Content" placeholder="Title Content" name="governance_corporate_secretary_title_{{ $lang }}" :value="@$data->governance_corporate_secretary->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Content"
    name="governance_corporate_secretary_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_corporate_secretary_content_{{ $lang }}" height="150">{!! @$data->governance_corporate_secretary->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
