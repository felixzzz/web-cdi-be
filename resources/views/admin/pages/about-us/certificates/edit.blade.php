@extends('admin.layouts.main')

@section('content')
    <div class="max-w-[800px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.awards-and-certificates.certificates.update', $data->ulid) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div id="image-upload-container" class="flex flex-col gap-4" x-data="{'alertDialog': ''}">
                @foreach ($data->files ?? [] as $key => $file)
                    <div class="image--certificate flex items-center gap-2 w-full" id="image--certificate-{{ $key }}">
                        <img src="{{ asset('storage/' . $file) }}" alt="Uploaded Image" class="w-2/3 rounded-xl">
                        <button type="button" class="bg-red-500 text-white px-2 py-1 rounded text-sm" x-on:click="alertDialog='image-{{ $key }}'">Delete</button>

                        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
                            <div class="fixed inset-0 bg-black/80 transition-opacity" aria-hidden="true" x-cloak
                                x-show="alertDialog=='image-{{ $key }}'" x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"></div>

                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-cloak x-show="alertDialog=='image-{{ $key }}'">
                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-cloak
                                        x-show="alertDialog=='image-{{ $key }}'"
                                        x-on:click.away="alertDialog = ''"
                                        class="relative transform overflow-hidden rounded-lg bg-background border text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                                    >
                                        <div class="bg-background px-4 py-5 sm:p-6 sm:pb-5">
                                            <div class="flex flex-col space-y-2 text-center sm:text-left">
                                                <x-portal::alert-dialog.title>
                                                    Are you absolutely sure?
                                                </x-portal::alert-dialog.title>
                                                <x-portal::alert-dialog.description>
                                                    This action cannot be undone. This will permanently delete your image from our servers.
                                                </x-portal::alert-dialog.description>

                                                <x-portal::alert-dialog.action>
                                                    <x-portal::button variant="outline" type="button" x-on:click="alertDialog = ''">
                                                        Cancel
                                                    </x-portal::button>

                                                    <x-portal::button variant="default" type="button" x-on:click="alertDialog = '';" onclick="removeImage(this, '{{ $file }}', '{{ $data->ulid }}', 'image--certificate-{{ $key }}')" >
                                                        Continue
                                                    </x-portal::button>

                                                </x-portal::alert-dialog.action>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Elemen pertama tanpa tombol delete -->
                <div class="x-portal--file-upload-image flex items-center gap-2 w-full">
                    <x-portal::form.group label="Image" name="file" description="" description-trailing="">
                        <x-portal::file-upload.image required maxsize="5" name="files[]" class="w-full" required />
                    </x-portal::form.group>
                </div>
            </div>

            <button type="button" onclick="duplicateImageUpload()" class="bg-primary text-white px-4 py-2 rounded">
                Add More Images
            </button>

            <x-portal::form.select name="certificate_category_id" label="Category">
                <option value="Select" selected disabled>Select</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ old('certificate_category_id', $data->certificate_category_id) == $item->id ? 'selected' : '' }}>{{ $item->name_en }}</option>
                @endforeach
            </x-portal::form.select>

            <x-portal::form.input label="Date" name="date" type="date" required :value="old('date', $data->date)" />

            <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" name="name_en" type="text" required :value="old('name_en', $data->name_en)" />
            <x-portal::form.group label="Content" name="content_en">
                <x-editor.quill name="content_en" height="150">{!! old('content_en', $data->content_en) !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" name="awarder_en" type="text" required :value="old('awarder_en', $data->awarder_en)" />

            <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
            <x-portal::form.input label="Name" name="name_id" type="text" required :value="old('name_id', $data->name_id)" />
            <x-portal::form.group label="Content" name="content_id">
                <x-editor.quill name="content_id" height="150">{!! old('content_id', $data->content_id) !!}</x-editor.quill>
            </x-portal::form.group>
            <x-portal::form.input label="Awarder" name="awarder_id" type="text" required :value="old('awarder_id', $data->awarder_id)" />

            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Update</x-portal::button>
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

    function removeImage(button, filePath, ulid, elementId) {
        fetch("{{ route('admin.awards-and-certificates.certificates.deleteImage') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ file: filePath, ulid })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                // button.closest('.image--certificate').remove();
                document.querySelector(`#${elementId}`).remove()
            }
        });
    }
</script>
@endpush
