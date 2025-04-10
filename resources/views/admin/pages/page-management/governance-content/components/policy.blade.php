@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Policy</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="governance_policy_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->governance_policy_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->governance_policy_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="governance_policy_title_{{ $lang }}" :value="@$data->governance_policy->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="governance_policy_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_policy_content_{{ $lang }}" height="150">{!! @$data->governance_policy->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
