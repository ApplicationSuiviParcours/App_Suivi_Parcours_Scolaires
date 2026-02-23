@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Notes de ') . $eleve->prenom . ' ' . $eleve->nom }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="relative mb-8 overflow-hidden group rounded-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 animate-gradient-x"></div>
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
                            <div class="absolute w-4 h-4 bg-green-400 border-2 border-green-600 rounded-full -bottom-1 -right-1 animate-pulse"></div>
                            @if(isset($stats['moyenne_generale']))
                            <div class="absolute px-2 py-1 text-xs text-white bg-green-500 rounded-full -top-2 -right-2">
                                {{ number_format($stats['moyenne_generale'], 1) }}/20
                            </div>
                            @endif
                        </div>
                        
                        <div class="transition-all duration-700 transform animate-slide-in-left">
                            <h3 class="text-3xl font-bold text-white drop-shadow-lg">Notes de {{ $eleve->prenom }} {{ $eleve->nom }}</h3>
                            <div class="flex flex-wrap items-center gap-3 mt-2">
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    {{ $eleve->classe->nom ?? 'Classe non assignée' }}
                                </span>
                                @if($eleve->classe && $eleve->classe->niveau)
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    {{ $eleve->classe->niveau }}
                                </span>
                                @endif
                                @if(isset($lienParental))
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    {{ $lienParental }}
                                </span>
                                @endif
                                <span class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                    {{ $stats['total_notes'] }} note(s)
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hidden transition-all duration-700 transform md:block animate-slide-in-right hover:rotate-12 hover:scale-110">
                        <div class="p-4 border rounded-full bg-white/20 backdrop-blur-sm border-white/30">
                            <svg class="w-16 h-16 text-white animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                    <svg class="w-5 h-5 mr-2 text-green-600 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filtrer les notes
                </h3>
            </div>
            <div class="p-6">
                <form method="GET" action="{{ route('parent.enfant.notes', $eleve->id) }}" class="grid grid-cols-1 gap-4 md:grid-cols-5">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Matière</label>
                        <select name="matiere_id" class="w-full border-gray-300 rounded-xl focus:border-green-500 focus:ring-green-500">
                            <option value="">Toutes les matières</option>
                            @foreach($matieres as $matiere)
                                <option value="{{ $matiere->id }}" {{ request('matiere_id') == $matiere->id ? 'selected' : '' }}>
                                    {{ $matiere->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Période</label>
                        <select name="periode" class="w-full border-gray-300 rounded-xl focus:border-green-500 focus:ring-green-500">
                            <option value="">Toutes les périodes</option>
                            @foreach($periodes as $periode)
                                <option value="{{ $periode }}" {{ request('periode') == $periode ? 'selected' : '' }}>
                                    {{ $periode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Date début</label>
                        <input type="date" name="date_debut" value="{{ request('date_debut') }}" 
                               class="w-full border-gray-300 rounded-xl focus:border-green-500 focus:ring-green-500">
                    </div>
                    
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Date fin</label>
                        <input type="date" name="date_fin" value="{{ request('date_fin') }}" 
                               class="w-full border-gray-300 rounded-xl focus:border-green-500 focus:ring-green-500">
                    </div>
                    
                    <div class="flex items-end space-x-2">
                        <a href="{{ route('parent.enfant.notes', $eleve->id) }}" class="flex-1 px-4 py-3 font-semibold text-center text-gray-700 transition-all bg-gray-100 rounded-xl hover:bg-gray-200">
                            Réinitialiser
                        </a>
                        <button type="submit" class="flex-1 px-4 py-3 font-semibold text-white transition-all bg-gradient-to-r from-green-500 to-green-600 rounded-xl hover:from-green-600 hover:to-green-700">
                            Filtrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-4">
            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total notes</p>
                        <p class="mt-2 text-4xl font-bold text-gray-900">{{ $stats['total_notes'] }}</p>
                    </div>
                    <div class="p-4 bg-blue-100 rounded-xl">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Moyenne générale</p>
                        <p class="mt-2 text-4xl font-bold {{ $stats['moyenne_generale'] >= 10 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($stats['moyenne_generale'], 2) }}
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
                        <p class="text-sm text-gray-500">Meilleure note</p>
                        <p class="mt-2 text-4xl font-bold text-purple-600">{{ number_format($stats['note_max'], 2) }}</p>
                    </div>
                    <div class="p-4 bg-purple-100 rounded-xl">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-100 shadow-xl rounded-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Note minimale</p>
                        <p class="mt-2 text-4xl font-bold text-red-600">{{ number_format($stats['note_min'], 2) }}</p>
                    </div>
                    <div class="p-4 bg-red-100 rounded-xl">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table des notes -->
        <div class="overflow-hidden bg-white border border-gray-100 shadow-xl rounded-2xl">
            <div class="p-6 bg-gradient-to-r from-green-600 to-emerald-600">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white">Liste des notes</h3>
                    <span class="px-4 py-2 text-sm text-white bg-white/20 rounded-full">
                        {{ $stats['total_notes'] }} note(s)
                    </span>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Matière</th>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Note</th>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Coefficient</th>
                            <th class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase">Appréciation</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($notes as $note)
                            @php
                                $noteValue = $note->note;
                                $noteClass = $noteValue >= 16 ? 'bg-green-100 text-green-800' : 
                                            ($noteValue >= 14 ? 'bg-blue-100 text-blue-800' : 
                                            ($noteValue >= 10 ? 'bg-yellow-100 text-yellow-800' : 
                                            'bg-red-100 text-red-800'));
                            @endphp
                            <tr class="hover:bg-green-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $note->evaluation->date_evaluation ? \Carbon\Carbon::parse($note->evaluation->date_evaluation)->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 mr-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                            <span class="text-xs font-bold text-white">{{ substr($note->evaluation->matiere->nom ?? 'M', 0, 2) }}</span>
                                        </div>
                                        <span>{{ $note->evaluation->matiere->nom ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium text-purple-600 bg-purple-100 rounded-full">
                                        {{ $note->evaluation->type ?? 'Évaluation' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-4 py-2 font-bold rounded-xl {{ $noteClass }}">
                                        {{ number_format($noteValue, 2) }}/20
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-sm font-medium text-orange-700 bg-orange-100 rounded-full">
                                        {{ $note->evaluation->coefficient ?? 1 }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    <span class="block truncate" title="{{ $note->appreciation ?? $note->evaluation->appreciation ?? '-' }}">
                                        {{ $note->appreciation ?? $note->evaluation->appreciation ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <svg class="w-20 h-20 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <p class="mt-4 text-gray-500">Aucune note trouvée</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($notes, 'links'))
            <div class="p-6 border-t">
                {{ $notes->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}
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
</style>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection