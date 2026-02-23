{{-- resources/views/auth/register.blade.php --}}
<x-guest-layout>
    <!-- Header compact -->
    <div class="text-center mb-3">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-green-600 to-emerald-600 mb-2 shadow-md">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
        </div>
        
        <h2 class="text-xl font-bold text-gray-900">Créer un compte</h2>
        <p class="text-xs text-gray-500">Rejoignez GEST'PARC</p>
    </div>

    <!-- Message de bienvenue compact -->
    <div class="mb-3 p-2 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
        <div class="flex items-center">
            <svg class="w-3.5 h-3.5 text-green-600 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            <p class="text-xs text-green-700">
                Inscription gratuite - Accès illimité
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-medium text-gray-700 mb-0.5">
                Nom complet <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <input id="name" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autofocus 
                       class="pl-9 w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 transition-all @error('name') border-red-400 bg-red-50 @enderror" 
                       placeholder="Jean Dupont">
            </div>
            <x-input-error :messages="$errors->get('name')" class="text-xs mt-0.5" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-medium text-gray-700 mb-0.5">
                Adresse email <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       class="pl-9 w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 transition-all @error('email') border-red-400 bg-red-50 @enderror" 
                       placeholder="vous@exemple.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-xs mt-0.5" />
        </div>

        <!-- Password with Show/Hide Toggle and Alpine.js -->
        <div x-data="{ showPassword: false }">
            <label for="password" class="block text-xs font-medium text-gray-700 mb-0.5">
                Mot de passe <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <input id="password" 
                       :type="showPassword ? 'text' : 'password'"
                       name="password" 
                       required 
                       class="pl-9 pr-8 w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 transition-all @error('password') border-red-400 bg-red-50 @enderror" 
                       placeholder="••••••••">
                
                <!-- Show/Hide Password Button -->
                <button 
                    type="button" 
                    @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 pr-2 flex items-center focus:outline-none"
                    :class="{ 'text-green-600': showPassword }"
                >
                    <!-- Eye Icon (Visible) -->
                    <svg x-show="!showPassword" class="h-4 w-4 text-gray-400 hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    
                    <!-- Eye Off Icon (Hidden) -->
                    <svg x-show="showPassword" class="h-4 w-4 text-green-600 hover:text-green-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            
            <!-- Force du mot de passe compacte -->
            <div class="mt-1.5">
                <div class="flex items-center justify-between mb-0.5">
                    <span class="text-[10px] text-gray-500">Force</span>
                    <span id="passwordStrength" class="text-[10px] font-medium text-gray-500">Faible</span>
                </div>
                <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                    <div id="passwordStrengthBar" class="h-full w-0 bg-red-500 rounded-full transition-all duration-300"></div>
                </div>
                <div class="mt-0.5 text-[10px] text-gray-500 flex flex-wrap gap-x-2">
                    <span id="length">• 8 car.</span>
                    <span id="uppercase">• Maj.</span>
                    <span id="lowercase">• Min.</span>
                    <span id="number">• Chiffre</span>
                </div>
            </div>
            
            <x-input-error :messages="$errors->get('password')" class="text-xs mt-0.5" />
        </div>

        <!-- Confirm Password with Show/Hide Toggle -->
        <div x-data="{ showConfirmPassword: false }">
            <label for="password_confirmation" class="block text-xs font-medium text-gray-700 mb-0.5">
                Confirmer <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <input id="password_confirmation" 
                       :type="showConfirmPassword ? 'text' : 'password'"
                       name="password_confirmation" 
                       required 
                       class="pl-9 pr-8 w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 transition-all" 
                       placeholder="••••••••">
                
                <!-- Show/Hide Confirm Password Button -->
                <button 
                    type="button" 
                    @click="showConfirmPassword = !showConfirmPassword"
                    class="absolute inset-y-0 right-0 pr-2 flex items-center focus:outline-none"
                    :class="{ 'text-green-600': showConfirmPassword }"
                >
                    <!-- Eye Icon (Visible) -->
                    <svg x-show="!showConfirmPassword" class="h-4 w-4 text-gray-400 hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    
                    <!-- Eye Off Icon (Hidden) -->
                    <svg x-show="showConfirmPassword" class="h-4 w-4 text-green-600 hover:text-green-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            
            <!-- Indicateur de correspondance -->
            <div id="passwordMatch" class="text-[10px] mt-0.5 hidden"></div>
            
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-xs mt-0.5" />
        </div>

        <!-- Conditions d'utilisation -->
        <div class="flex items-start mt-1">
            <input id="terms" type="checkbox" name="terms" required 
                   class="w-3.5 h-3.5 mt-0.5 border border-gray-300 rounded bg-gray-50 focus:ring-1 focus:ring-green-300 text-green-600">
            <label for="terms" class="ml-1.5 text-xs text-gray-600">
                J'accepte les 
                <a href="#" class="text-green-600 hover:underline">conditions</a> et 
                <a href="#" class="text-green-600 hover:underline">confidentialité</a>
            </label>
        </div>

        <!-- Bouton d'inscription -->
        <button type="submit" 
                class="w-full flex items-center justify-center py-2.5 px-3 border border-transparent rounded-lg text-xs font-semibold text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all mt-2">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Créer mon compte
        </button>

        <!-- Lien vers connexion -->
        <div class="relative mt-2">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-[10px]">
                <span class="px-1.5 bg-white text-gray-500">Déjà inscrit ?</span>
            </div>
        </div>
        
        <div class="text-center">
            <a href="{{ route('login') }}" 
               class="inline-flex items-center justify-center w-full py-2 px-3 border border-gray-200 rounded-lg text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-gray-100 transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Se connecter
            </a>
        </div>
    </form>

    <!-- Alpine.js (if not already included in your layout) -->
    @once
        @push('scripts')
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @endpush
    @endonce

    @push('scripts')
    <script>
        // Vérification du mot de passe (sans le toggle car géré par Alpine)
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const strengthText = document.getElementById('passwordStrength');
            
            const hasLength = password.length >= 8;
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            
            document.getElementById('length').style.color = hasLength ? '#16a34a' : '#6b7280';
            document.getElementById('uppercase').style.color = hasUpperCase ? '#16a34a' : '#6b7280';
            document.getElementById('lowercase').style.color = hasLowerCase ? '#16a34a' : '#6b7280';
            document.getElementById('number').style.color = hasNumber ? '#16a34a' : '#6b7280';
            
            const score = [hasLength, hasUpperCase, hasLowerCase, hasNumber].filter(Boolean).length;
            
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.className = 'h-full bg-gray-500 rounded-full';
                strengthText.textContent = 'Faible';
            } else if (score <= 1) {
                strengthBar.style.width = '25%';
                strengthBar.className = 'h-full bg-red-500 rounded-full';
                strengthText.textContent = 'Faible';
            } else if (score === 2) {
                strengthBar.style.width = '50%';
                strengthBar.className = 'h-full bg-yellow-500 rounded-full';
                strengthText.textContent = 'Moyen';
            } else if (score === 3) {
                strengthBar.style.width = '75%';
                strengthBar.className = 'h-full bg-blue-500 rounded-full';
                strengthText.textContent = 'Bon';
            } else {
                strengthBar.style.width = '100%';
                strengthBar.className = 'h-full bg-green-500 rounded-full';
                strengthText.textContent = 'Fort';
            }
        });

        // Vérification de correspondance
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirm = this.value;
            const matchIndicator = document.getElementById('passwordMatch');
            
            if (confirm.length > 0) {
                matchIndicator.classList.remove('hidden');
                matchIndicator.innerHTML = password === confirm ? 
                    '<span class="text-green-600">✓ Mots de passe identiques</span>' : 
                    '<span class="text-red-600">✗ Mots de passe différents</span>';
            } else {
                matchIndicator.classList.add('hidden');
            }
        });
    </script>
    @endpush
</x-guest-layout>