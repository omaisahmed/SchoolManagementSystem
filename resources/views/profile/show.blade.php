<x-app-layout>
      <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

            @include('partials.navigation')

            <div class="page-content-wrapper ">

            <div class="container-fluid">
                <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <!-- Main Container with Sidebar Offset -->
        <div class="max-w-7xl mx-auto pl-64 pr-4 sm:px-6 lg:px-8">
            <!-- Update Profile Information -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-white shadow sm:rounded-lg p-6">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-jet-section-border />
            @endif

            <!-- Update Password -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0 bg-white shadow sm:rounded-lg p-6">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            <!-- Two-Factor Authentication -->
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0 bg-white shadow sm:rounded-lg p-6">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <!-- Logout Other Browser Sessions -->
            <div class="mt-10 sm:mt-0 bg-white shadow sm:rounded-lg p-6">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <!-- Delete Account -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0 bg-white shadow sm:rounded-lg p-6">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
    
            </div>
        </div>
    </div>
</div>
</x-app-layout>
