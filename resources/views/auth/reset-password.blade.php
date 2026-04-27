<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" style="display:block;margin-top:0.25rem;width:100%;" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" style="margin-top:0.5rem;" />
        </div>

        <!-- Password -->
        <div style="margin-top:1rem;">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" style="display:block;margin-top:0.25rem;width:100%;" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" style="margin-top:0.5rem;" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-top:1rem;">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" style="display:block;margin-top:0.25rem;width:100%;"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" style="margin-top:0.5rem;" />
        </div>

        <div class="form-actions-end">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
