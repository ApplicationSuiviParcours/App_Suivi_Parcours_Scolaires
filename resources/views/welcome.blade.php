<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST'PARC - Gestion Scolaire Simplifiée</title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Icon de l'application --}}

<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Thème bleu nuit par défaut */
        :root {
            --bg-primary: #0a1929;
            --bg-secondary: #132f4c;
            --text-primary: #ffffff;
            --text-secondary: #b0c4de;
            --accent: #1e4a7a;
            --accent-light: #2b6ca3;
            --card-bg: #1a2b3e;
            --border-color: #2d4b6e;
        }
        
        /* Thème clair */
        [data-theme="light"] {
            --bg-primary: #f0f7ff;
            --bg-secondary: #ffffff;
            --text-primary: #0a1929;
            --text-secondary: #1e293b;
            --accent: #1e4a7a;
            --accent-light: #2b6ca3;
            --card-bg: #ffffff;
            --border-color: #cbd5e1;
        }
        
        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
        }
        
        .bg-primary {
            background-color: var(--bg-primary);
        }
        
        .bg-secondary {
            background-color: var(--bg-secondary);
        }
        
        .bg-card {
            background-color: var(--card-bg);
        }
        
        .text-primary {
            color: var(--text-primary);
        }
        
        .text-secondary {
            color: var(--text-secondary);
        }
        
        .border-custom {
            border-color: var(--border-color);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e4a7a 0%, #0a1929 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .glass-effect {
            background: rgba(30, 74, 122, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-blur {
            background: rgba(10, 25, 41, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        [data-theme="light"] .nav-blur {
            background: rgba(255, 255, 255, 0.8);
        }
        
        .theme-toggle {
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
        }
    </style>
</head>
<body class="bg-primary text-primary">

<!-- Navigation -->
<nav class="fixed z-50 w-full transition-all duration-300 nav-blur" id="navbar">
    <div class="container px-6 py-4 mx-auto">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 text-xl font-bold text-white rounded-lg gradient-bg">
                    GP
                </div>
                <span class="text-2xl font-bold gradient-text">GEST'PARC</span>
            </a>

            <!-- Menu Desktop -->
            <div class="items-center hidden space-x-8 md:flex">
                <a href="#features" class="font-medium transition text-secondary hover:text-blue-400">Fonctionnalités</a>
                <a href="#solutions" class="font-medium transition text-secondary hover:text-blue-400">Solutions</a>
                <a href="#tarifs" class="font-medium transition text-secondary hover:text-blue-400">Tarifs</a>
                <a href="#contact" class="font-medium transition text-secondary hover:text-blue-400">Contact</a>
                
                <!-- Theme Toggle Button -->
                <button onclick="toggleTheme()" class="theme-toggle">
                    <svg id="theme-icon-light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
                    </svg>
                    <svg id="theme-icon-dark" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                    </svg>
                </button>
                
                <a href="/login" class="font-semibold text-blue-700 hover:text-blue-300">Connexion</a>
                <a href="/register" class="px-6 py-2 font-semibold text-white transition-all rounded-full gradient-bg hover:shadow-lg hover-scale">
                    Inscription
                </a>
            </div>

            <!-- Menu Mobile Button -->
            <button class="md:hidden text-secondary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="pt-24 pb-16 min-h-screen flex items-center bg-gradient-to-b from-[#0a1929] to-[#132f4c]" data-theme-hero>
    <div class="container px-6 mx-auto">
        <div class="grid items-center gap-12 md:grid-cols-2">
            <!-- Left Content -->
            <div class="text-center md:text-left">
                <span class="inline-block px-4 py-2 mb-6 text-sm font-semibold text-blue-400 border border-blue-800 rounded-full bg-blue-900/30">
                    La nouvelle génération de GEST'PARC
                </span>
                
                <h1 class="mb-6 text-4xl font-extrabold leading-tight text-white md:text-5xl lg:text-6xl">
                    Simplifiez la gestion de votre
                    <span class="block gradient-text">établissement scolaire</span>
                </h1>
                
                <p class="max-w-2xl mb-8 text-xl text-blue-200">
                    Une plateforme tout-en-un pour gérer élèves, enseignants, notes, absences et communications. 
                    Gagnez en efficacité et en sérénité.
                </p>
                
                <div class="flex flex-col justify-center gap-4 sm:flex-row md:justify-start">
                    <a href="/register" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white transition-all rounded-full gradient-bg hover:shadow-xl hover:shadow-blue-900/50 hover-scale">
                        Commencer gratuitement
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="/login" class="px-8 py-4 text-lg font-semibold text-blue-400 transition-all bg-transparent border-2 border-blue-700 rounded-full hover:bg-blue-900/30 hover-scale">
                        Se connecter
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6 mt-12 sm:grid-cols-4">
                    <div class="text-center">
                        <div class="text-3xl font-extrabold gradient-text">500+</div>
                        <div class="text-blue-300">Établissements</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-extrabold gradient-text">50k+</div>
                        <div class="text-blue-300">Élèves</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-extrabold gradient-text">5k+</div>
                        <div class="text-blue-300">Enseignants</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-extrabold gradient-text">98%</div>
                        <div class="text-blue-300">Satisfaction</div>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative animate-float">
                <img src="https://images.unsplash.com/photo-1594608661623-aa0bd3a69d98?q=80&w=648&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Dashboard" 
                     class="w-full border border-blue-800 shadow-2xl rounded-2xl shadow-blue-900/30">
                
                <!-- Floating Card -->
                <div class="absolute -bottom-6 -left-6 bg-[#1a2b3e] rounded-xl p-4 shadow-xl glass-effect border border-blue-700">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-900/50">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-blue-300">Nouveaux inscrits</p>
                            <p class="text-xl font-bold text-white">+250 élèves</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-[#0f1a2b]">
    <div class="container px-6 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-blue-400 border border-blue-800 rounded-full bg-blue-900/50">
                Fonctionnalités
            </span>
            <h2 class="mb-4 text-4xl font-bold text-white">
                Tout ce dont vous avez besoin
            </h2>
            <p class="text-xl text-blue-300">
                Une solution complète et intuitive pour une gestion scolaire sans stress
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- Feature 1 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all hover-scale border border-blue-800">
                <div class="flex items-center justify-center w-16 h-16 mb-6 gradient-bg rounded-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-white">Gestion multi-utilisateurs</h3>
                <p class="text-blue-300">Administrateurs, enseignants, élèves et parents avec rôles personnalisés.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all hover-scale border border-blue-800">
                <div class="flex items-center justify-center w-16 h-16 mb-6 gradient-bg rounded-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-white">Notes & évaluations</h3>
                <p class="text-blue-300">Saisie simplifiée des notes et génération automatique de bulletins.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all hover-scale border border-blue-800">
                <div class="flex items-center justify-center w-16 h-16 mb-6 gradient-bg rounded-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-white">Absences & retards</h3>
                <p class="text-blue-300">Suivi en temps réel et notifications automatiques aux parents.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all hover-scale border border-blue-800">
                <div class="flex items-center justify-center w-16 h-16 mb-6 gradient-bg rounded-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-white">Emploi du temps</h3>
                <p class="text-blue-300">Planification intuitive et visualisation interactive.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-[#0a1929]">
    <div class="container px-6 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-blue-400 border border-blue-800 rounded-full bg-blue-900/50">
                Témoignages
            </span>
            <h2 class="mb-4 text-4xl font-bold text-white">
                Ils nous font confiance
            </h2>
            <p class="text-xl text-blue-300">
                Découvrez ce que nos utilisateurs pensent de GEST'PARC
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            <!-- Testimonial 1 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl relative border border-blue-800">
                <div class="absolute text-6xl text-blue-700 top-6 right-8">"</div>
                <p class="relative mb-6 italic text-blue-300">
                    "GEST'PARC a transformé notre façon de gérer l'établissement. Un gain de temps considérable."
                </p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-12 h-12 font-bold text-white rounded-full gradient-bg">
                        ML
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-white">Marie Laurent</h4>
                        <p class="text-sm text-blue-400">Directrice d'école</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl relative border border-blue-800">
                <div class="absolute text-6xl text-blue-700 top-6 right-8">"</div>
                <p class="relative mb-6 italic text-blue-300">
                    "La gestion des notes n'a jamais été aussi simple. Mes élèves et leurs parents adorent !"
                </p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-12 h-12 font-bold text-white rounded-full gradient-bg">
                        TB
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-white">Thomas Bernard</h4>
                        <p class="text-sm text-blue-400">Professeur</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-[#1a2b3e] p-8 rounded-2xl shadow-xl relative border border-blue-800">
                <div class="absolute text-6xl text-blue-700 top-6 right-8">"</div>
                <p class="relative mb-6 italic text-blue-300">
                    "Je peux suivre la scolarité de mes enfants en temps réel. C'est rassurant et pratique."
                </p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-12 h-12 font-bold text-white rounded-full gradient-bg">
                        SM
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-white">Sophie Martin</h4>
                        <p class="text-sm text-blue-400">Parent d'élève</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-bg">
    <div class="container px-6 mx-auto text-center">
        <h2 class="mb-6 text-4xl font-bold text-white">
            Prêt à révolutionner votre gestion scolaire ?
        </h2>
        <p class="mb-10 text-xl text-blue-200">
            Rejoignez plus de 500 établissements qui nous font confiance
        </p>
        <a href="/register" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-blue-900 transition-all bg-white rounded-full hover:shadow-xl hover:shadow-blue-900/50 hover-scale">
            Commencer gratuitement
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#050f1a] text-white py-16 border-t border-blue-900">
    <div class="container px-6 mx-auto">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <!-- Company -->
            <div>
                <div class="flex items-center mb-6 space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 font-bold text-blue-900 bg-white rounded-lg">
                        GP
                    </div>
                    <span class="text-xl font-bold gradient-text">GEST'PARC</span>
                </div>
                <p class="text-blue-400">
                    La plateforme de gestion scolaire qui simplifie le quotidien des établissements.
                </p>
            </div>

            <!-- Produit -->
            <div>
                <h4 class="mb-4 text-lg font-bold text-white">Produit</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Fonctionnalités</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Tarifs</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">FAQ</a></li>
                </ul>
            </div>

            <!-- Entreprise -->
            <div>
                <h4 class="mb-4 text-lg font-bold text-white">Entreprise</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">À propos</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Blog</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Contact</a></li>
                </ul>
            </div>

            <!-- Légal -->
            <div>
                <h4 class="mb-4 text-lg font-bold text-white">Légal</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Confidentialité</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">CGU</a></li>
                    <li><a href="#" class="text-blue-400 transition hover:text-blue-300">Mentions légales</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 mt-12 text-center border-t border-blue-900">
            <p class="text-blue-400">&copy; 2024 GEST'PARC. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script>
    // Theme management
    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        
        // Update icons
        const lightIcon = document.getElementById('theme-icon-light');
        const darkIcon = document.getElementById('theme-icon-dark');
        
        if (theme === 'light') {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        } else {
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        }
    }
    
    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        setTheme(newTheme);
    }
    
    // Initialize theme
    const savedTheme = localStorage.getItem('theme') || 'dark';
    setTheme(savedTheme);
    
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('shadow-xl', 'border-b', 'border-blue-900');
        } else {
            navbar.classList.remove('shadow-xl', 'border-b', 'border-blue-900');
        }
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>

</body>
</html>