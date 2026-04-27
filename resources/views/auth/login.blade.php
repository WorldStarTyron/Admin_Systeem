<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" style="display:block;margin-top:0.25rem;width:100%;" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" style="margin-top:0.5rem;" />
        </div>

        <!-- Password -->
        <div style="margin-top:1rem;">
            <x-input-label for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password" style="display:block;margin-top:0.25rem;width:100%;"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" style="margin-top:0.5rem;" />
        </div>

        <!-- Remember Me -->
        <div style="display:block;margin-top:1rem;">
            <label for="remember_me" style="display:inline-flex;align-items:center;">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span style="margin-inline-start:0.5rem;font-size:0.875rem;color:#4b5563;">{{ __('Onthoud mij') }}</span>
            </label>
        </div>

        <div class="form-actions-end">
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
            @endif

            <x-primary-button style="margin-inline-start:0.75rem;">
                {{ __('Inloggen') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
