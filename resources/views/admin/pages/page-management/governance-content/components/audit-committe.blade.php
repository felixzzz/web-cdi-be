@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Audit Committe</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="governance_audit_committe_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->governance_audit_committe_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->governance_audit_committe_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
<x-portal::form.input label="Title" placeholder="Title" name="governance_audit_committe_title_{{ $lang }}" :value="@$data->governance_audit_committe->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Content"
    name="governance_audit_committe_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_audit_committe_content_{{ $lang }}" height="150">{!! @$data->governance_audit_committe->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>

@if ($lang == 'en')
    <x-portal::form.select
        name="governance_audit_committe_member_text_show_content_en"
        label="Show Audit Member"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->governance_audit_committe_member_text_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->governance_audit_committe_member_text_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
<x-portal::form.input label="Audit Member Title" placeholder="Audit Member Title" name="governance_audit_committe_member_text_title_{{ $lang }}" :value="@$data->governance_audit_committe_member_text->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Audit Member Description"
    name="governance_audit_committe_member_text_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_audit_committe_member_text_content_{{ $lang }}" height="150">{!! @$data->governance_audit_committe_member_text->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
