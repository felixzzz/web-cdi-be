@props([
    'lang' => 'en',
])

<!-- Home Section -->
<x-portal::heading size="lg" class="!font-bold">Corporate Structure</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="about_us_corporate_structure_en_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_corporate_structure_en->file)"
            maxsize="5"
            name="about_us_corporate_structure_en_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif

@if ($lang == 'id')
    <x-portal::form.group
        label="Background"
        name="about_us_corporate_structure_id_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->about_us_corporate_structure_id->file)"
            maxsize="5"
            name="about_us_corporate_structure_id_file"
            class="w-full"
        />
    </x-portal::form.group>
@endif
