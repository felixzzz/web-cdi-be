@extends('admin.layouts.main')

@section('content')
    <form method="POST" action="{{ route('admin.responsibles.update', $data->ulid) }}" class="space-y-6 w-full" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-session.alert />

        <div class="flex max-lg:flex-col gap-4 justify-between w-full">

            <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" required />
                <x-portal::form.group
                    label="Description"
                    name="description_en"
                    description=""
                    description-trailing=""
                >
                    <x-editor.quill name="description_en" height="150">{!! $data->description_en !!}</x-editor.quill>
                </x-portal::form.group>
                <div class="flex items-center justify-between">
                    <x-portal::heading size="lg" class="!font-bold">Points</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addPoint('en')"></i>
                </div>
                <div id="list-en-container" class="flex flex-col gap-4">
                    @if(isset($data) && !empty($data->list_en))
                        @foreach($data->list_en as $index => $list)
                            <div class="flex items-center gap-4">
                                <x-portal::input placeholder="Point" name="list_en[]" class="w-full" type="text" value="{{ $list }}" />
                                <button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removePoint(this)">
                                    <i class='isax icon-trash'></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="max-lg:hidden">
                <x-portal::separator orientation="vertical" />
            </div>


            <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" required />
                <x-portal::form.group
                    label="Description"
                    name="description_id"
                    description=""
                    description-trailing=""
                >
                    <x-editor.quill name="description_id" height="150">{!! $data->description_id !!}</x-editor.quill>
                </x-portal::form.group>
                <div class="flex items-center justify-between">
                    <x-portal::heading size="lg" class="!font-bold">Points</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addPoint('id')"></i>
                </div>
                <div id="list-id-container" class="flex flex-col gap-4">
                    @if(isset($data) && !empty($data->list_id))
                        @foreach($data->list_id as $index => $list)
                            <div class="flex items-center gap-4">
                                <x-portal::input placeholder="Point" name="list_id[]" class="w-full" type="text" value="{{ $list }}" />
                                <button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removePoint(this)">
                                    <i class='isax icon-trash'></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="mt-6 w-fit">
            <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function addPoint(lang) {
            let container = document.getElementById(`list-${lang}-container`);

            let branchElement = document.createElement('div');
            branchElement.classList.add('flex', 'items-center', 'gap-4');

            branchElement.innerHTML = `
                <x-portal::input placeholder="Point" class="w-full" name="list_${lang}[]" type="text" />
                <button type="button" class="bg-red-500 text-white text-sm flex w-6 h-6 rounded-full items-center justify-center" onclick="removePoint(this)">
                    <i class='isax icon-trash'></i>
                </button>
            `;

            container.appendChild(branchElement);
        }

        function removePoint(button) {
            button.parentElement.remove();
        }
    </script>
@endpush
