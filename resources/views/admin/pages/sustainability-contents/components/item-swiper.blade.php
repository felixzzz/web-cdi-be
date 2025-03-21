<button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removeContent(this)">
    <i class="isax icon-trash"></i>
</button>

<x-portal::form.group
    label="Image"
    name="content_json_swiper_icon[]"
    description=""
    description-trailing=""
    >
    <x-file-upload.image
        maxsize="5"
        name="content_json_swiper_icon[]"
        class="w-full"
    />
</x-portal::form.group>
<x-portal::form.input label="Number" placeholder="Number" name="content_json_swiper_number[]" type="number" />
<div class="flex max-lg:flex-col w-full gap-4">
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_swiper_title_en[]" type="text" />
        <x-portal::form.group
            label="Content"
            name="content_json_swiper_description_en[]"
            description=""
            description-trailing=""
        >
            <div>
                <div id="quill_editor_content_json_swiper_description_en_{{ $rand }}" style="height: 150px"
                    class="!border-input rounded-b-md">

                </div>
                <textarea name="content_json_swiper_description_en[]" id="quill_editor_content_json_swiper_description_en_{{ $rand }}_value" class="hidden"></textarea>
            </div>
        </x-portal::form.group>
    </div>
    <div class="max-lg:hidden">
        <x-portal::separator orientation="vertical" />
    </div>
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_swiper_title_id[]" type="text" />
        <x-portal::form.group
            label="Content"
            name="content_json_swiper_description_id[]"
            description=""
            description-trailing=""
        >
            <div>
                <div id="quill_editor_content_json_swiper_description_id_{{ $rand }}" style="height: 150px"
                    class="!border-input rounded-b-md">

                </div>
                <textarea name="content_json_swiper_description_id[]" id="quill_editor_content_json_swiper_description_id_{{ $rand }}_value" class="hidden"></textarea>
            </div>
        </x-portal::form.group>
    </div>
</div>
