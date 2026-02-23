{{-- resources/views/search/results.blade.php --}}
@extends('layouts.app')

@section('title', 'Résultats de recherche')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Résultats de recherche</h1>
            <p class="mt-2 text-gray-600">
                Recherche pour : "<strong>{{ $query }}</strong>"
            </p>
        </div>

        @if(empty($results['eleves']) && empty($results['enseignants']) && empty($results['classes']))
            <!-- Aucun résultat -->
            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun résultat trouvé</h3>
                <p class="mt-2 text-gray-500">
                    Aucun élément ne correspond à votre recherche "{{ $query }}".
                </p>
                <div class="mt-6">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                        Retour
                    </a>
                </div>
            </div>
        @else
            <!-- Résultats -->
            <div class="space-y-8">

                <!-- Résultats Élèves -->
                @if(count($results['eleves']) > 0)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-indigo-50 border-b border-indigo-100">
                        <h2 class="text-lg font-semibold text-indigo-900">
                            Élèves ({{ count($results['eleves']) }})
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($results['eleves'] as $eleve)
                        <div class="px-6 py-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span class="text-indigo-600 font-medium">
                                                    {{ strtoupper(substr($eleve->prenom, 0, 1)) }}{{ strtoupper(substr($eleve->nom, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('admin.eleves.show', $eleve) }}" class="hover:text-indigo-600">
                                                    {{ $eleve->nom }} {{ $eleve->prenom }}
                                                </a>
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Matricule: {{ $eleve->matricule }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.eleves.show', $eleve) }}"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                    Voir
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Résultats Enseignants -->
                @if(count($results['enseignants']) > 0)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-green-50 border-b border-green-100">
                        <h2 class="text-lg font-semibold text-green-900">
                            Enseignants ({{ count($results['enseignants']) }})
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($results['enseignants'] as $enseignant)
                        <div class="px-6 py-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                                <span class="text-green-600 font-medium">
                                                    {{ strtoupper(substr($enseignant->prenom, 0, 1)) }}{{ strtoupper(substr($enseignant->nom, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('admin.enseignants.show', $enseignant) }}" class="hover:text-green-600">
                                                    {{ $enseignant->nom }} {{ $enseignant->prenom }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.enseignants.show', $enseignant) }}"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200">
                                    Voir
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Résultats Classes -->
                @if(count($results['classes']) > 0)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                        <h2 class="text-lg font-semibold text-blue-900">
                            Classes ({{ count($results['classes']) }})
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($results['classes'] as $classe)
                        <div class="px-6 py-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('admin.classes.show', $classe) }}" class="hover:text-blue-600">
                                                    {{ $classe->nom }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.classes.show', $classe) }}"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200">
                                    Voir
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Lien pour voir tous les résultats -->
                <div class="mt-6 text-center">
                    <a href="{{ route('search.results', ['q' => $query]) }}" class="text-indigo-600 hover:text-indigo-900">
                        Voir tous les résultats →
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
