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
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'meta-seo' }" x-on:click="tab_page = 'meta-seo'">
                Meta Tags (SEO)
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'llms-txt' }" x-on:click="tab_page = 'llms-txt'">
                llms.txt
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 focus:outline-none whitespace-nowrap"
                x-bind:class="{ 'border-b-2 !font-bold': tab_page === 'llms-full-txt' }" x-on:click="tab_page = 'llms-full-txt'">
                llms-full.txt
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

            <!-- llms.txt -->
            <div x-show="tab_page === 'llms-txt'" class="flex flex-col gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.markdown-editor
                        label="llms.txt Content (Served at /llms.txt)"
                        name="llms_txt_content_en"
                        :value="old('llms_txt_content_en', @$data->llms_txt->content_en)"
                        :defaultValue="$defaultLlmsTxt ?? ''"
                        height="480px"
                    />
                </div>
            </div>

            <!-- llms-full.txt -->
            <div x-show="tab_page === 'llms-full-txt'" class="flex flex-col gap-4">
                <div class="flex flex-col gap-4 w-full">
                    <x-editor.markdown-editor
                        label="llms-full.txt Content (Served at /llms-full.txt)"
                        name="llms_full_txt_content_en"
                        :value="old('llms_full_txt_content_en', @$data->llms_full_txt->content_en)"
                        :defaultValue="$defaultLlmsFullTxt ?? ''"
                        height="560px"
                    />
                </div>
            </div>

            @php
                $seoMetaSections = [
                    'General & Homepage' => [
                        ['key' => 'meta_home', 'label' => 'Homepage', 'route' => '/'],
                        ['key' => 'meta_contact_us', 'label' => 'Contact Us', 'route' => '/contact-us'],
                    ],
                    'About Us' => [
                        ['key' => 'meta_about_us', 'label' => 'About Us - Overview', 'route' => '/about-us'],
                        ['key' => 'meta_about_us_management', 'label' => 'Management & Board', 'route' => '/about-us/management'],
                        ['key' => 'meta_about_us_awards', 'label' => 'Awards & Certifications', 'route' => '/about-us/awards'],
                    ],
                    'Our Business' => [
                        ['key' => 'meta_our_business', 'label' => 'Our Business - Overview', 'route' => '/our-business'],
                        ['key' => 'meta_our_business_energy', 'label' => 'Energy Solutions', 'route' => '/our-business/energy'],
                        ['key' => 'meta_our_business_water', 'label' => 'Water Solutions', 'route' => '/our-business/water'],
                        ['key' => 'meta_our_business_ports', 'label' => 'Ports & Storage Solutions', 'route' => '/our-business/ports-and-storage'],
                        ['key' => 'meta_our_business_logistics', 'label' => 'Logistics Solutions', 'route' => '/our-business/logistics'],
                    ],
                    'Corporate Governance (GCG)' => [
                        ['key' => 'meta_governance', 'label' => 'Governance - Overview', 'route' => '/governance'],
                        ['key' => 'meta_governance_policy', 'label' => 'Governance - Policies', 'route' => '/governance/policy'],
                        ['key' => 'meta_governance_whistleblowing', 'label' => 'Whistleblowing System (WBS)', 'route' => '/governance/whistleblowing-system'],
                    ],
                    'Sustainability (ESG)' => [
                        ['key' => 'meta_sustainability', 'label' => 'Sustainability - Overview', 'route' => '/sustainability'],
                        ['key' => 'meta_sustainability_environment', 'label' => 'Sustainability - Environment', 'route' => '/sustainability/environment'],
                        ['key' => 'meta_sustainability_social', 'label' => 'Sustainability - Social', 'route' => '/sustainability/social'],
                        ['key' => 'meta_sustainability_governance', 'label' => 'Sustainability - Governance', 'route' => '/sustainability/governance'],
                    ],
                    'Investor Relations' => [
                        ['key' => 'meta_investor_report', 'label' => 'Investor - Company Reports', 'route' => '/investor/report'],
                        ['key' => 'meta_investor_financial', 'label' => 'Investor - Financial Information', 'route' => '/investor/financial-information'],
                        ['key' => 'meta_investor_shares', 'label' => 'Investor - Shares Information', 'route' => '/investor/shares-information'],
                        ['key' => 'meta_investor_publications', 'label' => 'Investor - Publications', 'route' => '/investor/publications-for-investors'],
                    ],
                    'Media & News' => [
                        ['key' => 'meta_media_news', 'label' => 'Media - News & Articles', 'route' => '/media/news'],
                    ],
                    'Legal & Policies' => [
                        ['key' => 'meta_terms', 'label' => 'Terms and Conditions', 'route' => '/terms-and-conditions'],
                        ['key' => 'meta_privacy', 'label' => 'Privacy Policy', 'route' => '/privacy-policy'],
                        ['key' => 'meta_cookies', 'label' => 'Cookie Policy', 'route' => '/cookies-consent'],
                        ['key' => 'meta_disclaimer', 'label' => 'Disclaimer', 'route' => '/disclaimer'],
                    ],
                ];
            @endphp

            <!-- Meta Tags (SEO) -->
            <div x-show="tab_page === 'meta-seo'" class="flex flex-col gap-6">
                <div class="bg-blue-50 dark:bg-zinc-800/60 p-4 rounded-lg border border-blue-200 dark:border-zinc-700 text-sm text-gray-700 dark:text-gray-300">
                    <p class="font-semibold text-blue-900 dark:text-blue-300 mb-1">SEO Meta Tags Guidelines:</p>
                    <ul class="list-disc list-inside space-y-1 text-xs">
                        <li><strong>Title tag:</strong> Optimal length is 50-60 characters including branding (e.g. <code>| Chandra Daya Investasi</code>).</li>
                        <li><strong>Meta Description:</strong> Optimal length is 140-160 characters. Provides a concise, click-worthy summary for search engines.</li>
                    </ul>
                </div>

                @foreach ($seoMetaSections as $sectionTitle => $pages)
                    <div class="flex flex-col gap-4 border border-gray-200 dark:border-zinc-800 rounded-xl p-5 bg-white dark:bg-zinc-900/50 shadow-sm">
                        <div class="flex items-center justify-between border-b border-gray-200 dark:border-zinc-800 pb-3">
                            <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">{{ $sectionTitle }}</h3>
                            <span class="text-xs text-gray-500 font-mono">{{ count($pages) }} {{ Str::plural('page', count($pages)) }}</span>
                        </div>

                        <div class="flex flex-col gap-6">
                            @foreach ($pages as $p)
                                @php $key = $p['key']; @endphp
                                <div class="p-4 bg-gray-50/70 dark:bg-zinc-800/40 rounded-lg border border-gray-200 dark:border-zinc-800 flex flex-col gap-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold text-sm text-gray-800 dark:text-gray-200">{{ $p['label'] }}</span>
                                            <span class="text-xs bg-gray-200 dark:bg-zinc-700 px-2 py-0.5 rounded font-mono text-gray-600 dark:text-gray-400">{{ $p['route'] }}</span>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                        <!-- EN Column -->
                                        <div class="flex flex-col gap-3 p-3 bg-white dark:bg-zinc-900 rounded-md border border-gray-200 dark:border-zinc-800">
                                            <div class="flex items-center gap-2 pb-1 border-b border-gray-100 dark:border-zinc-800">
                                                <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="EN" class="w-4 h-4">
                                                <span class="text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-400">English</span>
                                            </div>
                                            <x-portal::form.input
                                                label="Title (EN)"
                                                name="{{ $key }}_title_en"
                                                :value="old($key . '_title_en', @$data->{$key}->title_en)"
                                                placeholder="Page Title (EN)..."
                                            />
                                            <x-portal::form.textarea
                                                rows="3"
                                                label="Meta Description (EN)"
                                                name="{{ $key }}_content_en"
                                                :value="old($key . '_content_en', @$data->{$key}->content_en)"
                                                placeholder="Meta Description (EN)..."
                                            />
                                        </div>

                                        <!-- ID Column -->
                                        <div class="flex flex-col gap-3 p-3 bg-white dark:bg-zinc-900 rounded-md border border-gray-200 dark:border-zinc-800">
                                            <div class="flex items-center gap-2 pb-1 border-b border-gray-100 dark:border-zinc-800">
                                                <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="ID" class="w-4 h-4">
                                                <span class="text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-400">Indonesian</span>
                                            </div>
                                            <x-portal::form.input
                                                label="Title (ID)"
                                                name="{{ $key }}_title_id"
                                                :value="old($key . '_title_id', @$data->{$key}->title_id)"
                                                placeholder="Judul Halaman (ID)..."
                                            />
                                            <x-portal::form.textarea
                                                rows="3"
                                                label="Meta Description (ID)"
                                                name="{{ $key }}_content_id"
                                                :value="old($key . '_content_id', @$data->{$key}->content_id)"
                                                placeholder="Deskripsi Meta (ID)..."
                                            />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 lg:max-w-1/2">
            <x-portal::button type="submit" class="w-full">Save All</x-portal::button>
        </div>
    </form>
@endsection
