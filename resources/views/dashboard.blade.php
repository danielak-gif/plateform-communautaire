<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-[#4f9ef8]">
                📊 Dashboard
            </h2>

            <span class="text-sm text-gray-400">
                Bienvenue {{ auth()->user()->name }}
            </span>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#0f0f0f] py-10 px-4">

        <div class="max-w-7xl mx-auto">
            <!-- Carte bienvenue -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl shadow-lg p-8 mb-8">

                <h3 class="text-2xl font-bold text-white mb-3">
                    👋 Bonjour {{  auth()->user()->name }}
                </h3>

                <p class="text-gray-400 leading-relaxed">
                    Vous êtes connecté à la plateforme communautaire. Gérez votre profil, consultez les annonces et explorez l'annuaire des membres de votre commune.
                </p>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Carte -->
                <a href="{{ route('communaute.index') }}" class="bg-[#1a1a1a]  border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300">
                    <div class="text-4xl mb-3">👥</div>
                    <h4 class="text-white text-lg font-semibold mb-2">
                        Membres
                    </h4>

                    <p class="text-gray-400 text-sm">
                        Consultez les profils enregistrés
                    </p>
                </a>

                <!-- Carte -->
                <a href="{{ route('annonces.index') }}" class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300">
                    <div class="text-4xl mb-3">📢</div>
                    <h4 class="text-white text-lg font-semibold mb-2">
                        Annonces
                    </h4>

                    <p class="text-gray-400 text-sm">
                        Consultez les dernières actualités
                    </p>
                </a>

                <!-- Carte -->
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.index') }}" class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300 block">
                        <div class="text-4xl mb-3">🛡️</div>
                        <h4 class="text-white text-lg font-semibold mb-2">
                            Administration
                        </h4>
                        <p class="text-gray-400 text-sm">Gérez les profils et les annonces</p>
                    </a>
                @elseif($monProfil)
                    <a href="{{ route('communaute.show', $monProfil) }}"  class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300 block">
                        <div class="text-4xl mb-3">📂</div>
                        <h4 class="text-white text-lg font-semibold mb-2">
                            Mon profil
                        </h4>
                        @if($monProfil->statut == 'en_attente')
                            <p class="text-yellow-400 text-sm">
                                ⏳ En attente de validation 
                            </p>
                        @elseif($monProfil->statut == 'approuve')
                            <p class="text-green-400 text-sm">
                                ✅ Profil approuvé  
                            </p>
                        @elseif($monProfil->statut === 'rejete')
                            <p class="text-red-400 text-sm">
                                ❌ Profil rejeté  
                            </p> 
                        @endif
                    </a>
                @else 
                    <a href="{{ route('communaute.create') }}"  class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300 block">
                        <div class="text-4xl mb-3">📂</div>
                        <h4 class="text-white text-lg font-semibold mb-2">
                            Mon profil
                        </h4>
                        <p class="text-gray-400 text-sm">Cliquez pour soumettre votre profil</p>
                    </a>
                @endif

                <!-- Carte -->
                <a href="{{ route('profile.edit') }}" class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:-translate-y-1 transition duration-300">
                    <div class="text-4xl mb-3">⚙️</div>
                    <h4 class="text-white text-lg font-semibold mb-2">
                        Parametres
                    </h4>

                    <p class="text-gray-400 text-sm">
                        Configurez votre compte.
                    </p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
