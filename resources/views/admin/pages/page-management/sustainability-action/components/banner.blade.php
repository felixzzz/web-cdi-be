@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Banner</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Background"
        name="sustainability_action_banner_file"
        description=""
        description-trailing=""
        >
        <x-file-upload.image
            :value="previewFile(@$data->sustainability_action_banner->file)"
            maxsize="8"
            name="sustainability_action_banner_file"
            class="w-full"
        />
    </x-portal::form.group>

@endif
<x-portal::form.input label="Section Title" placeholder="Section Title" name="sustainability_action_banner_title_{{ $lang }}" :value="@$data->sustainability_action_banner->{'title_' . $lang}" type="text"  />
