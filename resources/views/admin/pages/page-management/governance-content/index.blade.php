@extends('admin.layouts.main')

@section('content')
    <form x-data="{ tab_page: 'banner' }" class="flex flex-col gap-4" method="POST" action="{{ route('admin.page-management.governance-content.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'banner' }" x-on:click="tab_page = 'banner'">
                Banner
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'corporate-secretary' }" x-on:click="tab_page = 'corporate-secretary'">
                Corporate Secretary
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'internal-audit' }" x-on:click="tab_page = 'internal-audit'">
                Internal Audit Unit
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'audit-committe' }" x-on:click="tab_page = 'audit-committe'">
                Audit Committe
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'sustainability-committe' }" x-on:click="tab_page = 'sustainability-committe'">
                Sustainability Committe
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'risk-management' }" x-on:click="tab_page = 'risk-management'">
                Risk Management
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'code-of-conduct' }" x-on:click="tab_page = 'code-of-conduct'">
                Code of Conduct
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'she-regulation' }" x-on:click="tab_page = 'she-regulation'">
                SHE Regulation
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'policy' }" x-on:click="tab_page = 'policy'">
                Policy
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'whistleblowing' }" x-on:click="tab_page = 'whistleblowing'">
                Whistleblowing
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <div x-show="tab_page === 'banner'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.banner')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.banner', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'corporate-secretary'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.corporate-secretary')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.corporate-secretary', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'internal-audit'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.internal-audit')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.internal-audit', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'audit-committe'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.audit-committe')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.audit-committe', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'sustainability-committe'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.sustainability-committe')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->

                </div>
            </div>

            <div x-show="tab_page === 'risk-management'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.risk-management')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.risk-management', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'code-of-conduct'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.code-of-conduct')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.code-of-conduct', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'she-regulation'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.she-regulation')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.she-regulation', ['lang' => 'id'])
                </div>
            </div>


            <div x-show="tab_page === 'policy'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.policy')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.policy', ['lang' => 'id'])
                </div>
            </div>

            <div x-show="tab_page === 'whistleblowing'" class="flex gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <!-- EN -->
                    @include('admin.pages.page-management.governance-content.components.whistleblowing')
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <!-- ID -->
                    @include('admin.pages.page-management.governance-content.components.whistleblowing', ['lang' => 'id'])
                </div>
            </div>

        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>

@endsection
