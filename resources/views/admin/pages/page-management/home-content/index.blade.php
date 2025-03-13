@extends('admin.layouts.main')

@section('content')
    <form class="flex gap-4 max-lg:flex-col" method="POST" action="{{ route('admin.page-management.home-content.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-4 w-full">
            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">

            @include('admin.pages.page-management.home-content.components.home-banner')
            @include('admin.pages.page-management.home-content.components.about-us-section')
            @include('admin.pages.page-management.home-content.components.infrastructure-section')
            @include('admin.pages.page-management.home-content.components.discover-section')
            @include('admin.pages.page-management.home-content.components.journey-section')

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </div>
        <div class="max-lg:hidden">
            <x-portal::separator orientation="vertical" />
        </div>
        <div class="flex flex-col gap-4 w-full">
            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            @include('admin.pages.page-management.home-content.components.home-banner', ['lang' => 'id'])
            @include('admin.pages.page-management.home-content.components.about-us-section', ['lang' => 'id'])
            @include('admin.pages.page-management.home-content.components.infrastructure-section', ['lang' => 'id'])
            @include('admin.pages.page-management.home-content.components.discover-section', ['lang' => 'id'])
            @include('admin.pages.page-management.home-content.components.journey-section', ['lang' => 'id'])

        </div>
    </form>
@endsection
