@props(['name', 'description' => null, 'maxsize' => 0])

<div x-data="{
    files: [],
    maxFileSize: Number('{{ $maxsize }}'),

    addFiles(newFiles) {
        let dataTransfer = new DataTransfer();

        Array.from(newFiles).forEach(file => {
            if (this.files.some(f => f.file.name === file.name && f.file.size === file.size)) {
                return; // Cegah duplikasi
            }
            if (this.maxFileSize > 0 && file.size / 1000000 > this.maxFileSize) {
                alert(`File size cannot be more than ${this.maxFileSize}MB`);
                return;
            }
            if (!file.type.includes('image/')) {
                alert('File is not a valid image file');
                return;
            }
            this.files.push({ file, url: URL.createObjectURL(file) });
        });

        // Update input file utama dengan semua file yang dipilih
        this.updateFileInput();
    },

    handleFileInput(event) {
        this.addFiles(event.target.files);
        event.target.value = ''; // Reset input untuk memungkinkan upload ulang file yang sama
    },

    handleDrop(event) {
        event.preventDefault();
        this.addFiles(event.dataTransfer.files);
    },

    removeFile(index) {
        URL.revokeObjectURL(this.files[index].url);
        this.files.splice(index, 1);
        this.updateFileInput();
    },

    updateFileInput() {
        let dataTransfer = new DataTransfer();
        this.files.forEach(f => dataTransfer.items.add(f.file));
        this.$refs.fileInput.files = dataTransfer.files;
    }
}">
    <!-- Area Drag & Drop -->
    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center gap-2 cursor-pointer w-full"
        x-on:dragover.prevent="$el.classList.add('border-blue-500')"
        x-on:dragleave.prevent="$el.classList.remove('border-blue-500')"
        x-on:drop.prevent="handleDrop($event)"
        x-on:click="$refs.fileInput.click()">
        <x-tabler-photo class="h-8 w-8 text-gray-500" />
        <span class="text-gray-500 text-sm">
            Drag and drop files here or click to browse
        </span>
        <input type="file" x-ref="fileInput" name="{{ $name }}[]" accept="image/*" multiple
            class="hidden" x-on:change="handleFileInput">
    </div>

    <!-- Preview Gambar -->
    <div class="grid grid-cols-3 gap-4 mt-4">
        <template x-for="(file, index) in files" :key="file.file.name + file.file.size">
            <div class="relative">
                <img :src="file.url" class="w-full h-24 object-cover rounded-md">
                <button type="button" x-on:click="removeFile(index)"
                    class="absolute top-2 right-2 bg-[#D3312C] text-white rounded-full w-[24px] h-[24px] flex items-center justify-center">
                    @svg('tabler-trash', ['class' => 'icon w-[18px]'])
                </button>
            </div>
        </template>
    </div>
</div>
