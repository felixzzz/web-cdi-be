@extends('admin.layouts.main')

@section('content')
    <div class="w-[500px] space-y-6">
        <x-session.alert />

        <form method="POST" action="{{ route('admin.roles.store') }}">
            @csrf

            <x-portal::form.input label="Name" placeholder="Name" name="name" :value="old('name')" type="text" required />


            <div class="my-3">
                <x-portal::radio.group
                    label="Superadmin?"
                    class="flex-row"
                >
                    <x-portal::radio
                        id="yes"
                        value="1"
                        name="is_superadmin"
                        label="Yes"
                        onchange="togglePermissions(this.value)"
                        required
                        :checked="old('is_superadmin', 0) == 1"
                    />
                    <x-portal::radio
                        id="no"
                        value="0"
                        name="is_superadmin"
                        label="No"
                        onchange="togglePermissions(this.value)"
                        required
                        :checked="old('is_superadmin', 0) == 0"
                    />
                </x-portal::radio.group>
            </div>

            <!-- Permissions Checklist -->
            <div id="permissions-section" class="space-y-2">
                <label class="block text-sm font-medium text-foreground">Permissions</label>
                <div class="flex space-x-2 mb-2">
                    <button type="button" onclick="selectAllPermissions()" class="px-2 py-1 bg-primary text-white rounded-md text-sm">Select All</button>
                    <button type="button" onclick="unselectAllPermissions()" class="px-2 py-1 bg-gray-500 text-white rounded-md text-sm">Unselect All</button>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($permissionsList as $groupName => $group)
                        <div class="space-y-2">
                            <h3 class="text-md font-semibold text-foreground">{{ $groupName }}</h3>
                            @foreach ($group as $permission)
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission }}"
                                        id="{{ Str::slug($permission) }}"
                                        class="h-4 w-4 text-primary focus:ring-ring permission-checkbox"
                                    >
                                    <label for="{{ Str::slug($permission) }}" class="ml-2 text-sm text-foreground">
                                        {{ $permission }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-portal::button type="submit" class="w-full">Create Role</x-portal::button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        function togglePermissions(value) {
            const permsSection = document.getElementById('permissions-section');
            permsSection.style.display = value === '1' ? 'none' : 'block';
        }

        function selectAllPermissions() {
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = true;
            });
        }

        function unselectAllPermissions() {
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        // Initial state based on selected radio
        document.addEventListener('DOMContentLoaded', () => {
            const selectedValue = document.querySelector('input[name="is_superadmin"]:checked').value;
            togglePermissions(selectedValue);
        });
    </script>
@endpush
