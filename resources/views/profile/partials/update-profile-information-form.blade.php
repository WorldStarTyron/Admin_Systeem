<section>
    <header>
        <h2 class="section-title">
            {{ __('Profile Information') }}
        </h2>

        <p class="section-description">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="form-spaced" style="margin-top:1.5rem;">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" style="margin-top:0.25rem;display:block;width:100%;" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error style="margin-top:0.5rem;" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" style="margin-top:0.25rem;display:block;width:100%;" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error style="margin-top:0.5rem;" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="verification-text">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="auth-link">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="verification-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-actions">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="saved-message"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
