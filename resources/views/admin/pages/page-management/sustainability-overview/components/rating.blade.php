@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Rating & Recognition</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="sustainability_overview_rating_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->sustainability_overview_rating_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->sustainability_overview_rating_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="sustainability_overview_rating_title_{{ $lang }}" :value="@$data->sustainability_overview_rating->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="sustainability_overview_rating_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="sustainability_overview_rating_content_{{ $lang }}" height="150">{!! @$data->sustainability_overview_rating->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
