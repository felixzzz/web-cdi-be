@extends('admin.layouts.main')

@section('content')
    <div class="w-full space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.sustainability-contents.update', ['category' => $category, 'tabId' => $data->ulid]) }}" class="flex flex-col gap-4" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <x-portal::form.input label="Name Identifier" placeholder="Name Identifier" name="name" :value="$data->name" type="text" required />
            <x-portal::form.select
                name="is_show"
                label="Show?"
                description=""
                description-trailing=""
            >
                <option value="1" {{ $data->is_show == 1 ? 'selected' : '' }}>Show</option>
                <option value="0" {{ $data->is_show == 0 ? 'selected' : '' }}>Hide</option>
            </x-portal::form.select>

            <x-portal::form.group
                label="Image"
                name="image"
                description=""
                description-trailing=""
                >
                <x-file-upload.image
                    :value="previewFile($data->image)"
                    maxsize="5"
                    name="image"
                    class="w-full"
                />
            </x-portal::form.group>

            <x-portal::form.select
                name="type"
                label="Type"
                description=""
                description-trailing=""
            >
                <option value="content" {{ $data->type->value == 'content' ? 'selected' : '' }}>Content</option>
                <option value="grid" {{ $data->type->value == 'grid' ? 'selected' : '' }}>Grid</option>
                <option value="simple_text_information" {{ $data->type->value == 'simple_text_information' ? 'selected' : '' }}>Simple Text Information</option>
                <option value="file_information" {{ $data->type->value == 'file_information' ? 'selected' : '' }}>File Information</option>
                <option value="list_information" {{ $data->type->value == 'list_information' ? 'selected' : '' }}>List Information</option>
                <option value="swiper" {{ $data->type->value == 'swiper' ? 'selected' : '' }}>Swiper</option>
            </x-portal::form.select>

            <!-- Show on type Grid Type -->
            <section class="flex flex-col gap-4" id="grid_type_section">
                <x-portal::form.select
                    name="grid_type"
                    label="Grid Type"
                    description=""
                    description-trailing=""
                    onchange="toggleFields()"
                >
                    <option value="icon_content_card" {{ $data->grid_type == 'icon_content_card' ? 'selected' : '' }}>Icon Content Card</option>
                    <option value="icon_list_card" {{ $data->grid_type == 'icon_list_card' ? 'selected' : '' }}>Icon List Card</option>
                    <option value="box_icon_card" {{ $data->grid_type == 'box_icon_card' ? 'selected' : '' }}>Box Icon Card</option>
                    <option value="image_content_card" {{ $data->grid_type == 'image_content_card' ? 'selected' : '' }}>Image Content Card</option>
                </x-portal::form.select>
            </section>

            <!-- Show on type Content -->
            <section class="flex flex-col gap-4" id="align_section">
                <x-portal::form.select
                    name="align"
                    label="Align Content"
                    description=""
                    description-trailing=""
                >
                    <option value="left" {{ $data->align == 'left' ? 'selected' : '' }}>Left</option>
                    <option value="right" {{ $data->align == 'right' ? 'selected' : '' }}>Right</option>
                </x-portal::form.select>
            </section>

            <!-- Show on type Grid or File Information -->
            <section class="flex flex-col gap-4" id="grid_direction_section">
                <x-portal::form.select
                    name="grid_direction"
                    label="Grid Header Direction"
                    description=""
                    description-trailing=""
                >
                    <option value="row" {{ $data->grid_direction == 'row' ? 'selected' : '' }}>Row</option>
                    <option value="col" {{ $data->grid_direction == 'col' ? 'selected' : '' }}>Column</option>
                </x-portal::form.select>
            </section>

            <!-- Show on type Grid & grid type Box Icon Card -->
            <section class="flex flex-col gap-4" id="grid_pattern_section">
                <x-portal::form.select
                    name="grid_pattern"
                    label="Grid Pattern"
                    description=""
                    description-trailing=""
                >
                    <option value="normal" {{ $data->grid_pattern == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="zig-zag" {{ $data->grid_pattern == 'zig-zag' ? 'selected' : '' }}>Zig-Zag</option>
                </x-portal::form.select>
            </section>

            <x-portal::form.select
                name="background"
                label="Background Color"
                description=""
                description-trailing=""
            >
                <option value="normal" {{ $data->background == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="darkest" {{ $data->background == 'darkest' ? 'selected' : '' }}>Darkest</option>
            </x-portal::form.select>

            <div class="flex gap-4 w-full">
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- EN -->
                    <img src="{{ asset('assets/frontend/icons/flag_en.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Title" placeholder="Title" name="title_en" :value="$data->title_en" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_en"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_en" height="150">{!! $data->content_en !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
                <div class="max-lg:hidden">
                    <x-portal::separator orientation="vertical" />
                </div>
                <div class="flex flex-col gap-4 w-full lg:max-w-[48%]">
                    <!-- ID -->
                    <img src="{{ asset('assets/frontend/icons/flag_id.svg') }}" alt="" class="w-5">
                    <x-portal::form.input label="Title" placeholder="Title" name="title_id" :value="$data->title_id" type="text" />
                    <x-portal::form.group
                        label="Content"
                        name="content_id"
                        description=""
                        description-trailing=""
                    >
                        <x-editor.quill name="content_id" height="150">{!! $data->content_id !!}</x-editor.quill>
                    </x-portal::form.group>
                </div>
            </div>


            <!-- Show on type File Information -->
            <div class="flex flex-col gap-4" id="file_information_section">
                <x-portal::heading size="lg" class="!font-bold">File Information</x-portal::heading>
                <x-portal::form.input label="File Title" placeholder="File Title" name="file_information_title" :value="@$data->file_information['title']" type="text" />
                <x-portal::form.group
                    label="File"
                    name="file_information_file"
                    description=""
                    description-trailing=""
                >
                    <x-portal::file-upload
                        icon="file-type-pdf"
                        maxsize="5"
                        name="file_information_file"
                        class="w-full"
                        accept="application/pdf" description="Only PDF file are accepted"
                    />
                </x-portal::form.group>
                @if (@$data->file_information['path'])
                    <p class="text-[0.8rem] text-muted-foreground">
                        Preview existing file: <a href="{{ previewFile(@$data->file_information['path']) }}" class="text-blue-500" target="_blank">Click Here</a>
                    </p>
                @endif
            </div>

            <!-- Show on type Grid -->
            <div class="flex flex-col gap-4" id="contents">
                <div class="flex items-center gap-4">
                    <x-portal::heading size="lg" class="!font-bold">Contents</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addContent()"></i>
                </div>
                <div class="flex flex-col gap-4" id="contents-container">
                    @if(isset($data) && !empty($data->content_json_en) && $data->type->value == 'grid')
                        @foreach($data->content_json_en as $index => $content)
                            <div class="p-4 border rounded-lg relative flex flex-col gap-4">
                                @include('admin.pages.sustainability-contents.components.content-edit', [
                                    'file' => @$content['icon'],
                                    'title_en' => @$content['title'],
                                    'description_en' => @$content['description'],
                                    'title_id' => @$data->content_json_id[$index]['title'],
                                    'description_id' => @$data->content_json_id[$index]['description'],
                                    'rand' => $index
                                ])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Show on type Swiper -->
            <div class="flex flex-col gap-4" id="swiper_items">
                <div class="flex items-center gap-4">
                    <x-portal::heading size="lg" class="!font-bold">Contents</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addItemSwiper()"></i>
                </div>
                <div class="flex flex-col gap-4" id="item-swiper-container">
                    @if(isset($data) && !empty($data->content_json_en) && $data->type->value == 'swiper')
                        @foreach($data->content_json_en as $index => $content)
                            <div class="p-4 border rounded-lg relative flex flex-col gap-4">
                                @include('admin.pages.sustainability-contents.components.item-swiper-edit', [
                                    'file' => @$content['icon'],
                                    'number' => @$content['number'],
                                    'title_en' => @$content['title'],
                                    'description_en' => @$content['description'],
                                    'title_id' => @$data->content_json_id[$index]['title'],
                                    'description_id' => @$data->content_json_id[$index]['description'],
                                    'rand' => $index
                                ])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Show on type List Information -->
            <div class="flex flex-col gap-4" id="list_section">
                <div class="flex items-center gap-4">
                    <x-portal::heading size="lg" class="!font-bold">Contents</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addList()"></i>
                </div>
                <div class="flex flex-col gap-4" id="list-container">
                    @if(isset($data) && !empty($data->content_json_en) && $data->type->value == 'list_information')
                        @foreach($data->content_json_en as $index => $content)
                            <div class="p-4 border rounded-lg relative flex flex-col gap-4">
                                @include('admin.pages.sustainability-contents.components.list-edit', [
                                    'title_en' => @$content['title'],
                                    'title_id' => @$data->content_json_id[$index]['title'],
                                    'description_en' => @$content['description'],
                                    'description_id' => @$data->content_json_id[$index]['description']
                                ])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-4" id="simple_section">
                <div class="flex items-center gap-4">
                    <x-portal::heading size="lg" class="!font-bold">Contents</x-portal::heading>
                    <i class="isax icon-add-circle cursor-pointer" onclick="addSimple()"></i>
                </div>
                <div class="flex flex-col gap-4" id="simple-container">
                    @if(isset($data) && !empty($data->content_json_en) && $data->type->value == 'simple_text_information')
                        @foreach($data->content_json_en as $index => $content)
                            <div class="p-4 border rounded-lg relative flex flex-col gap-4">
                                @include('admin.pages.sustainability-contents.components.simple-list-edit', [
                                    'title_en' => @$content['title'],
                                    'title_id' => @$data->content_json_id[$index]['title'],
                                    'description_en' => @$content['description'],
                                    'description_id' => @$data->content_json_id[$index]['description']
                                ])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        function removeContent(button) {
            button.parentElement.remove()
        }

        function getRandomInRange(min, max) {
            return Math.random() * (max - min) + min
        }

        function addContent() {
            let container = document.getElementById('contents-container')

            fetch("{{ route('admin.sustainability-contents.element', ['category' => $category, 'type' => 'content']) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`)
                }
                return res.json()
            })
            .then(data => {
                if (data.view) {
                    let branchElement = document.createElement('div')
                    branchElement.classList.add('p-4', 'border', 'rounded-lg', 'relative', 'flex', 'flex-col', 'gap-4')
                    branchElement.innerHTML = data.view
                    container.appendChild(branchElement)


                    setTimeout(() => {
                        setupQuill(`quill_editor_content_json_description_en_${data.rand}`)
                        setupQuill(`quill_editor_content_json_description_id_${data.rand}`)
                    }, 100)
                }
            })
            .catch(error => {
                console.error("Fetch error:", error)
            })
        }

        function addItemSwiper() {
            let container = document.getElementById('item-swiper-container')

            fetch("{{ route('admin.sustainability-contents.element', ['category' => $category, 'type' => 'swiper']) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`)
                }
                return res.json()
            })
            .then(data => {
                if (data.view) {
                    let branchElement = document.createElement('div')
                    branchElement.classList.add('p-4', 'border', 'rounded-lg', 'relative', 'flex', 'flex-col', 'gap-4')
                    branchElement.innerHTML = data.view
                    container.appendChild(branchElement)

                    setTimeout(() => {
                        setupQuill(`quill_editor_content_json_swiper_description_en_${data.rand}`)
                        setupQuill(`quill_editor_content_json_swiper_description_id_${data.rand}`)
                    }, 100)
                }
            })
            .catch(error => {
                console.error("Fetch error:", error)
            })
        }

        function addList() {
            let container = document.getElementById('list-container')

            fetch("{{ route('admin.sustainability-contents.element', ['category' => $category, 'type' => 'list']) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`)
                }
                return res.json()
            })
            .then(data => {
                if (data.view) {
                    let branchElement = document.createElement('div')
                    branchElement.classList.add('p-4', 'border', 'rounded-lg', 'relative', 'flex', 'flex-col', 'gap-4')
                    branchElement.innerHTML = data.view
                    container.appendChild(branchElement)

                    setTimeout(() => {
                        setupQuill(`quill_editor_content_json_list_description_en_${data.rand}`)
                        setupQuill(`quill_editor_content_json_list_description_id_${data.rand}`)
                    }, 100);
                }
            })
            .catch(error => {
                console.error("Fetch error:", error)
            })
        }

        function addSimple() {
            let container = document.getElementById('simple-container')

            fetch("{{ route('admin.sustainability-contents.element', ['category' => $category, 'type' => 'simple']) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`)
                }
                return res.json()
            })
            .then(data => {
                if (data.view) {
                    let branchElement = document.createElement('div')
                    branchElement.classList.add('p-4', 'border', 'rounded-lg', 'relative', 'flex', 'flex-col', 'gap-4')
                    branchElement.innerHTML = data.view
                    container.appendChild(branchElement)
                }
            })
            .catch(error => {
                console.error("Fetch error:", error)
            })
        }

        function setupQuill(id) {
            let editorElement = document.getElementById(id);
            if (!editorElement) {
                console.error(`Editor ${id} tidak ditemukan.`);
                return;
            } else {
                let quill = new Quill(`#${id}`, {
                    modules: {
                        toolbar: [
                            [{ header: [1, 2, 3, 4, 5, 6, false] }],
                            ["bold", "italic", "underline", "strike"],
                            ["blockquote"],
                            [{ list: "ordered" }, { list: "bullet" }],
                            [{ indent: "-1" }, { indent: "+1" }],
                            [{ direction: "rtl" }],
                            [{ color: [] }, { background: [] }],
                            [{ align: [] }],
                            ["clean"]
                        ]
                    },
                    placeholder: 'Content',
                    theme: "snow"
                })

                quill.on("text-change", function () {
                    let content = quill.root.innerHTML

                    const hiddenInput = document.querySelector(`textarea[id="${id}_value"]`);

                    if (hiddenInput) {
                        hiddenInput.value = content;
                    }
                })
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.querySelector('[name="type"]')
            const gridTypeSelect = document.querySelector('[name="grid_type"]')

            function toggleFields() {
                const type = typeSelect.value
                const gridType = gridTypeSelect?.value

                document.getElementById('grid_type_section').style.display = type === 'grid' ? 'block' : 'none'
                document.getElementById('align_section').style.display = type === 'content' ? 'block' : 'none'
                document.getElementById('simple_section').style.display = type === 'simple_text_information' ? 'block' : 'none'
                document.getElementById('list_section').style.display = type === 'list_information' ? 'block' : 'none'
                document.getElementById('grid_direction_section').style.display = (type === 'grid' || type === 'file_information') ? 'block' : 'none'
                document.getElementById('grid_pattern_section').style.display = (type === 'grid' && gridType === 'box_icon_card') ? 'block' : 'none'
                document.getElementById('file_information_section').style.display = type === 'file_information' ? 'block' : 'none'
                document.getElementById('contents').style.display = type === 'grid' ? 'block' : 'none'
                document.getElementById('swiper_items').style.display = type === 'swiper' ? 'block' : 'none'
            }

            typeSelect.addEventListener('change', toggleFields)
            gridTypeSelect?.addEventListener('change', toggleFields)

            toggleFields()
        })

    </script>
@endpush
