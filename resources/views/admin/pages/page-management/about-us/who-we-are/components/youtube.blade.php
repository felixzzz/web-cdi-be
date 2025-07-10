@props([
    'lang' => 'en',
])

<!-- Home Section -->
<x-portal::heading size="lg" class="!font-bold">Yotube</x-portal::heading>
<x-portal::form.input label="Content" placeholder="Content" name="about_us_youtube_content_en" :value="@$data->about_us_youtube->content_en" type="text" placeholder="https://www.youtube.com/embed/code" />
