@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Bulletins de ') . $eleve->prenom . ' ' . $eleve->nom }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="relative mb-8 overflow-hidden group rounded-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-700 via-purple-600 to-indigo-700 animate-gradient-x"></div>
            <div class="absolute inset-0 opacity-20">
                <div class="absolute bg-white rounded-full w-96 h-96 -top-48 -right-48 blur-3xl animate-pulse-slow"></div>
                <div class="absolute bg-yellow-300 rounded-full w-96 h-96 -bottom-48 -left-48 blur-3xl animate-pulse-slow animation-delay-2000"></div>
            </div>
            
            <!-- Particules -->
            <div class="absolute inset-0">
                @for($i = 0; $i < 12; $i++)
                <div class="absolute w-2 h-2 bg-white rounded-full animate-float-random" 
                     style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5) }}s; opacity: 0.6;"></div>
                @endfor
            </div>
            
            <div class="relative p-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center space-x-6">
                        <!-- Avatar élève -->
                        <div class="relative group">
                            <div class="flex items-center justify-center w-20 h-20 transition-all duration-300 transform border-2 shadow-2xl bg-white/20 backdrop-blur-sm rounded-2xl border-white/30 group-hover:scale-110">
                                <span class="text-3xl font-bold text-white">
                                    {{ substr($eleve->prenom, 0, 1) }}{{ substr($eleve->nom, 0, 1) }}
                                </span>
                            </div>
                            <div class="absolute w-4 h-4 bg-green-400 border-2 border-purple-600 rounded-full -bottom-1 -right-1 animate-pulse"></div>
                            @if($stats['total'] > 0)
                            <div class="absolute px-2 py-1 text-xs text-white bg-purple-500 rounded-full -top-2 -right-2">
                                {{ $stats['total'] }} bulletin(s)
                            </div>
                            @endif
                        </div>
                        
                        <div class="transition-all duration-700 transform animate-slide-in-left">
                            <h3 class="text-3xl font-bold text-white drop-shadow-lg">Bulletins de {{ $eleve->prenom }} {{ $eleve->nom }}</h3>
                            <div class="flex flex-wrap items-center gap-3 mt-2">
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    {{ $eleve->classe->nom ?? 'Classe non assignée' }}
                                </span>
                                @if(isset($lienParental))
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    {{ $lienParental }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="hidden transition-all duration-700 transform md:block animate-slide-in-right hover:rotate-12 hover:scale-110">
                        <div class="p-4 border rounded-full bg-white/20 backdrop-blur-sm border-white/30">
                            <svg class="w-16 h-16 text-white animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('parent.enfants') }}" class="inline-flex items-center px-4 py-2 text-gray-700 transition-all duration-300 bg-gray-100 hover:bg-gray-200 rounded-xl hover:scale-105 hover:shadow-md group">
                <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour à mes enfants
            </a>
        </div>

        <!-- Filtres -->
        <div class="mb-8 overflow-hidden transition-all duration-500 transform bg-white border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl animate-fade-in-up">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                    <svg class="w-5 h-5 mr-2 text-purple-600 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filtrer les bulletins
                </h3>
            </div>
            <div class="p-6">
                <form method="GET" action="{{ route('parent.enfant.bulletin', $eleve->id) }}" class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Période</label>
                        <select name="periode" class="w-full border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Toutes</option>
                            @foreach($periodes as $periode)
                                <option value="{{ $periode }}" {{ request('periode') == $periode ? 'selected' : '' }}>
                                    {{ $periode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Année scolaire</label>
                        <select name="annee_scolaire_id" class="w-full border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Toutes</option>
                            @foreach($anneesScolaires as $annee)
                                <option value="{{ $annee->id }}" {{ request('annee_scolaire_id') == $annee->id ? 'selected' : '' }}>
                                    {{ $annee->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex items-end space-x-3 md:col-span-2">
                        <a href="{{ route('parent.enfant.bulletin', $eleve->id) }}" 
                           class="flex-1 px-6 py-3 font-semibold text-center text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200">
                            Réinitialiser
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 font-semibold text-white bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl hover:from-purple-600 hover:to-indigo-700">
                            Filtrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total bulletins</p>
                        <p class="mt-2 text-4xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                    <div class="p-4 bg-purple-100 rounded-xl">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Moyenne globale</p>
                        <p class="mt-2 text-4xl font-bold {{ $stats['moyenne_globale'] >= 10 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($stats['moyenne_globale'], 2) }}
                        </p>
                    </div>
                    <div class="p-4 bg-green-100 rounded-xl">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Dernier bulletin</p>
                        <p class="mt-2 text-xl font-bold text-gray-900">
                            {{ $stats['dernier']->periode ?? 'N/A' }}
                        </p>
                    </div>
                    <div class="p-4 bg-blue-100 rounded-xl">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille des bulletins -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($bulletins as $index => $bulletin)
                @php
                    $moyenne = $bulletin->moyenne_generale ?? 0;
                    $mention = $moyenne >= 16 ? 'Très bien' : 
                              ($moyenne >= 14 ? 'Bien' : 
                              ($moyenne >= 12 ? 'Assez bien' : 
                              ($moyenne >= 10 ? 'Passable' : 'Insuffisant')));
                    $mentionColor = $moyenne >= 16 ? 'bg-green-100 text-green-800' : 
                                   ($moyenne >= 14 ? 'bg-blue-100 text-blue-800' : 
                                   ($moyenne >= 12 ? 'bg-yellow-100 text-yellow-800' : 
                                   ($moyenne >= 10 ? 'bg-orange-100 text-orange-800' : 
                                   'bg-red-100 text-red-800')));
                @endphp
                
                <div class="overflow-hidden transition-all duration-500 transform bg-white border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-500"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">{{ $bulletin->periode }}</h4>
                                <p class="text-sm text-gray-500">{{ $bulletin->anneeScolaire->nom ?? 'Année scolaire' }}</p>
                                @if($bulletin->trimestre)
                                <p class="text-xs text-gray-400">Trimestre {{ $bulletin->trimestre }}</p>
                                @endif
                            </div>
                            <div class="p-3 bg-purple-100 rounded-xl">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 mb-4 bg-gray-50 rounded-xl">
                            <span class="text-sm text-gray-500">Moyenne</span>
                            <div class="text-right">
                                <span class="text-2xl font-bold {{ $moyenne >= 10 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ number_format($moyenne, 2) }}
                                </span>
                                <span class="text-sm text-gray-400">/20</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm text-gray-500">Mention</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $mentionColor }}">
                                {{ $mention }}
                            </span>
                        </div>

                        @if($bulletin->appreciation)
                        <div class="p-3 mb-4 italic text-gray-600 bg-yellow-50 rounded-lg">
                            "{{ Str::limit($bulletin->appreciation, 80) }}"
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-4 border-t">
                            <span class="text-xs text-gray-400">
                                {{ $bulletin->created_at->format('d/m/Y') }}
                            </span>
                            <a href="{{ route('parent.enfant.bulletin.detail', ['eleve' => $eleve->id, 'bulletin' => $bulletin->id]) }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-700 transition-colors bg-purple-100 rounded-lg hover:bg-purple-200">
                                Détails
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="p-12 text-center bg-white shadow-xl rounded-2xl">
                        <svg class="w-24 h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="mt-4 text-xl text-gray-500">Aucun bulletin disponible</p>
                        <p class="text-gray-400">Les bulletins apparaîtront ici une fois publiés</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($bulletins, 'links'))
        <div class="mt-8">
            {{ $bulletins->links() }}
        </div>
        @endif
    </div>
</div>

<style>
@keyframes gradient-x { 0%,100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
.animate-gradient-x { background-size: 200% 200%; animation: gradient-x 15s ease infinite; }
@keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
.animate-float { animation: float 3s ease-in-out infinite; }
@keyframes float-random { 0%,100% { transform: translate(0,0); } 25% { transform: translate(10px,-10px); } 50% { transform: translate(-10px,5px); } 75% { transform: translate(5px,10px); } }
.animate-float-random { animation: float-random 10s ease-in-out infinite; }
.animate-slide-in-left { animation: slide-in-left 0.7s ease-out forwards; }
.animate-slide-in-right { animation: slide-in-right 0.7s ease-out forwards; }
.animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
@keyframes slide-in-left { from { opacity:0; transform:translateX(-50px); } to { opacity:1; transform:translateX(0); } }
@keyframes slide-in-right { from { opacity:0; transform:translateX(50px); } to { opacity:1; transform:translateX(0); } }
@keyframes fade-in-up { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:translateY(0); } }
.animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }
@keyframes pulse-slow { 0%,100% { opacity:0.6; } 50% { opacity:1; } }
.animate-spin-slow { animation: spin-slow 3s linear infinite; }
@keyframes spin-slow { from { transform:rotate(0deg); } to { transform:rotate(360deg); } }
.animation-delay-200 { animation-delay: 200ms; }
.animation-delay-2000 { animation-delay: 2000ms; }
.hover\:-translate-y-2:hover { transform: translateY(-0.5rem); }
</style>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection