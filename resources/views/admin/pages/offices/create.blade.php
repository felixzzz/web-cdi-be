@extends('admin.layouts.main')

@section('content')
    <div class="space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.offices.store') }}" class="flex gap-4 max-lg:flex-col">
            @csrf
            <div class="flex flex-col gap-4 w-full">
                <x-portal::form.input label="Name" placeholder="Name" name="name" :value="old('name')" type="text" required />

                <x-portal::form.select
                    name="is_main"
                    label="Is Main Office"
                    description=""
                    description-trailing=""
                >
                    <option value="0" {{ old('is_main') == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('is_main') == 1 ? 'selected' : '' }}>Yes</option>
                </x-portal::form.select>

                <x-portal::form.input label="Phone (Optional)" placeholder="Phone" name="phone" :value="old('phone')" type="text" />
                <x-portal::form.input label="Fax (Optional)" placeholder="Fax" name="fax" :value="old('fax')" type="text" />


                <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                <x-portal::form.input label="Sub Title (Optional)" placeholder="Sub Title" name="sub_title_en" :value="old('sub_title_en')" type="text" />
                <x-portal::form.input label="Location Name" placeholder="Location Name" name="location_en" :value="old('location_en')" type="text" required />
                <x-portal::form.input label="Address" placeholder="Address" name="address_en" :value="old('address_en')" type="text" required />

                <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                <x-portal::form.input label="Sub Title (Optional)" placeholder="Sub Title" name="sub_title_id" :value="old('sub_title_id')" type="text" />
                <x-portal::form.input label="Location Name" placeholder="Location Name" name="location_id" :value="old('location_id')" type="text" required />
                <x-portal::form.input label="Address" placeholder="Address" name="address_id" :value="old('address_id')" type="text" required />

                <!-- Submit Button -->
                <div class="mt-6">
                    <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
                </div>
            </div>

            <div class="max-lg:hidden">
                <x-portal::separator orientation="vertical" />
            </div>

            <div class="flex flex-col gap-4 w-full">
                <x-portal::heading size="lg" class="!font-bold">Branchs</x-portal::heading>
                <div id="branch-container" class="flex flex-col gap-4"></div>
                <div class="mt-6">
                    <x-portal::button type="button" class="w-full" onclick="addBranch()">Add Branch</x-portal::button>
                </div>
            </div>

        </form>
    </div>
@endsection


@push('js')
<script>
    function addBranch() {
        let container = document.getElementById('branch-container');

        let branchElement = document.createElement('div');
        branchElement.classList.add('p-4', 'border', 'rounded-lg', 'space-y-4', 'relative');

        branchElement.innerHTML = `
            <button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removeBranch(this)">
                <i class="isax icon-trash"></i>
            </button>

            <x-portal::form.input label="Phone (Optional)" placeholder="Phone" name="branch_phone[]" type="text" />
            <x-portal::form.input label="Fax (Optional)" placeholder="Fax" name="branch_fax[]" type="text" />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Location Name" placeholder="Location Name" name="branch_location_en[]" type="text" required />
            <x-portal::form.input label="Address" placeholder="Address" name="branch_address_en[]" type="text" required />


            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Location Name" placeholder="Location Name" name="branch_location_id[]" type="text" required />
            <x-portal::form.input label="Address" placeholder="Address" name="branch_address_id[]" type="text" required />
        `;

        container.appendChild(branchElement);
    }

    function removeBranch(button) {
        button.parentElement.remove();
    }
</script>
@endpush
