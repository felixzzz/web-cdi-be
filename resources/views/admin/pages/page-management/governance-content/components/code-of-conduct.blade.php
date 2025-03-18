@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Code of Conduct</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="governance_code_of_conduct_title_{{ $lang }}" :value="@$data->governance_code_of_conduct->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="governance_code_of_conduct_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_code_of_conduct_content_{{ $lang }}" height="150">{!! @$data->governance_code_of_conduct->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
