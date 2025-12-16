<?php 
require_once("../../includes/auth/guard.php");
require_role("guide");

?>

<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Visites | Espace Guide</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Outfit"', 'sans-serif'],
                        serif: ['"Cinzel"', 'serif'],
                    },
                    colors: {
                        gold: '#C6A87C',
                        dark: '#050505',
                        'dark-card': '#111111',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-gray-100 font-sans h-screen flex overflow-hidden">

    <aside class="w-64 bg-black border-r border-white/10 hidden md:flex flex-col z-20">
        <div class="h-20 flex items-center px-8 border-b border-white/5 bg-gold/5">
            <i class="fa-solid fa-crown text-gold text-xl mr-3"></i>
            <span class="font-serif font-bold text-lg tracking-widest text-white">GUIDE SPACE</span>
        </div>

        <nav class="flex-1 py-6 space-y-1">
            <a href="guide_dashboard.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-chart-pie w-6"></i>
                <span class="text-sm font-medium">Tableau de bord</span>
            </a>
            
            <a href="guide_tours.php" class="flex items-center px-8 py-3 text-gold bg-gold/10 border-r-4 border-gold">
                <i class="fa-solid fa-list w-6"></i>
                <span class="text-sm font-medium">Mes Visites</span>
            </a>
            
            <a href="guide_create.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-plus w-6"></i>
                <span class="text-sm font-medium">Créer Visite</span>
            </a>

            <a href="guide_booking.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-ticket w-6"></i>
                <span class="text-sm font-medium">Réservations</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/5 bg-black">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-800 border border-gold flex items-center justify-center text-gold font-bold">AB</div>
                <div>
                    <p class="text-sm font-bold text-white">Ahmed B.</p>
                    <a href="logout.php" class="text-xs text-red-500 hover:text-red-400">Déconnexion</a>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="h-20 bg-[#0a0a0a] border-b border-white/5 flex items-center justify-between px-8">
            <h1 class="font-serif text-2xl text-white font-bold">Gestion de mes Offres</h1>
            <a href="guide_create.php" class="bg-gold text-black font-bold px-4 py-2 rounded shadow hover:bg-white transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-plus"></i> Nouvelle Visite
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8 bg-[#0a0a0a]">
            
            <div class="flex flex-col sm:flex-row gap-4 mb-8 justify-between items-center">
                <div class="relative w-full sm:w-64">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-500"></i>
                    <input type="text" placeholder="Rechercher une visite..." class="w-full bg-[#151515] border border-gray-700 text-sm rounded-lg pl-10 pr-4 py-2.5 focus:border-gold focus:outline-none text-gray-300">
                </div>
                
                <div class="flex bg-[#151515] p-1 rounded-lg border border-gray-700">
                    <button class="px-4 py-1.5 rounded text-xs font-bold bg-gray-700 text-white shadow">À Venir</button>
                    <button class="px-4 py-1.5 rounded text-xs font-bold text-gray-400 hover:text-white transition">Terminées</button>
                    <button class="px-4 py-1.5 rounded text-xs font-bold text-gray-400 hover:text-white transition">Annulées</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <div class="bg-dark-card border border-white/5 rounded-xl p-6 shadow-lg hover:border-gold/30 transition group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="bg-green-900/20 text-green-500 border border-green-900/30 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider mb-2 inline-block">Confirmé</span>
                            <h3 class="font-serif text-xl text-white font-bold group-hover:text-gold transition">Safari Nocturne : Les Félins</h3>
                            <p class="text-sm text-gray-500 mt-1"><i class="fa-regular fa-calendar mr-2 text-gold"></i> 20 Déc. 2025 • 21:00</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-2xl font-bold text-white">150 <span class="text-xs font-normal text-gray-500">DH</span></span>
                            <span class="text-xs text-gray-500">par pers.</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-gray-400">Remplissage</span>
                            <span class="text-white font-bold">18 / 20 places</span>
                        </div>
                        <div class="w-full bg-gray-800 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 border-t border-white/5 pt-4">
                        <a href="guide_booking.php?tour_id=1" class="flex-1 py-2 text-center bg-white/5 hover:bg-white/10 rounded text-sm text-white font-medium transition">
                            <i class="fa-solid fa-users mr-2"></i> Voir les inscrits
                        </a>
                        <button class="w-10 h-10 flex items-center justify-center rounded border border-gray-700 hover:border-gold hover:text-gold transition" title="Modifier">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded border border-gray-700 hover:border-red-500 hover:text-red-500 transition" title="Annuler">
                            <i class="fa-solid fa-ban"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 rounded-xl p-6 shadow-lg hover:border-gold/30 transition group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                             <span class="bg-yellow-900/20 text-yellow-500 border border-yellow-900/30 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider mb-2 inline-block">En attente</span>
                            <h3 class="font-serif text-xl text-white font-bold group-hover:text-gold transition">Déjeuner avec les Girafes</h3>
                            <p class="text-sm text-gray-500 mt-1"><i class="fa-regular fa-calendar mr-2 text-gold"></i> 21 Déc. 2025 • 08:30</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-2xl font-bold text-white">200 <span class="text-xs font-normal text-gray-500">DH</span></span>
                            <span class="text-xs text-gray-500">par pers.</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-gray-400">Remplissage</span>
                            <span class="text-white font-bold">2 / 10 places</span>
                        </div>
                        <div class="w-full bg-gray-800 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 border-t border-white/5 pt-4">
                        <a href="guide_booking.php?tour_id=2" class="flex-1 py-2 text-center bg-white/5 hover:bg-white/10 rounded text-sm text-white font-medium transition">
                            <i class="fa-solid fa-users mr-2"></i> Voir les inscrits
                        </a>
                        <button class="w-10 h-10 flex items-center justify-center rounded border border-gray-700 hover:border-gold hover:text-gold transition" title="Modifier">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded border border-gray-700 hover:border-red-500 hover:text-red-500 transition" title="Annuler">
                            <i class="fa-solid fa-ban"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 rounded-xl p-6 shadow-lg opacity-75 grayscale hover:grayscale-0 transition duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                             <span class="bg-gray-800 text-gray-400 border border-gray-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider mb-2 inline-block">Terminé</span>
                            <h3 class="font-serif text-xl text-white font-bold">Rencontre VIP : Asaad</h3>
                            <p class="text-sm text-gray-500 mt-1"><i class="fa-regular fa-calendar mr-2 text-gray-500"></i> 10 Déc. 2025</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-2xl font-bold text-gray-400">800 <span class="text-xs font-normal text-gray-600">DH</span></span>
                        </div>
                    </div>

                    <div class="mb-6 grid grid-cols-2 gap-4">
                        <div class="bg-black/30 p-2 rounded border border-white/5 text-center">
                            <p class="text-xs text-gray-500 uppercase">Revenus</p>
                            <p class="text-gold font-bold">4,000 DH</p>
                        </div>
                        <div class="bg-black/30 p-2 rounded border border-white/5 text-center">
                            <p class="text-xs text-gray-500 uppercase">Note</p>
                            <p class="text-yellow-500 font-bold"><i class="fa-solid fa-star mr-1"></i> 5.0</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 border-t border-white/5 pt-4">
                         <button class="w-full py-2 text-center text-gray-500 text-sm cursor-not-allowed">
                            Archivé
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>