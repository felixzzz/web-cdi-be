@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.investor.reports.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <x-portal::form.select
                name="type"
                label="Type"
                description=""
                description-trailing=""
            >
                <option value="Select a type" selected disabled>
                    Select a type
                </option>
                <option value="annual_report" {{ old('type') == 'annual_report' ? 'selected' : '' }}>Annual Report</option>
                <option value="financial_report" {{ old('type') == 'financial_report' ? 'selected' : '' }}>Financial Report</option>
                <option value="prospectus" {{ old('type') == 'prospectus' ? 'selected' : '' }}>Prospectus</option>
                <option value="gms" {{ old('type') == 'gms' ? 'selected' : '' }}>GMS</option>
                <option value="disclosure" {{ old('type') == 'disclosure' ? 'selected' : '' }}>Public Announcement</option>
                <option value="company_overview" {{ old('type') == 'company_overview' ? 'selected' : '' }}>Company Overview</option>
                <option value="earnings_update" {{ old('type') == 'earnings_update' ? 'selected' : '' }}>Earnings Update</option>
                <option value="investor_update" {{ old('type') == 'investor_update' ? 'selected' : '' }}>Investor Update</option>
            </x-portal::form.select>

            <x-portal::form.input label="Datetime" placeholder="Datetime" name="datetime" value="{{ old('datetime', now()) }}" type="datetime-local" required />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.group
                label="File"
                name="file_en"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload
                    icon="file-type-pdf"
                    required
                    maxsize="5"
                    name="file_en"
                    class="w-full"
                    accept="application/pdf" description="Only PDF file are accepted"
                />
            </x-portal::form.group>

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_id" :value="old('name_id')" type="text" required />
            <x-portal::form.group
                label="File"
                name="file_id"
                description=""
                description-trailing=""
            >
                <x-portal::file-upload
                    icon="file-type-pdf"
                    required
                    maxsize="5"
                    name="file_id"
                    class="w-full"
                    accept="application/pdf" description="Only PDF file are accepted"
                />
            </x-portal::form.group>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
