@props([
    'title_en' => '',
    'title_id' => '',
    'description_en' => '',
    'description_id' => '',
])

<button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removeContent(this)">
    <i class="isax icon-trash"></i>
</button>

<div class="flex max-lg:flex-col w-full gap-4">
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_simple_title_en[]" type="text" :value="$title_en" />
        <x-portal::form.group
            label="Content"
            description=""
            name="content_json_simple_description_en[]"
            description-trailing=""
        >
            <x-portal::textarea name="content_json_simple_description_en[]" :value="$description_en" />
        </x-portal::form.group>
    </div>
    <div class="max-lg:hidden">
        <x-portal::separator orientation="vertical" />
    </div>
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_simple_title_id[]" type="text" :value="$title_id" />
        <x-portal::form.group
            label="Content"
            name="content_json_simple_description_id[]"
            description=""
            description-trailing=""
        >
            <x-portal::textarea name="content_json_simple_description_id[]" :value="$description_id" />
        </x-portal::form.group>
    </div>
</div>
