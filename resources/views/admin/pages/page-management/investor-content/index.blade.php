@extends('admin.layouts.main')

@push('js')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
@endpush

@section('content')
    <form x-data="{ tab_page: 'report-banner' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.investor-content.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'report-banner' }" x-on:click="tab_page = 'report-banner'">
                Report Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'report-overview' }" x-on:click="tab_page = 'report-overview'">
                Report Overview
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'report-table' }" x-on:click="tab_page = 'report-table'">
                Report Table
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'financial-banner' }" x-on:click="tab_page = 'financial-banner'">
                Financial Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'share-banner' }" x-on:click="tab_page = 'share-banner'">
                Share Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'shareholders-table' }" x-on:click="tab_page = 'shareholders-table'">
                Shareholders Table
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'dividend-table' }" x-on:click="tab_page = 'dividend-table'">
                Dividend Table
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'bonds-table' }" x-on:click="tab_page = 'bonds-table'">
                Bonds Table
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'publication-banner' }" x-on:click="tab_page = 'publication-banner'">
                Publication Banner
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'report-banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.investor-content.components.report-banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.investor-content.components.report-banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'report-overview'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.investor-content.components.overview')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.investor-content.components.overview', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'financial-banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.investor-content.components.financial-banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.investor-content.components.financial-banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'share-banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.investor-content.components.share-banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.investor-content.components.share-banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'publication-banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.investor-content.components.publication-banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    @include('admin.pages.page-management.investor-content.components.publication-banner', ['lang' => 'id'])
                </div>
            </div>

            @include('admin.pages.page-management.investor-content.components.data-table')
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
