@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Banner</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="sustainability_governance_banner_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->sustainability_governance_banner->file)"
            maxsize="8"
            name="sustainability_governance_banner_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Title" placeholder="Title" name="sustainability_governance_banner_title_{{ $lang }}" :value="@$data->sustainability_governance_banner->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="sustainability_governance_banner_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="sustainability_governance_banner_content_{{ $lang }}" height="150">{!! @$data->sustainability_governance_banner->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
