@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'homepage' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.seo-schema.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700 overflow-x-auto">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'homepage' }" x-on:click="tab_page = 'homepage'">
                Homepage
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'about-us' }" x-on:click="tab_page = 'about-us'">
                About Us
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'governance' }" x-on:click="tab_page = 'governance'">
                Governance
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'sustainability' }" x-on:click="tab_page = 'sustainability'">
                Sustainability
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'contact-us' }" x-on:click="tab_page = 'contact-us'">
                Contact Us
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'our-business' }" x-on:click="tab_page = 'our-business'">
                Our Business
            </button>
        </div>

        <!-- Tab Content -->
        <div class="mt-4">
            <!-- Homepage -->
            <div x-show="tab_page === 'homepage'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Homepage JSON-LD (English)" name="json_ld_homepage_content_en" :value="old('json_ld_homepage_content_en', @$data->json_ld_homepage->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Homepage JSON-LD (Indonesian)" name="json_ld_homepage_content_id" :value="old('json_ld_homepage_content_id', @$data->json_ld_homepage->content_id)" />
                </div>
            </div>

            <!-- About Us -->
            <div x-show="tab_page === 'about-us'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="About Us JSON-LD (English)" name="json_ld_about_us_content_en" :value="old('json_ld_about_us_content_en', @$data->json_ld_about_us->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="About Us JSON-LD (Indonesian)" name="json_ld_about_us_content_id" :value="old('json_ld_about_us_content_id', @$data->json_ld_about_us->content_id)" />
                </div>
            </div>

            <!-- Governance -->
            <div x-show="tab_page === 'governance'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Governance JSON-LD (English)" name="json_ld_governance_content_en" :value="old('json_ld_governance_content_en', @$data->json_ld_governance->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Governance JSON-LD (Indonesian)" name="json_ld_governance_content_id" :value="old('json_ld_governance_content_id', @$data->json_ld_governance->content_id)" />
                </div>
            </div>

            <!-- Sustainability -->
            <div x-show="tab_page === 'sustainability'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Sustainability JSON-LD (English)" name="json_ld_sustainability_content_en" :value="old('json_ld_sustainability_content_en', @$data->json_ld_sustainability->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Sustainability JSON-LD (Indonesian)" name="json_ld_sustainability_content_id" :value="old('json_ld_sustainability_content_id', @$data->json_ld_sustainability->content_id)" />
                </div>
            </div>

            <!-- Contact Us -->
            <div x-show="tab_page === 'contact-us'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Contact Us JSON-LD (English)" name="json_ld_contact_us_content_en" :value="old('json_ld_contact_us_content_en', @$data->json_ld_contact_us->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Contact Us JSON-LD (Indonesian)" name="json_ld_contact_us_content_id" :value="old('json_ld_contact_us_content_id', @$data->json_ld_contact_us->content_id)" />
                </div>
            </div>

            <!-- Our Business -->
            <div x-show="tab_page === 'our-business'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Our Business JSON-LD (English)" name="json_ld_our_business_content_en" :value="old('json_ld_our_business_content_en', @$data->json_ld_our_business->content_en)" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.json-editor label="Our Business JSON-LD (Indonesian)" name="json_ld_our_business_content_id" :value="old('json_ld_our_business_content_id', @$data->json_ld_our_business->content_id)" />
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>
@endsection
