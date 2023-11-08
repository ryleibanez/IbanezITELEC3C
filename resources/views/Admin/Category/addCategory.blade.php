<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('addCategory.post') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Category Name') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="category"  required autofocus autocomplete="category" />
            </div>

           
           

            <div class="flex items-center justify-end mt-4">
              

                <x-button class="ms-4">
                    {{ __('Add Category') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
