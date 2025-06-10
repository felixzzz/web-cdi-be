@props([
    'lang' => 'en',
])

<!-- Home Section -->
<img src="{{ asset("assets/frontend/icons/flag_{$lang}.svg") }}" alt="" class="w-5">
<x-portal::heading size="lg" class="!font-bold">Link</x-portal::heading>
@if ($lang == 'en')
    <x-portal::form.input label="URL" placeholder="URL" name="link_url" :value="@$data->link_url" type="text"  />
@endif
<x-portal::form.input label="Text Button" placeholder="Text Button" name="link_title_{{ $lang }}" :value="@$data->{'link_title_' . $lang}" type="text"  />
