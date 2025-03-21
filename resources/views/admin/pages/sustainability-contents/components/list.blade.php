<button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removeContent(this)">
    <i class="isax icon-trash"></i>
</button>

<div class="flex max-lg:flex-col w-full gap-4">
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_list_title_en[]" type="text" />
    </div>
    <div class="max-lg:hidden">
        <x-portal::separator orientation="vertical" />
    </div>
    <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
        <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
        <x-portal::form.input label="Title" placeholder="Title" name="content_json_list_title_id[]" type="text" />
    </div>
</div>
