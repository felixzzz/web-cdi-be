@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Milestone</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="about_us_milestone_title_{{ $lang }}" :value="@$data->about_us_milestone->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="about_us_milestone_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="about_us_milestone_content_{{ $lang }}" height="150">{!! @$data->about_us_milestone->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
