<div {{ $attributes->merge(['class' => 'w-full gap-2 mb-3 flex justify-between']) }} >
    <div class=" ">
        <form action="">
            <x-portal::input type="text" placeholder="Search..." name="search" value="{{ request('search') }}" icon-right="search" />
        </form>
    </div>

    <div x-data="{ alertDialog: '' }" class="flex gap-2 items-center">
        {{ $slot }}

        @if (@$showAdd)
            <x-portal::button href="{{ $routeAdd ?? 'javascript:;' }}"
                x-on:click="alertDialog='dialog-form-add-popup'"
            >
                <x-tabler-plus class="icon" />
                Add Data
            </x-portal::button>
        @endif

        @if(isset($popupForm) && $popupForm)
            <x-portal::alert-dialog id="dialog-form-add-popup">
                <x-portal::alert-dialog.content :action="@$formAction" :method="@$formMethod">
                    {{ $formContent ?? '' }}
                </x-portal::alert-dialog.content>
            </x-portal::alert-dialog>
        @endif
    </div>

</div>
