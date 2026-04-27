<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="page-content">
        <div class="page-container">
            <div class="content-card">
                <div class="content-card-inner">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="content-card">
                <div class="content-card-inner">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="content-card">
                <div class="content-card-inner">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
