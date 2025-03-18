@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Audit Committe</x-portal::heading>
<x-portal::form.input label="Title" placeholder="Title" name="governance_audit_committe_title_{{ $lang }}" :value="@$data->governance_audit_committe->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Content"
    name="governance_audit_committe_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_audit_committe_content_{{ $lang }}" height="150">{!! @$data->governance_audit_committe->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>


<x-portal::form.input label="Audit Member Title" placeholder="Audit Member Title" name="governance_audit_committe_member_text_title_{{ $lang }}" :value="@$data->governance_audit_committe_member_text->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Audit Member Description"
    name="governance_audit_committe_member_text_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="governance_audit_committe_member_text_content_{{ $lang }}" height="150">{!! @$data->governance_audit_committe_member_text->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
