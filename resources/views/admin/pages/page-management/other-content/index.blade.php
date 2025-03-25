@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'contact-us' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.other-content.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'contact-us' }" x-on:click="tab_page = 'contact-us'">
                Contact Us
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'media' }" x-on:click="tab_page = 'media'">
                Media
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'terms-and-conditions' }" x-on:click="tab_page = 'terms-and-conditions'">
                Terms & Conditions
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'privacy-policy' }" x-on:click="tab_page = 'privacy-policy'">
                Privacy Policy
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'cookies-consent' }" x-on:click="tab_page = 'cookies-consent'">
                Cookies Consent
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'disclaimer' }" x-on:click="tab_page = 'disclaimer'">
                Disclaimer
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'contact-us'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.contact-us')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.other-content.components.contact-us', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'media'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.media')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                </div>
            </div>

            <div x-show="tab_page === 'terms-and-conditions'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.terms-and-conditions')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.other-content.components.terms-and-conditions', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'privacy-policy'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.privacy-policy')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.other-content.components.privacy-policy', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'cookies-consent'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.cookies-consent')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.other-content.components.cookies-consent', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'disclaimer'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.other-content.components.disclaimer')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.other-content.components.disclaimer', ['lang' => 'id'])
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
