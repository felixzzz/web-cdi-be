@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Terms & Conditions</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="terms_and_conditions_title_{{ $lang }}" :value="@$data->terms_and_conditions->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="terms_and_conditions_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="terms_and_conditions_content_{{ $lang }}" height="150">{!! @$data->terms_and_conditions->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
