@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Risk Management</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="governance_risk_management_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->governance_risk_management_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->governance_risk_management_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="governance_risk_management_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_risk_management->file)"
            maxsize="8"
            name="governance_risk_management_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="governance_risk_management_title_{{ $lang }}" :value="@$data->governance_risk_management->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="governance_risk_management_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_risk_management_content_{{ $lang }}" height="150">{!! @$data->governance_risk_management->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
