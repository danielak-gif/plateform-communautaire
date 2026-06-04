<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-stone-900">Projet 8</h1>
                <p class="mt-1 text-sm text-stone-500">Page de présentation du projet et des membres</p>
            </div>
        </div>
    </x-slot>

    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        <section class="space-y-6">
            <div class="rounded-3xl border border-stone-200 bg-white p-6 shadow-sm">
                <div class="grid gap-6 lg:grid-cols-[1.4fr_1fr] lg:items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-stone-900">Présentation du projet</h2>
                        <p class="mt-3 text-sm leading-7 text-stone-600">Voici la page dédiée au projet 8</p>
                        <div class="mt-6 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl bg-stone-50 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-stone-400">Professeur</p>
                                <p class="mt-2 text-lg font-semibold text-stone-900">M. Dr Matine OUSMANE</p>
                            </div>
                            <div class="rounded-2xl bg-stone-50 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-stone-400">Projet</p>
                                <div class="mt-2 flex flex-col gap-2">
                                    <a href="https://plateform-communautaire-production.up.railway.app/" target="_blank" rel="noreferrer" class="inline-flex items-center text-sm font-semibold text-emerald-700 hover:text-emerald-900">Visiter le projet</a>
                                    <a href="https://github.com/ton-organisation/plateforme-communautaire" target="_blank" rel="noreferrer" class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900">Voir le dépôt GitHub</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-3xl bg-emerald-50 p-6 text-stone-900 shadow-sm">
                        <h3 class="text-xl font-semibold">Résumé rapide</h3>
                        <p class="mt-3 text-sm leading-7 text-stone-700">Ce projet rassemble 11 membres autour d’une application web complète. Chaque membre dispose d’un lien personnel vers son site créé.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-stone-200 bg-white p-6 shadow-sm">
                <h3 class="text-2xl font-semibold text-stone-900">Documents du projet</h3>
                <p class="mt-2 text-sm text-stone-600">Consultez les livrables structurants avant de découvrir les membres du groupe.</p>
                <div class="mt-4 grid gap-4 sm:grid-cols-3">
                    <a href="#" target="_blank" rel="noreferrer" class="rounded-2xl border border-stone-200 bg-stone-50 px-4 py-4 text-sm font-semibold text-stone-900 hover:border-stone-300 hover:bg-stone-100">
                        Diagramme de cas d'utilisation
                    </a>
                    <a href="#" target="_blank" rel="noreferrer" class="rounded-2xl border border-stone-200 bg-stone-50 px-4 py-4 text-sm font-semibold text-stone-900 hover:border-stone-300 hover:bg-stone-100">
                        Dictionnaire des données
                    </a>
                    <a href="#" target="_blank" rel="noreferrer" class="rounded-2xl border border-stone-200 bg-stone-50 px-4 py-4 text-sm font-semibold text-stone-900 hover:border-stone-300 hover:bg-stone-100">
                        Diagramme de classes
                    </a>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-[1fr_1fr]">
                <div class="rounded-3xl border border-stone-200 bg-white p-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-stone-900">Chefs de groupe</h3>
                    <div class="mt-5 space-y-4">
                        <div class="rounded-2xl bg-stone-50 p-4 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">AKONDE Daniel</p>
                                <p class="text-xs text-stone-500">Chef de groupe</p>
                            </div>
                            <div class="mt-3 flex gap-3 sm:mt-0">
                                <a href="http://danielsitemagasin.infinityfreeapp.com/testproject/?i=1" target="_blank" rel="noreferrer" class="inline-flex items-center rounded-full bg-stone-900 px-4 py-2 text-sm font-medium text-white hover:bg-stone-800">Voir son site</a>
                                <a href="https://github.com/akonde-daniel" target="_blank" rel="noreferrer" class="inline-flex items-center rounded-full border border-stone-300 bg-white px-4 py-2 text-sm font-medium text-stone-900 hover:bg-stone-100">GitHub</a>
                            </div>
                        </div>
                        <div class="rounded-2xl bg-stone-50 p-4 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Yanees DOCHAMOU</p>
                                <p class="text-xs text-stone-500">Chef de groupe</p>
                            </div>
                            <div class="mt-3 flex gap-3 sm:mt-0">
                                <a href="https://yaneesken.infinityfree.me/connexion.php" target="_blank" rel="noreferrer" class="inline-flex items-center rounded-full bg-stone-900 px-4 py-2 text-sm font-medium text-white hover:bg-stone-800">Voir son site</a>
                                <a href="https://github.com/yanees-dochamou" target="_blank" rel="noreferrer" class="inline-flex items-center rounded-full border border-stone-300 bg-white px-4 py-2 text-sm font-medium text-stone-900 hover:bg-stone-100">GitHub</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-stone-200 bg-white p-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-stone-900">Membres du projet</h3>
                    <div class="mt-5 space-y-4">
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Joanel ANATO</p>
                            </div>
                            <a href="https://eneam-gestion.kesug.com/enea/connexion.php?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/joanel-anato" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Purgis AMOUSSOU</p>
                            </div>
                            <a href="https://amoussoustore.infinityfree.me/?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/purgis-amoussou" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">AKOUEHOU Carmelle</p>
                            </div>
                            <a href="https://academiqueprojet.infinityfreeapp.com/?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/akoueho-carmelle" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Oscar BATAKOU</p>
                            </div>
                            <a href="https://oscarbatakou.infinityfree.me/login.php?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/oscar-batakou" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Durrell HEDIPLE</p>
                            </div>
                            <a href="https://durelle.infinityfree.me/plateforme/connexion.php?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/durrell-hediple" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Flora OGOUDARE</p>
                            </div>
                            <a href="https://glory-boutique-flora.infinityfree.me/index.php?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/flora-ogoudare" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Judicaël TINKOU</p>
                            </div>
                            <a href="https://jude-code.infinityfreeapp.com/index.php?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/judicael-tinkou" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Angela TOMAGNIMENA</p>
                            </div>
                            <a href="https://murielle.infinityfreeapp.com/?i=1" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/angela-tomagnimena" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-center rounded-2xl bg-stone-50 p-4">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Ébénezer ZINSOU</p>
                            </div>
                            <a href="https://eben.lovestoblog.com/index.php" target="_blank" rel="noreferrer" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Site</a>
                            <a href="https://github.com/ebenezer-zinsou" target="_blank" rel="noreferrer" class="text-sm font-semibold text-slate-600 hover:text-slate-900">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
