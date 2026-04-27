<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Naam -->
        <div>
            <x-input-label for="naam" :value="__('Naam')" />
            <x-text-input id="naam" style="display:block;margin-top:0.25rem;width:100%;" type="text" name="naam" :value="old('naam')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('naam')" style="margin-top:0.5rem;" />
        </div>

        <!-- Email Address -->
        <div style="margin-top:1rem;">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" style="display:block;margin-top:0.25rem;width:100%;" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" style="margin-top:0.5rem;" />
        </div>

        <!-- Password -->
        <div style="margin-top:1rem;">
            <x-input-label for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password" style="display:block;margin-top:0.25rem;width:100%;"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" style="margin-top:0.5rem;" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-top:1rem;">
            <x-input-label for="password_confirmation" :value="__('Bevestig wachtwoord')" />

            <x-text-input id="password_confirmation" style="display:block;margin-top:0.25rem;width:100%;"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" style="margin-top:0.5rem;" />
        </div>

        <div class="form-actions-end">
            <a class="auth-link" href="{{ route('login') }}">
                {{ __('Al geregistreerd?') }}
            </a>

            <x-primary-button style="margin-inline-start:1rem;">
                {{ __('Registreren') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
