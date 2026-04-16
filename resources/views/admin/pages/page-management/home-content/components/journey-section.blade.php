@props(['lang' => 'en'])

<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<div x-data="{ tab: 'info_1' }" class="flex flex-col gap-4">
    <x-portal::heading size="lg" class="!font-bold">Journey Section</x-portal::heading>
    <x-portal::form.input
        label="Tagline"
        placeholder="Tagline"
        name="home_journey_tagline_title_{{ $lang }}"
        :value="@$data->home_journey_tagline->{'title_' . $lang}"
        type="text"
    />

    @if ($lang == 'en')
        <x-portal::form.group
            label="Background"
            name="home_journey_content_file"
            description=""
            description-trailing=""
        >
            <x-file-upload.image
                :value="previewFile(@$data->home_journey_content->file)"
                maxsize="8"
                name="home_journey_content_file"
                class="w-full"
            />
        </x-portal::form.group>
    @endif
    <x-portal::form.input label="Title" placeholder="Title" name="home_journey_content_title_{{ $lang }}" :value="@$data->home_journey_content->{'title_' . $lang}" type="text"  />
    <x-portal::form.group
        label="Description"
        name="home_journey_content_content_{{ $lang }}"
        description=""
        description-trailing=""
    >
        <x-editor.quill name="home_journey_content_content_{{ $lang }}" height="150">{!! @$data->home_journey_content->{'content_' . $lang} !!}</x-editor.quill>
    </x-portal::form.group>

    <!-- Tabs -->
    <div class="flex space-x-4 border-b my-4">
        <a x-on:click="tab = 'info_1'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'info_1' }" class="py-2 px-4 cursor-pointer outline-none">Information #1</a>
        <a x-on:click="tab = 'info_2'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'info_2' }" class="py-2 px-4 cursor-pointer outline-none">Information #2</a>
        <a x-on:click="tab = 'info_3'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'info_3' }" class="py-2 px-4 cursor-pointer outline-none">Information #3</a>
    </div>

    <!-- Energy -->
    <div x-show="tab === 'info_1'" class="flex flex-col gap-4">
        <x-portal::form.input label="Title" placeholder="Title" name="home_journey_info_1_title_{{ $lang }}" :value="@$data->home_journey_info_1->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_journey_info_1_content_{{ $lang }}">
            <x-editor.quill name="home_journey_info_1_content_{{ $lang }}" height="150">{!! @$data->home_journey_info_1->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Water -->
    <div x-show="tab === 'info_2'" class="flex flex-col gap-4">
        <x-portal::form.input label="Title" placeholder="Title" name="home_journey_info_2_title_{{ $lang }}" :value="@$data->home_journey_info_2->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_journey_info_2_content_{{ $lang }}">
            <x-editor.quill name="home_journey_info_2_content_{{ $lang }}" height="150">{!! @$data->home_journey_info_2->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Port Storage -->
    <div x-show="tab === 'info_3'" class="flex flex-col gap-4">
        <x-portal::form.input label="Title" placeholder="Title" name="home_journey_info_3_title_{{ $lang }}" :value="@$data->home_journey_info_3->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_journey_info_3_content_{{ $lang }}">
            <x-editor.quill name="home_journey_info_3_content_{{ $lang }}" height="150">{!! @$data->home_journey_info_3->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
</div>
