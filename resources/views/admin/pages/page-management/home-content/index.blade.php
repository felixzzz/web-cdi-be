@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'home-banner' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.home-content.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'home-banner' }" x-on:click="tab_page = 'home-banner'">
                Home Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'about-us' }" x-on:click="tab_page = 'about-us'">
                About Us
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'infrastructure' }" x-on:click="tab_page = 'infrastructure'">
                Infrastructure
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'discover' }" x-on:click="tab_page = 'discover'">
                Discover
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'journey' }" x-on:click="tab_page = 'journey'">
                Journey
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'home-banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.home-banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.home-banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'about-us'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.about-us-section')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.about-us-section', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'infrastructure'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.infrastructure-section')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.infrastructure-section', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'discover'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.discover-section')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.discover-section', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'journey'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.journey-section')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.home-content.components.journey-section', ['lang' => 'id'])
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
