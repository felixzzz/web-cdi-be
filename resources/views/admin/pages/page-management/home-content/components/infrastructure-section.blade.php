@props(['lang' => 'en'])

<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<div x-data="{ tab: 'energy' }" class="flex flex-col gap-4">
    <x-portal::heading size="lg" class="!font-bold">Infrastructure Section</x-portal::heading>
    <x-portal::form.input
        label="Title"
        placeholder="Title"
        name="home_infrastructure_title_title_{{ $lang }}"
        :value="@$data->home_infrastructure_title->{'title_' . $lang}"
        type="text"
    />

    <!-- Tabs -->
    <div class="flex space-x-4 border-b my-4">
        <a x-on:click="tab = 'energy'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'energy' }" class="py-2 px-4 cursor-pointer outline-none">Energy</a>
        <a x-on:click="tab = 'water'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'water' }" class="py-2 px-4 cursor-pointer outline-none">Water</a>
        <a x-on:click="tab = 'port_storage'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'port_storage' }" class="py-2 px-4 cursor-pointer outline-none">Port Storage</a>
        <a x-on:click="tab = 'logistic'" x-bind:class="{ 'border-b-2 text-primary !font-bold' : tab === 'logistic' }" class="py-2 px-4 cursor-pointer outline-none">Logistic</a>
    </div>

    <!-- Energy -->
    <div x-show="tab === 'energy'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_infrastructure_energy_file">
                <x-file-upload.image  maxsize="5" name="home_infrastructure_energy_file" class="w-full" :value="previewFile(@$data->home_infrastructure_energy->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_infrastructure_energy_title_{{ $lang }}" :value="@$data->home_infrastructure_energy->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_infrastructure_energy_content_{{ $lang }}">
            <x-editor.quill name="home_infrastructure_energy_content_{{ $lang }}" height="150">{!! @$data->home_infrastructure_energy->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Water -->
    <div x-show="tab === 'water'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_infrastructure_water_file">
                <x-file-upload.image  maxsize="5" name="home_infrastructure_water_file" class="w-full" :value="previewFile(@$data->home_infrastructure_water->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_infrastructure_water_title_{{ $lang }}" :value="@$data->home_infrastructure_water->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_infrastructure_water_content_{{ $lang }}">
            <x-editor.quill name="home_infrastructure_water_content_{{ $lang }}" height="150">{!! @$data->home_infrastructure_water->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Port Storage -->
    <div x-show="tab === 'port_storage'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_infrastructure_port_storage_file">
                <x-file-upload.image  maxsize="5" name="home_infrastructure_port_storage_file" class="w-full" :value="previewFile(@$data->home_infrastructure_port_storage->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_infrastructure_port_storage_title_{{ $lang }}" :value="@$data->home_infrastructure_port_storage->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_infrastructure_port_storage_content_{{ $lang }}">
            <x-editor.quill name="home_infrastructure_port_storage_content_{{ $lang }}" height="150">{!! @$data->home_infrastructure_port_storage->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>

    <!-- Logistic -->
    <div x-show="tab === 'logistic'" class="flex flex-col gap-4">
        @if ($lang == 'en')
            <x-portal::form.group label="Background" name="home_infrastructure_logistic_file">
                <x-file-upload.image  maxsize="5" name="home_infrastructure_logistic_file" class="w-full" :value="previewFile(@$data->home_infrastructure_logistic->file)" />
            </x-portal::form.group>
        @endif
        <x-portal::form.input label="Title" placeholder="Title" name="home_infrastructure_logistic_title_{{ $lang }}" :value="@$data->home_infrastructure_logistic->{'title_' . $lang}" type="text"  />
        <x-portal::form.group label="Description" name="home_infrastructure_logistic_content_{{ $lang }}">
            <x-editor.quill name="home_infrastructure_logistic_content_{{ $lang }}" height="150">{!! @$data->home_infrastructure_logistic->{'content_' . $lang} !!}</x-editor.quill>
        </x-portal::form.group>
    </div>
</div>
