@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Sustainability Committe</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.select
        name="governance_sustainability_committe_show_content_en"
        label="Show"
        description=""
        description-trailing=""
        required
    >
        <option value="show" {{ @$data->governance_sustainability_committe_show->content_en == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ @$data->governance_sustainability_committe_show->content_en == 'hide' ? 'selected' : '' }}>Hide</option>
    </x-portal::form.select>
@endif
@if ($lang == 'en')
    <x-portal::form.group
        label="Image"
        name="governance_sustainability_committe_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_sustainability_committe->file)"
            maxsize="8"
            name="governance_sustainability_committe_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
