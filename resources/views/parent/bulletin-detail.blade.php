@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Bulletin de ') . $eleve->prenom . ' ' . $eleve->nom . ' - ' . ($bulletin->periode ?? 'Bulletin') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="relative mb-8 overflow-hidden group rounded-2xl">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-700 via-purple-600 to-indigo-700 animate-gradient-x">
                </div>
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute bg-white rounded-full w-96 h-96 -top-48 -right-48 blur-3xl animate-pulse-slow">
                    </div>
                    <div
                        class="absolute bg-yellow-300 rounded-full w-96 h-96 -bottom-48 -left-48 blur-3xl animate-pulse-slow animation-delay-2000">
                    </div>
                </div>

                <!-- Particules -->
                <div class="absolute inset-0">
                    @for($i = 0; $i < 12; $i++)
                        <div class="absolute w-2 h-2 bg-white rounded-full animate-float-random"
                            style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5) }}s; opacity: 0.6;">
                        </div>
                    @endfor
                </div>

                <div class="relative p-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center space-x-6">
                            <!-- Avatar élève -->
                            <div class="relative group">
                                <div
                                    class="flex items-center justify-center w-20 h-20 transition-all duration-300 transform border-2 shadow-2xl bg-white/20 backdrop-blur-sm rounded-2xl border-white/30 group-hover:scale-110">
                                    <span class="text-3xl font-bold text-white">
                                        {{ substr($eleve->prenom, 0, 1) }}{{ substr($eleve->nom, 0, 1) }}
                                    </span>
                                </div>
                                <div
                                    class="absolute w-4 h-4 bg-green-400 border-2 border-purple-600 rounded-full -bottom-1 -right-1 animate-pulse">
                                </div>
                            </div>

                            <div class="transition-all duration-700 transform animate-slide-in-left">
                                <h3 class="text-3xl font-bold text-white drop-shadow-lg">Bulletin scolaire</h3>
                                <div class="flex flex-wrap items-center gap-3 mt-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                        {{ $eleve->prenom }} {{ $eleve->nom }}
                                    </span>
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                        {{ $bulletin->classe->nom ?? 'Classe' }}
                                    </span>
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                        {{ $bulletin->periode ?? 'Période' }}
                                    </span>
                                    @if(isset($lienParental))
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-sm text-white rounded-full bg-white/20">
                                            {{ $lienParental }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center md:mt-0 md:text-right">
                            <p class="text-sm text-purple-200">Moyenne générale</p>
                            <div class="flex items-center justify-center md:justify-end">
                                <span class="text-5xl font-bold text-white">{{ number_format($moyenneGenerale, 2) }}</span>
                                <span class="ml-2 text-xl text-purple-200">/20</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('parent.enfant.bulletin', $eleve->id) }}"
                    class="inline-flex items-center px-4 py-2 text-gray-700 transition-all duration-300 bg-gray-100 hover:bg-gray-200 rounded-xl hover:scale-105 hover:shadow-md group">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Retour aux bulletins
                </a>
            </div>

            <!-- Informations générales -->
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-4">
                <div class="p-6 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Rang</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $bulletin->rang ?? '-' }}</p>
                            @if($bulletin->effectif_classe)
                                <p class="text-sm text-gray-500">sur {{ $bulletin->effectif_classe }} élèves</p>
                            @endif
                        </div>
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Moyenne classe</p>
                            <p class="text-3xl font-bold text-gray-900">
                                {{ number_format($moyenneClasse ?? 0, 2) }}</p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-xl">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Écart</p>
                            @php $ecart = $moyenneGenerale - ($moyenneClasse ?? 0); @endphp
                            <p class="text-3xl font-bold {{ $ecart >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $ecart >= 0 ? '+' : '' }}{{ number_format($ecart, 2) }}
                            </p>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-xl">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7l.01 0M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total points</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($totalPoints ?? 0, 2) }}</p>
                        </div>
                        <div class="p-3 bg-orange-100 rounded-xl">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appréciation -->
            @if($bulletin->appreciation)
                <div class="p-6 mb-8 bg-gradient-to-r from-yellow-50 to-white border border-yellow-200 shadow-lg rounded-2xl">
                    <div class="flex items-start space-x-3">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-1 text-sm font-medium text-gray-500">Appréciation</p>
                            <p class="text-lg italic text-gray-700">"{{ $bulletin->appreciation }}"</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Détail des notes par matière -->
            <div class="overflow-hidden bg-white border border-gray-100 shadow-lg rounded-2xl">
                <div class="p-6 border-b bg-gradient-to-r from-purple-50 to-indigo-50">
                    <h4 class="flex items-center text-xl font-semibold text-gray-900">
                        <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        Détail des notes par matière
                    </h4>
                </div>

                <div class="p-6">
                    @if(count($notesParMatiere) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Matière</th>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Coefficient
                                        </th>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Notes</th>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Moyenne</th>
                                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Appréciation
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($notesParMatiere as $matiereId => $data)
                                        @if($matiereId !== 'total')
                                            @php
                                                $moyenneMatiere = $data['moyenne'] ?? 0;
                                                $noteClass = $moyenneMatiere >= 16 ? 'bg-green-100 text-green-800' :
                                                    ($moyenneMatiere >= 14 ? 'bg-blue-100 text-blue-800' :
                                                        ($moyenneMatiere >= 10 ? 'bg-yellow-100 text-yellow-800' :
                                                            'bg-red-100 text-red-800'));
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 font-medium text-gray-900">
                                                    {{ $data['matiere_nom'] }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="px-3 py-1 text-sm text-purple-700 bg-purple-100 rounded-full">
                                                        {{ $data['coefficient'] }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($data['notes'] as $note)
                                                                                        @php
                                                                                            $couleurNote = $note['valeur'] >= 16 ? 'green' :
                                                                                                ($note['valeur'] >= 14 ? 'blue' :
                                                                                                    ($note['valeur'] >= 10 ? 'yellow' : 'red'));
                                                                                        @endphp
                                                             <span
                                                                                            class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-{{ $couleurNote }}-100 text-{{ $couleurNote }}-800 rounded-md"
                                                                                            title="{{ $note['evaluation'] }} du {{ $note['date'] ? \Carbon\Carbon::parse($note['date'])->format('d/m/Y') : '' }}">
                                                                                            {{ number_format($note['valeur'], 1) }}
                                                                                        </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-xl {{ $noteClass }}">
                                                        {{ number_format($moyenneMatiere, 2) }}/20
                                                    </span>
                                                </td>
                                                <td class="max-w-xs px-6 py-4 text-sm text-gray-600">
                                                    {{ $data['notes'][0]['appreciation'] ?? '-' }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    <!-- Ligne récapitulative -->
                                    <tr class="font-semibold bg-gradient-to-r from-purple-50 to-indigo-50">
                                        <td colspan="2" class="px-6 py-4 text-sm text-gray-700">Total général</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ number_format($notesParMatiere['total']['points'] ?? 0, 2) }} points</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Coeff.
                                            {{ $notesParMatiere['total']['coefficients'] ?? 0 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Moy.
                                            {{ number_format($moyenneGenerale, 2) }}/20</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <p class="text-gray-500">Aucune note disponible pour ce bulletin</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end mt-8 space-x-4">
                <button onclick="window.print()"
                    class="inline-flex items-center px-6 py-3 font-semibold text-gray-700 transition-all bg-white border border-gray-300 rounded-xl hover:bg-gray-50 hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Imprimer
                </button>

                <a href="{{ route('parent.telecharger-bulletin', [$eleve->id, $bulletin->id]) }}"
                    class="inline-flex items-center px-6 py-3 font-semibold text-white transition-all bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl hover:from-purple-700 hover:to-indigo-700 hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Télécharger PDF
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes gradient-x {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 15s ease infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float-random {

            0%,
            100% {
                transform: translate(0, 0);
            }

            25% {
                transform: translate(10px, -10px);
            }

            50% {
                transform: translate(-10px, 5px);
            }

            75% {
                transform: translate(5px, 10px);
            }
        }

        .animate-float-random {
            animation: float-random 10s ease-in-out infinite;
        }

        .animate-slide-in-left {
            animation: slide-in-left 0.7s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slide-in-right 0.7s ease-out forwards;
        }

        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slide-in-right {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-2000 {
            animation-delay: 2000ms;
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
