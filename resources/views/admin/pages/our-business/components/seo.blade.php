@props([
    'lang' => 'en',
])

<!-- SEO Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">SEO & Metadata</x-portal::heading>

<x-portal::form.input
    label="Meta Title"
    placeholder="Meta Title ({{ strtoupper($lang) }})..."
    name="meta_title_{{ $lang }}"
    :value="old('meta_title_' . $lang, @$data->{'meta_title_' . $lang})"
    type="text"
/>

<x-portal::form.textarea
    rows="3"
    label="Meta Description"
    placeholder="Meta Description ({{ strtoupper($lang) }})..."
    name="meta_description_{{ $lang }}"
    :value="old('meta_description_' . $lang, @$data->{'meta_description_' . $lang})"
/>

<x-editor.json-editor
    label="JSON-LD Schema ({{ $lang == 'en' ? 'English' : 'Indonesian' }})"
    name="json_ld_{{ $lang }}"
    :value="old('json_ld_' . $lang, @$data->{'json_ld_' . $lang})"
/>
