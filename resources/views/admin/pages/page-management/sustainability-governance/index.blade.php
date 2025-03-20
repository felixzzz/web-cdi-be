@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'banner' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.sustainability-governance.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'banner' }" x-on:click="tab_page = 'banner'">
                Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'overview' }" x-on:click="tab_page = 'overview'">
                Overview
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.sustainability-governance.components.banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.sustainability-governance.components.banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'overview'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.sustainability-governance.components.overview')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.sustainability-governance.components.overview', ['lang' => 'id'])
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
