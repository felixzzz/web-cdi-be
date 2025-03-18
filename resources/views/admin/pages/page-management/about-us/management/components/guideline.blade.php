@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Guideline</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="about_us_guideline_title_{{ $lang }}" :value="@$data->about_us_guideline->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Content"
    name="about_us_guideline_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="about_us_guideline_content_{{ $lang }}" height="150">{!! @$data->about_us_guideline->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
