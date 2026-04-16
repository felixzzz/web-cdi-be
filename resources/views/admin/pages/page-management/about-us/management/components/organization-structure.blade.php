@props([
    'lang' => 'en',
])

<!-- Home Section -->
<x-portal::heading size="lg" class="!font-bold">Organization Structure</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="about_us_organization_structure_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_organization_structure->file)"
            maxsize="8"
            name="about_us_organization_structure_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
