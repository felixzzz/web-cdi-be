@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Overview</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="sustainability_overview_content_title_{{ $lang }}" :value="@$data->sustainability_overview_content->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="sustainability_overview_content_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="sustainability_overview_content_content_{{ $lang }}" height="150">{!! @$data->sustainability_overview_content->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
