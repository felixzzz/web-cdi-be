@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Cookies Consents</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="cookies_consent_title_{{ $lang }}" :value="@$data->cookies_consent->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="cookies_consent_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="cookies_consent_content_{{ $lang }}" height="150">{!! @$data->cookies_consent->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
