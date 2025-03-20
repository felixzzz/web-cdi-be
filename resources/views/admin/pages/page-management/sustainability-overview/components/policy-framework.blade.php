@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Policy & Framework</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="File"
        name="sustainability_environment_policy_framework_file_file"
        description=""
        description-trailing=""
        >
        <x-file-upload
            maxsize="5"
            name="sustainability_environment_policy_framework_file_file"
            class="w-full"
            accept="application/pdf"
            description="Only pdf files are accepted, up to 5MB"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Wording Button File" placeholder="Wording Button File" name="sustainability_environment_policy_framework_file_title_{{ $lang }}" :value="@$data->sustainability_environment_policy_framework_file->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Title" placeholder="Title" name="sustainability_environment_policy_framework_title_{{ $lang }}" :value="@$data->sustainability_environment_policy_framework->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="sustainability_environment_policy_framework_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="sustainability_environment_policy_framework_content_{{ $lang }}" height="150">{!! @$data->sustainability_environment_policy_framework->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
