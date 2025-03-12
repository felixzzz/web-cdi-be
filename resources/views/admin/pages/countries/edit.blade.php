@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.countries.update', $data->ulid) }}" class="flex flex-col gap-4">
            @csrf
            @method("PUT")

            <x-portal::form.input label="Name" placeholder="Name" name="name" :value="$data->name" type="text" required />
            <x-portal::form.input label="Code" placeholder="Code" name="code" :value="$data->code" type="text" required />

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Submit</x-portal::button>
            </div>
        </form>
    </div>
@endsection
