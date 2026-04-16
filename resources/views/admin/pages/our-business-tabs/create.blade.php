@extends('admin.layouts.main')

@section('content')
    <div class="w-full space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.page-management.our-business-tabs.store', ['id' => $businessId]) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
                >
                <x-file-upload.image
                    maxsize="8"
                    name="image"
                    class="w-full"
                />
            </x-portal::form.group>

            <div class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Name Tab" placeholder="Name Tab" name="title_en" :value="old('title_en')" type="text" required />
                    <x-portal::form.input label="Title" placeholder="Title" name="sub_title_en" :value="old('sub_title_en')" type="text" />
                    <x-portal::form.group
                        label="Description"
                        name="description_en"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="description_en" height="150">{!! old('description_en') !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Name Tab" placeholder="Name Tab" name="title_id" :value="old('title_id')" type="text" required />
                    <x-portal::form.input label="Title" placeholder="Title" name="sub_title_id" :value="old('sub_title_id')" type="text" />
                    <x-portal::form.group
                        label="Description"
                        name="description_id"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="description_id" height="150">{!! old('description_id') !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
