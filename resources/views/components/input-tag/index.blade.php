@props([
    'name' => 'tags',
    'tags' => [],
])

<div x-data="tagInput({{ json_encode($tags) }})" class="relative w-full group-input border border-input rounded-md flex flex-wrap gap-2 px-3 py-2 text-sm min-h-10">
    <template x-for="(tag, index) in tags" :key="index">
        <span class="bg-primary text-white px-2 py-1 rounded-md flex items-center">
            <span x-text="tag"></span>
            <button type="button" class="ml-2 text-white" @click="removeTag(index)">×</button>
        </span>
    </template>

    <input
        type="text"
        x-model="newTag"
        placeholder="Add tag..."
        @keydown.enter.prevent="addTag"
        @keydown.space.prevent="addTag"
        @keydown.backspace="removeLastTag"
        {{ $attributes->class([
            'w-full bg-transparent text-sm transition-colors placeholder:text-muted-foreground text-primary',
            'border-none outline-none flex-1 px-1'
        ]) }}
    />

    <input type="hidden" name="{{ $name }}" x-model="tags" />
</div>

<script>
function tagInput(initialTags = []) {
    return {
        tags: initialTags,
        newTag: '',
        addTag() {
            let tag = this.newTag.trim();
            if (tag && !this.tags.includes(tag)) {
                this.tags.push(tag);
            }
            this.newTag = '';
        },
        removeTag(index) {
            this.tags.splice(index, 1);
        },
        removeLastTag() {
            if (!this.newTag && this.tags.length > 0) {
                this.tags.pop();
            }
        }
    };
}
</script>
