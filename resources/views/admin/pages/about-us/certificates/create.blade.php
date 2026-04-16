@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.awards-and-certificates.certificates.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf

            <div id="image-upload-container" class="flex flex-col gap-4">
                <!-- Elemen pertama tanpa tombol delete -->
                <div class="x-portal--file-upload-image flex items-center gap-2 w-full">
                    <x-portal::form.group label="Image" name="file" description="" description-trailing="">
                        <x-portal::file-upload.image required maxsize="8" name="files[]" class="w-full" required />
                    </x-portal::form.group>
                </div>
            </div>

            <!-- Tombol untuk menambah gambar -->
            <button type="button" onclick="duplicateImageUpload()" class="bg-primary text-white px-4 py-2 rounded">
                Add More Images
            </button>

            <x-portal::form.select
                name="certificate_category_id"
                label="Category"
                description=""
                description-trailing=""
            >
                <option value="Select" selected disabled>
                    Select
                </option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ old('certificate_category_id') == $item->id ? 'selected' : '' }}>{{ $item->name_en }}</option>
                @endforeach
            </x-portal::form.select>

            <x-portal::form.input label="Date" placeholder="Date" name="date" :value="old('date')" type="date" required value="{{ now()->format('Y-m-d') }}" />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_en" :value="old('name_en')" type="text" required />
            <x-portal::form.group label="Content" name="content_en" description="" description-trailing="">
                <x-editor.quill name="content_en" height="150">{!! old('content_en') !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_en" :value="old('awarder_en')" type="text" required />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" placeholder="Name" name="name_id" :value="old('name_id')" type="text" required />
            <x-portal::form.group label="Content" name="content_id" description="" description-trailing="">
                <x-editor.quill name="content_id" height="150">{!! old('content_id') !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" placeholder="Awarder" name="awarder_id" :value="old('awarder_id')" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection

@push('js')
<script>
    function duplicateImageUpload() {
        let container = document.getElementById('image-upload-container');
        let firstImageUpload = container.querySelector('.x-portal--file-upload-image'); // Ambil elemen pertama

        if (firstImageUpload) {
            let clonedElement = firstImageUpload.cloneNode(true); // Clone elemen pertama
            let deleteButton = document.createElement('button'); // Buat tombol delete

            deleteButton.textContent = 'Delete';
            deleteButton.type = 'button';
            deleteButton.classList.add('bg-red-500', 'text-white', 'px-2', 'py-1', 'rounded', 'text-sm');

            deleteButton.addEventListener('click', function () {
                this.closest('.x-portal--file-upload-image').remove();
            });

            // Tambahkan tombol delete hanya ke elemen yang dikloning
            clonedElement.appendChild(deleteButton);
            container.appendChild(clonedElement);
        }
    }
</script>
@endpush
