@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Sustainability Committe</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Image"
        name="governance_sustainability_committe_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->governance_sustainability_committe->file)"
            maxsize="5"
            name="governance_sustainability_committe_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
