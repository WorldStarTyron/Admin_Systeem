<x-guest-layout>
    <div class="info-text">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" style="display:block;margin-top:0.25rem;width:100%;" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" style="margin-top:0.5rem;" />
        </div>

        <div class="form-actions-end">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
