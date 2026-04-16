<x-portal::heading size="lg" class="!font-bold">Media</x-portal::heading>
<x-portal::form.group
    label="Background"
    name="media_main_file"
    description=""
    description-trailing=""
    >
    <x-file-upload.image
        :value="previewFile(@$data->media_main->file)"
        maxsize="8"
        name="media_main_file"
        class="w-full"
    />
</x-portal::form.group>
