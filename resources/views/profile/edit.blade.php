<x-app-layout>
    <x-slot name="header">
        <h2 class="text-base font-medium text-gray-900">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div class="py-10 px-4">
        <div class="max-w-2xl mx-auto space-y-4">

            <div class="bg-white border border-stone-200 rounded-2xl p-7">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl p-7">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl p-7">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>