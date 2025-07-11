@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Home Banner</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.group
        label="Video"
        name="home_banner_file"
        description=""
        description-trailing=""
        >
        <x-file-upload
            icon="file-f"
            maxsize="10"
            name="home_banner_file"
            accept="video/*"
            description="Only video files are accepted, up to 10MB"
            class="w-full"
        />
    </x-portal::form.group>
    @if (@$data->home_banner->file)
        <p class="text-[0.8rem] text-muted-foreground">
            Preview existing file: <a href="{{ previewFile(@$data->home_banner->file) }}" class="text-blue-500" target="_blank">Click Here</a>
        </p>
    @endif

@endif
<x-portal::form.input label="Welcome Text" placeholder="Welcome Text" name="home_banner_tagline_title_{{ $lang }}" :value="@$data->home_banner_tagline->{'title_' . $lang}" type="text"  />
<x-portal::form.input label="Title" placeholder="Title" name="home_banner_title_{{ $lang }}" :value="@$data->home_banner->{'title_' . $lang}" type="text"  />
<x-portal::form.group
    label="Description"
    name="home_banner_content_{{ $lang }}"
    description=""
    description-trailing=""
>
    <x-editor.quill name="home_banner_content_{{ $lang }}" height="150">{!! @$data->home_banner->{'content_' . $lang} !!}</x-editor.quill>
</x-portal::form.group>
