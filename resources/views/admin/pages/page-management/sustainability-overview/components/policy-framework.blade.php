@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Policy & Framework</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="sustainability_overview_policy_framework_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->sustainability_overview_policy_framework_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->sustainability_overview_policy_framework_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
    <x-portal::form.group
        label="File"
        name="sustainability_overview_policy_framework_file_file"
        description=""
        description-trailing=""
        >
        <x-file-upload
            maxsize="8"
            name="sustainability_overview_policy_framework_file_file"
            class="w-full"
            accept="application/pdf"
            description="Only pdf files are accepted, up to 5MB"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Wording Button File" placeholder="Wording Button File" name="sustainability_overview_policy_framework_file_title_{{ $lang }}" :value="@$data->sustainability_overview_policy_framework_file->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Title" placeholder="Title" name="sustainability_overview_policy_framework_title_{{ $lang }}" :value="@$data->sustainability_overview_policy_framework->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="sustainability_overview_policy_framework_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="sustainability_overview_policy_framework_content_{{ $lang }}" height="150">{!! @$data->sustainability_overview_policy_framework->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
