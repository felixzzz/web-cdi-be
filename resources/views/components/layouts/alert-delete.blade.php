<section id="dialog-form-delete-popup">
    <x-portal::alert-dialog id="dialog-form-delete-popup">
        <x-portal::alert-dialog.content action="" method="POST">
            @csrf
            @method("DELETE")
            <x-portal::alert-dialog.title>
                Confirm Delete
            </x-portal::alert-dialog.title>
            <x-portal::alert-dialog.description>
                Are you sure you want to delete this data? This action cannot be undone.
            </x-portal::alert-dialog.description>
            <x-portal::alert-dialog.action>
                <x-portal::alert-dialog.cancel>Cancel</x-portal::alert-dialog.cancel>
                <x-portal::alert-dialog.confirm>Continue</x-portal::alert-dialog.confirm>
            </x-portal::alert-dialog.action>
        </x-portal::alert-dialog.content>
    </x-portal::alert-dialog>
</section>
