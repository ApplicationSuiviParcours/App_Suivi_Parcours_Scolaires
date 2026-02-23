@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Mes Enfants') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="relative mb-8 overflow-hidden group rounded-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 animate-gradient-x"></div>
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute bg-white rounded-full w-96 h-96 -top-48 -right-48 blur-3xl animate-pulse-slow"></div>
                    <div class="absolute bg-yellow-300 rounded-full w-96 h-96 -bottom-48 -left-48 blur-3xl animate-pulse-slow animation-delay-2000"></div>
                </div>

                <!-- Particules flottantes -->
                <div class="absolute inset-0">
                    @for($i = 0; $i < 12; $i++)
                        <div class="absolute w-2 h-2 bg-white rounded-full animate-float-random" 
                             style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5) }}s; opacity: 0.6;"></div>
                    @endfor
                </div>

                <div class="relative p-8">
                    <div class="flex items-center justify-between">
                        <div class="transition-all duration-700 transform animate-slide-in-left">
                            <h3 class="text-3xl font-bold text-white drop-shadow-lg">Mes Enfants</h3>
                            <p class="flex items-center mt-2 text-blue-100">
                                <svg class="w-5 h-5 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                {{ $enfants->count() }} enfant(s) - Suivez leur scolarité
                            </p>
                        </div>
                        <div class="hidden transition-all duration-700 transform md:block animate-slide-in-right hover:rotate-12 hover:scale-110">
                            <div class="p-4 border rounded-full bg-white/20 backdrop-blur-sm border-white/30">
                                <svg class="w-16 h-16 text-white animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques globales -->
            @if($enfants->count() > 0)
                <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-4">
                    <div class="p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-lg rounded-2xl hover:shadow-2xl hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total enfants</p>
                                <p class="text-3xl font-bold text-blue-600 animate-count">{{ $enfants->count() }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-xl">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-lg rounded-2xl hover:shadow-2xl hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total notes</p>
                                <p class="text-3xl font-bold text-green-600 animate-count">{{ $statsGlobales['total_notes'] }}</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-xl">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-lg rounded-2xl hover:shadow-2xl hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total absences</p>
                                <p class="text-3xl font-bold text-red-600 animate-count">{{ $statsGlobales['total_absences'] }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-xl">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-lg rounded-2xl hover:shadow-2xl hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total bulletins</p>
                                <p class="text-3xl font-bold text-purple-600 animate-count">{{ $statsGlobales['total_bulletins'] }}</p>
                            </div>
                            <div class="p-3 bg-purple-100 rounded-xl">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grille des enfants -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($enfants as $index => $enfant)
                        <div class="overflow-hidden transition-all duration-500 transform bg-white border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl hover:-translate-y-2 animate-fade-in-up" style="animation-delay: {{ $index * 100 }}ms">
                            <!-- En-tête avec dégradé -->
                            <div class="relative h-28 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">
                                <div class="absolute inset-0 opacity-20">
                                    <div class="absolute w-40 h-40 bg-white rounded-full -top-20 -right-20 blur-2xl"></div>
                                    <div class="absolute w-40 h-40 bg-yellow-300 rounded-full -bottom-20 -left-20 blur-2xl"></div>
                                </div>

                                <!-- Avatar -->
                                <div class="absolute -bottom-12 left-6">
                                    <div class="relative">
                                        <div class="flex items-center justify-center w-24 h-24 text-3xl font-bold text-white transition-all duration-500 transform border-4 border-white shadow-2xl rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 group-hover:scale-110">
                                            {{ substr($enfant->prenom, 0, 1) }}{{ substr($enfant->nom, 0, 1) }}
                                        </div>
                                        <div class="absolute w-5 h-5 bg-green-400 border-2 border-white rounded-full -bottom-1 -right-1 animate-pulse"></div>
                                    </div>
                                </div>

                                <!-- Lien parental -->
                                @if($enfant->lien_parental)
                                    <div class="absolute px-3 py-1 text-xs font-semibold text-white bg-purple-500 rounded-full top-4 right-4">
                                        {{ $enfant->lien_parental }}
                                    </div>
                                @endif
                            </div>

                            <div class="p-6 pt-16">
                                <!-- Infos enfant -->
                                <div class="mb-4">
                                    <h4 class="text-xl font-bold text-gray-900">{{ $enfant->prenom }} {{ $enfant->nom }}</h4>
                                    <div class="flex items-center mt-1 text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        {{ $enfant->derniere_inscription && $enfant->derniere_inscription->classe ? $enfant->derniere_inscription->classe->nom : 'Classe non assignée' }}
                                    </div>
                                    @if($enfant->derniere_inscription)
                                        <p class="mt-1 text-xs text-gray-400">Inscrit le {{ $enfant->derniere_inscription->created_at->format('d/m/Y') }}</p>
                                    @endif
                                </div>

                                <!-- Statistiques -->
                                @if(isset($enfant->stats) && is_array($enfant->stats))
                                    <div class="grid grid-cols-3 gap-2 p-4 mb-4 bg-gray-50 rounded-xl">
                                        <div class="text-center">
                                            <p class="text-xs text-gray-500">Notes</p>
                                            <p class="text-xl font-bold text-green-600">{{ $enfant->stats['notes_count'] ?? 0 }}</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-xs text-gray-500">Absences</p>
                                            <p class="text-xl font-bold {{ ($enfant->stats['absences_non_justifiees'] ?? 0) > 0 ? 'text-red-600' : 'text-gray-900' }}">
                                                {{ $enfant->stats['absences_count'] ?? 0 }}
                                            </p>
                                            @if(($enfant->stats['absences_non_justifiees'] ?? 0) > 0)
                                                <p class="text-[10px] text-red-500">{{ $enfant->stats['absences_non_justifiees'] }} non just.</p>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <p class="text-xs text-gray-500">Moyenne</p>
                                            <p class="text-xl font-bold {{ ($enfant->stats['moyenne_generale'] ?? 0) >= 10 ? 'text-green-600' : 'text-red-600' }}">
                                                {{ number_format($enfant->stats['moyenne_generale'] ?? 0, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Actions rapides -->
                                <div class="grid grid-cols-4 gap-2">
                                    <a href="{{ route('parent.enfant.notes', $enfant->id) }}" class="flex flex-col items-center p-2 text-green-700 transition-all duration-300 bg-green-50 rounded-xl hover:bg-green-100 hover:scale-110" title="Voir les notes">
                                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-[10px] font-medium">Notes</span>
                                    </a>

                                    <a href="{{ route('parent.enfant.absences', $enfant->id) }}" class="flex flex-col items-center p-2 text-red-700 transition-all duration-300 bg-red-50 rounded-xl hover:bg-red-100 hover:scale-110" title="Voir les absences">
                                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        <span class="text-[10px] font-medium">Absences</span>
                                    </a>

                                    <a href="{{ route('parent.enfant.bulletin', $enfant->id) }}" class="flex flex-col items-center p-2 text-purple-700 transition-all duration-300 bg-purple-50 rounded-xl hover:bg-purple-100 hover:scale-110" title="Voir les bulletins">
                                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span class="text-[10px] font-medium">Bulletins</span>
                                    </a>

                                    <a href="{{ route('parent.enfant.emploi-du-temps', $enfant->id) }}" class="flex flex-col items-center p-2 text-blue-700 transition-all duration-300 bg-blue-50 rounded-xl hover:bg-blue-100 hover:scale-110" title="Voir l'emploi du temps">
                                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-[10px] font-medium">Emploi</span>
                                    </a>
                                </div>

                                <!-- Dernière activité -->
                                <div class="pt-4 mt-4 text-xs border-t border-gray-100">
                                    @php
                                        $derniereNote = $enfant->notes->sortByDesc('created_at')->first();
                                        $derniereAbsence = $enfant->absences->sortByDesc('date_absence')->first();
                                    @endphp

                                    @if($derniereNote)
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-500">Dernière note:</span>
                                            <span class="font-medium text-gray-700">{{ $derniereNote->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    @endif

                                    @if($derniereAbsence)
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-500">Dernière absence:</span>
                                            <span class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($derniereAbsence->date_absence)->format('d/m/Y') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- État vide -->
                <div class="relative p-16 overflow-hidden text-center bg-white shadow-xl rounded-2xl">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute w-64 h-64 bg-blue-300 rounded-full -top-32 -right-32 blur-3xl"></div>
                        <div class="absolute w-64 h-64 bg-purple-300 rounded-full -bottom-32 -left-32 blur-3xl"></div>
                    </div>

                    <div class="relative">
                        <div class="relative inline-block animate-float">
                            <div class="absolute inset-0 bg-blue-300 rounded-full opacity-50 blur-xl"></div>
                            <svg class="relative text-blue-400 w-28 h-28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-2xl font-semibold text-gray-700">Aucun enfant associé</h3>
                        <p class="max-w-md mx-auto mt-2 text-gray-500">
                            Vous n'avez pas encore d'enfants liés à votre compte parent. 
                            Veuillez contacter l'administration pour associer vos enfants.
                        </p>
                        <div class="mt-8">
                            <a href="{{ route('parent.dashboard') }}" class="inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-300 transform bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl hover:from-blue-600 hover:to-indigo-700 hover:scale-105 hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Retour au tableau de bord
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    @keyframes float-random {
        0%, 100% { transform: translate(0, 0); }
        25% { transform: translate(10px, -10px); }
        50% { transform: translate(-10px, 5px); }
        75% { transform: translate(5px, 10px); }
    }
    @keyframes slide-in-left {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes slide-in-right {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes count {
        from { opacity: 0; transform: scale(0.5); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    .animate-gradient-x { background-size: 200% 200%; animation: gradient-x 15s ease infinite; }
    .animate-float { animation: float 3s ease-in-out infinite; }
    .animate-float-random { animation: float-random 10s ease-in-out infinite; }
    .animate-slide-in-left { animation: slide-in-left 0.7s ease-out forwards; }
    .animate-slide-in-right { animation: slide-in-right 0.7s ease-out forwards; }
    .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
    .animate-count { animation: count 0.5s ease-out; }
    .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }

    .animation-delay-200 { animation-delay: 200ms; }
    .animation-delay-400 { animation-delay: 400ms; }
    .animation-delay-600 { animation-delay: 600ms; }
    .animation-delay-2000 { animation-delay: 2000ms; }

    .hover\:-translate-y-2:hover { transform: translateY(-0.5rem); }
    .hover\:scale-110:hover { transform: scale(1.10); }
    </style>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
