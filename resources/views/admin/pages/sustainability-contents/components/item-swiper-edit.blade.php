@props([
    'file' => '',
    'title_en' => '',
    'description_en' => '',
    'title_id' => '',
    'description_id' => '',
    'number' => ''
])

<button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removeContent(this)">
    <i class="isax icon-trash"></i>
</button>

<x-portal::form.group
    label="Image Or Icon"
    name="content_json_swiper_icon[]"
    description=""
    description-trailing=""
    >
    <x-file-upload.image
        :value="previewFile($file)"
        maxsize="5"
        name="content_json_swiper_icon[]"
        class="w-full"
    />
</x-portal::form.group>
<input type="hidden" name="content_json_swiper_icon_existing[]" :value="$file">
<x-portal::form.input label="Number" placeholder="Number" name="content_json_swiper_number[]" type="number" :value="$number" />
<div class="flex max-lg:flex-col w-full gap-4">
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_swiper_title_en[]" type="text" :value="$title_en" />
        <x-portal::form.group
            label="Content"
            name="content_json_swiper_description_en[]"
            description=""
            description-trailing=""
        >
            <x-editor.quill name="content_json_swiper_description_en[]" height="150">{!! $description_en !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
    <div class="max-lg:hidden">
        <x-portal::separator orientation="vertical" />
    </div>
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_swiper_title_id[]" type="text" :value="$title_id" />
        <x-portal::form.group
            label="Content"
            name="content_json_swiper_description_id"
            description=""
            description-trailing=""
        >
            <x-editor.quill name="content_json_swiper_description_en[]" height="150">{!! $description_id !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
</div>
