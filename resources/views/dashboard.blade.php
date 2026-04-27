<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="page-content">
        <div class="page-container">
            <div class="dashboard-card">
                <div class="dashboard-card-content">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
