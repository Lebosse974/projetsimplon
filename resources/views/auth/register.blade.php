<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('homepage') }}">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nom')" />

                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- pseudo -->
            <div>
                <x-input-label for="pseudo" :value="__('pseudo')" />

                <x-text-input id="pseudo" class="block w-full mt-1" type="text" name="pseudo" :value="old('pseudo')" required autofocus />
            </div>


            <!-- avatar -->
            <div>
                <x-input-label for="avatar" :value="__('avatar')" />

               <input type="file" name="avatar" accept="image/*" autofocus>
            </div>

            

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('mot de passe')" />

                <x-text-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer mot de passe')" />

                <x-text-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà enregistrer ?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __("S'inscrire") }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
