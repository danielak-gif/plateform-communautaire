<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-serif text-xl tracking-tight text-gray-900">
                Plateforme Communautaire
            </h2>
            <span class="text-sm text-gray-400">{{ auth()->user()->name }}</span>
        </div>
    </x-slot>

    <div class="min-h-screen py-10 px-4" style="background:#f5f3ef">
        <div class="max-w-4xl mx-auto">

            {{-- Bienvenue --}}
            <div class="flex items-start justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-2xl font-serif font-normal tracking-tight text-gray-900 mb-1">
                        Bonjour, {{ auth()->user()->name }}
                    </h1>
                    <p class="text-sm text-gray-400 leading-relaxed max-w-lg">
                        Gérez votre profil, consultez les annonces et explorez l'annuaire des membres de votre commune.
                    </p>
                </div>
                <span class="text-xs text-gray-400 bg-stone-200 px-3 py-1.5 rounded-full whitespace-nowrap shrink-0">
                    {{ now()->isoFormat('dddd D MMMM YYYY') }}
                </span>
            </div>

            {{-- Label section --}}
            <p class="text-xs font-medium tracking-widest text-gray-400 uppercase mb-4">Accès rapide</p>

            {{-- Grille --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2.5">

                {{-- Membres --}}
                <a href="{{ route('communaute.index') }}"
                   class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                            </svg>
                        </div>
                        <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900 mb-1">Membres</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Consultez les profils enregistrés</p>
                </a>

                {{-- Annonces --}}
                <a href="{{ route('annonces.index') }}"
                   class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46"/>
                            </svg>
                        </div>
                        <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900 mb-1">Annonces</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Dernières actualités de la commune</p>
                </a>

                {{-- Mon profil / Admin --}}
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.index') }}"
                       class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                            </div>
                            <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                        </div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Administration</h4>
                        <p class="text-xs text-gray-400 leading-relaxed">Gérez les profils et les annonces</p>
                    </a>
                @elseif($monProfil)
                    <a href="{{ route('communaute.show', $monProfil) }}"
                       class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                            <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                        </div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Mon profil</h4>
                        @if($monProfil->statut == 'en_attente')
                            <p class="text-xs text-amber-600 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block"></span>
                                En attente de validation
                            </p>
                        @elseif($monProfil->statut == 'approuve')
                            <p class="text-xs text-green-600 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
                                Profil approuvé
                            </p>
                        @elseif($monProfil->statut === 'rejete')
                            <p class="text-xs text-red-600 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>
                                Profil rejeté
                            </p>
                        @endif
                    </a>
                @else
                    <a href="{{ route('communaute.create') }}"
                       class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                            <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                        </div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Mon profil</h4>
                        <p class="text-xs text-gray-400 leading-relaxed">Cliquez pour soumettre votre profil</p>
                    </a>
                @endif

                {{-- Paramètres --}}
                <a href="{{ route('profile.edit') }}"
                   class="group bg-white border border-stone-200 rounded-2xl p-5 hover:border-stone-300 hover:bg-stone-50 transition duration-200 block">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-gray-500">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="text-stone-300 group-hover:text-stone-500 transition text-base">↗</span>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900 mb-1">Paramètres</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Configurez votre compte</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>