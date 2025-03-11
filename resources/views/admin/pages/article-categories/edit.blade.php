@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.article-categories.update', $data->ulid) }}" class="flex flex-col gap-4">
            @csrf
            @method("PUT")

            <x-portal::form.select
                name="is_sustainability"
                label="Is Sustainability"
                description=""
                description-trailing=""
            >
                <option value="Select" selected disabled>
                    Select
                </option>
                <option value="0" {{ $data->is_sustainability == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ $data->is_sustainability == 1 ? 'selected' : '' }}>Yes</option>
            </x-portal::form.select>
            <x-portal::form.input label="Name EN" placeholder="Name EN" name="name_en" :value="$data->name_en" type="text" required />
            <x-portal::form.input label="Name ID" placeholder="Name ID" name="name_id" :value="$data->name_id" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
