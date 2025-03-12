@extends('admin.layouts.main')

@section('content')
    <x-portal::card class="w-[500px] space-y-6">
        <label class="text-xs font-medium">Datetime</label>
        <p>{{ $data->created_at }}</p>

        <label class="text-xs font-medium">First Name</label>
        <p>{{ $data->first_name }}</p>

        <label class="text-xs font-medium">Last Name</label>
        <p>{{ $data->last_name }}</p>

        <label class="text-xs font-medium">Email</label>
        <p>{{ $data->email }}</p>

        <label class="text-xs font-medium">Topic</label>
        <p>{{ $data->topic?->name_en }}</p>

        <label class="text-xs font-medium">Country</label>
        <p>{{ $data->country?->name }}</p>

        <label class="text-xs font-medium">Message</label>
        <p>{{ $data->message }}</p>
    </x-portal::card>
@endsection
