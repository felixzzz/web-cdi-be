@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'what-we-do' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.our-business-list.update', $data->ulid) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'what-we-do' }" x-on:click="tab_page = 'what-we-do'">
                What We Do Page
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'banner' }" x-on:click="tab_page = 'banner'">
                Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'overview' }" x-on:click="tab_page = 'overview'">
                Overview
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'link' }" x-on:click="tab_page = 'link'">
                Link
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'seo' }" x-on:click="tab_page = 'seo'">
                SEO / Schema
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'what-we-do'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.our-business.components.what-we-do')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.our-business.components.what-we-do', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.our-business.components.banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.our-business.components.banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'overview'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.our-business.components.overview')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.our-business.components.overview', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'link'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.our-business.components.link')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.our-business.components.link', [ 'lang' => 'id' ])
                </div>
            </div>

            <div x-show="tab_page === 'seo'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    <x-editor.json-editor label="JSON-LD Schema (English)" name="json_ld_en" :value="$data->json_ld_en" />
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    <x-editor.json-editor label="JSON-LD Schema (Indonesian)" name="json_ld_id" :value="$data->json_ld_id" />
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
