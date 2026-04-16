@props(['lang' => 'en'])


<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<div x-data="{ tab: 'sustainability' }" class="flex flex-col gap-4">
    <x-portal::heading size="lg" class="!font-bold">Discover Section</x-portal::heading>
    <x-portal::form.input
        label="Title"
        placeholder="Title"
        name="home_discover_title_title_{{ $lang }}"
        :value="@$data->home_discover_title->{'title_' . $lang}"
        type="text"
    />

    <!-- Tabs -->
    <div class="flex space-x-4 border-b my-4">
        <a x-on:click="tab = 'sustainability'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'sustainability' }" class="py-2 px-4 cursor-pointer outline-none">Sustainability</a>
        <a x-on:click="tab = 'our_business'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'our_business' }" class="py-2 px-4 cursor-pointer outline-none">Our Business</a>
        <a x-on:click="tab = 'investor'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'investor' }" class="py-2 px-4 cursor-pointer outline-none">Investor</a>
        <a x-on:click="tab = 'career'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'career' }" class="py-2 px-4 cursor-pointer outline-none">Career</a>
    </div>

    <!-- Energy -->
    <div x-show="tab === 'sustainability'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_discover_sustainability_file">
                <x-file-upload.image  maxsize="8" name="home_discover_sustainability_file" class="w-full" :value="previewFile(@$data->home_discover_sustainability->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_discover_sustainability_title_{{ $lang }}" :value="@$data->home_discover_sustainability->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_discover_sustainability_content_{{ $lang }}">
            <x-editor.quill name="home_discover_sustainability_content_{{ $lang }}" height="150">{!! @$data->home_discover_sustainability->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Water -->
    <div x-show="tab === 'our_business'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_discover_our_business_file">
                <x-file-upload.image  maxsize="8" name="home_discover_our_business_file" class="w-full" :value="previewFile(@$data->home_discover_our_business->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_discover_our_business_title_{{ $lang }}" :value="@$data->home_discover_our_business->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_discover_our_business_content_{{ $lang }}">
            <x-editor.quill name="home_discover_our_business_content_{{ $lang }}" height="150">{!! @$data->home_discover_our_business->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Port Storage -->
    <div x-show="tab === 'investor'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_discover_investor_file">
                <x-file-upload.image  maxsize="8" name="home_discover_investor_file" class="w-full" :value="previewFile(@$data->home_discover_investor->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_discover_investor_title_{{ $lang }}" :value="@$data->home_discover_investor->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_discover_investor_content_{{ $lang }}">
            <x-editor.quill name="home_discover_investor_content_{{ $lang }}" height="150">{!! @$data->home_discover_investor->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Logistic -->
    <div x-show="tab === 'career'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_discover_career_file">
                <x-file-upload.image  maxsize="8" name="home_discover_career_file" class="w-full" :value="previewFile(@$data->home_discover_career->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_discover_career_title_{{ $lang }}" :value="@$data->home_discover_career->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_discover_career_content_{{ $lang }}">
            <x-editor.quill name="home_discover_career_content_{{ $lang }}" height="150">{!! @$data->home_discover_career->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
</div>
