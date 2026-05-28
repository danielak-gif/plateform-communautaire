<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-base font-medium text-gray-900">
            {{ __('Supprimer le compte') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __('Une fois votre compte supprimé, toutes ses données seront définitivement effacées. Téléchargez d\'abord toute information que vous souhaitez conserver.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-5 py-2 bg-red-50 text-red-600 border border-red-200 text-sm rounded-xl hover:bg-red-100 transition duration-150"
    >{{ __('Supprimer le compte') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-7">
            @csrf
            @method('delete')

            <h2 class="text-base font-medium text-gray-900 mb-1">
                {{ __('Confirmer la suppression du compte') }}
            </h2>
            <p class="text-sm text-gray-400 mb-6">
                {{ __('Cette action est irréversible. Entrez votre mot de passe pour confirmer la suppression définitive de votre compte.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="text-sm text-gray-600 mb-1" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-xl border-stone-200 text-sm focus:border-stone-400 focus:ring-0"
                    placeholder="{{ __('Votre mot de passe') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-2 text-sm text-gray-600 border border-stone-200 rounded-xl hover:bg-stone-50 transition duration-150"
                >{{ __('Annuler') }}</button>

                <button
                    type="submit"
                    class="px-5 py-2 bg-red-600 text-white text-sm rounded-xl hover:bg-red-700 transition duration-150"
                >{{ __('Supprimer définitivement') }}</button>
            </div>
        </form>
    </x-modal>
</section>