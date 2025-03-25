@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Disclaimer</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="disclaimer_title_{{ $lang }}" :value="@$data->disclaimer->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="disclaimer_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="disclaimer_content_{{ $lang }}" height="150">{!! @$data->disclaimer->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
