<section>
    <header>
        <h2 class="section-title">
            {{ __('Update Password') }}
        </h2>

        <p class="section-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="form-spaced" style="margin-top:1.5rem;">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" style="margin-top:0.25rem;display:block;width:100%;" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" style="margin-top:0.5rem;" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" style="margin-top:0.25rem;display:block;width:100%;" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" style="margin-top:0.5rem;" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" style="margin-top:0.25rem;display:block;width:100%;" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" style="margin-top:0.5rem;" />
        </div>

        <div class="form-actions">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
