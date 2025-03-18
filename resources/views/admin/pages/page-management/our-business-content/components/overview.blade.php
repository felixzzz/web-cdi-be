@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Overview</x-portal::heading>
<x-portal::form.group
    label="Description"
    name="our_business_overview_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="our_business_overview_content_{{ $lang }}" height="150">{!! @$data->our_business_overview->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
