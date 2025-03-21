@extends('admin.layouts.main')

@section('content')
    <div class="w-full space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.sustainability-tabs.update', ['tabId' => $data->ulid, 'category' => $category ]) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" required />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" required />
                </div>
            </div>
            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
