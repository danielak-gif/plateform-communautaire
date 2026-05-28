<section>
    <header class="mb-6">
        <h2 class="text-base font-medium text-gray-900">
            {{ __('Informations du profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __("Mettez à jour les informations de votre compte et votre adresse email.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nom')" class="text-sm text-gray-600 mb-1" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl border-stone-200 text-sm focus:border-stone-400 focus:ring-0" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-600 mb-1" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-xl border-stone-200 text-sm focus:border-stone-400 focus:ring-0" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        {{ __('Votre adresse email n\'est pas vérifiée.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none">
                            {{ __('Cliquez ici pour renvoyer l\'email de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-1">
            <button type="submit" class="px-5 py-2 bg-stone-900 text-white text-sm rounded-xl hover:bg-stone-700 transition duration-150">
                {{ __('Enregistrer') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-400"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>