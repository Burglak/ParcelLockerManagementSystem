<x-guest-layout>
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center py-4 px-4 sm:px-6 lg:px-8">
        <img src="/images/package.png" class="img-fluid" alt="parcel locker" width="200" height="200">
            
        <form method="POST" action="{{ route('register') }}" class="mt-8">
            @csrf

            <!-- Imię -->
            <div>
                <x-input-label for="name" :value="__('Imię')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Nazwisko -->
            <div class="mt-4">
                <x-input-label for="surname" :value="__('Nazwisko')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autocomplete="surname" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Adres email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Adres email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Hasło -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Hasło')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Potwierdź hasło -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Potwierdź hasło')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Adres -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Adres')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Numer telefonu -->
            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Numer telefonu')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" pattern="[0-9]{9}" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Masz już konto?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Zarejestruj') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
