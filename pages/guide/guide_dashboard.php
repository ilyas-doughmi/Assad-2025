<?php 
require_once("../../includes/auth/guard.php");
require_role("guide");

?>

<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Guide | ASSAD Zoo</title>
    
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
    <style>
        .progress-bar {
            transition: width 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-dark text-gray-100 font-sans h-screen flex overflow-hidden">

    <aside class="w-64 bg-black border-r border-white/10 hidden md:flex flex-col z-20">
        <div class="h-20 flex items-center px-8 border-b border-white/5 bg-gold/5">
            <i class="fa-solid fa-crown text-gold text-xl mr-3"></i>
            <span class="font-serif font-bold text-lg tracking-widest text-white">GUIDE SPACE</span>
        </div>

        <nav class="flex-1 py-6 space-y-1">
            <a href="guide_dashboard.php" class="flex items-center px-8 py-3 text-gold bg-gold/10 border-r-4 border-gold">
                <i class="fa-solid fa-chart-pie w-6"></i>
                <span class="text-sm font-medium">Tableau de bord</span>
            </a>
            
            <a href="guide_tours.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
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
                <div class="w-10 h-10 rounded-full bg-gray-800 border border-gold flex items-center justify-center text-gold font-bold">
                    AB
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Ahmed B.</p>
                    <p class="text-xs text-green-500">● En ligne</p>
                </div>
            </div>

            <a href="../../includes/auth/../../includes/auth/logout.php" class="block mt-3 text-xs text-red-500 hover:text-red-400">Déconnexion</a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="md:hidden h-16 bg-black border-b border-white/10 flex items-center justify-between px-4">
            <span class="font-serif font-bold text-gold">GUIDE DASHBOARD</span>
            <button class="text-white"><i class="fa-solid fa-bars"></i></button>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 bg-[#0a0a0a]">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="font-serif text-3xl text-white font-bold">Bonjour, Ahmed</h1>
                    <p class="text-gray-500 text-sm mt-1">Voici le programme de vos expéditions pour aujourd'hui.</p>
                </div>
                <button onclick="window.location.href='guide_create.php'" class="hidden md:flex bg-gold text-black font-bold px-4 py-2 rounded shadow hover:bg-white transition items-center gap-2 text-sm">
                    <i class="fa-solid fa-plus"></i> Nouvelle Visite
                </button>
            </div>

            <div class="bg-gradient-to-r from-gray-900 to-black border-l-4 border-gold rounded-xl p-6 mb-8 shadow-lg relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10">
                    <i class="fa-solid fa-clock text-9xl text-white"></i>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="animate-pulse w-2 h-2 rounded-full bg-red-500"></span>
                        <span class="text-red-400 text-xs font-bold uppercase tracking-widest">Prochain Départ</span>
                    </div>
                    <h2 class="font-serif text-2xl text-white">Safari Nocturne : Les Félins</h2>
                    <p class="text-gray-400 mt-1"><i class="fa-regular fa-clock text-gold mr-2"></i> Aujourd'hui à <strong>21:00</strong> (Dans 4h)</p>
                    
                    <div class="mt-4 flex items-center gap-6">
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Participants</p>
                            <p class="text-xl font-bold text-white">18 <span class="text-sm text-gray-500 font-normal">/ 20</span></p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Langue</p>
                            <p class="text-xl font-bold text-white">FR</p>
                        </div>
                        <div>
                             <p class="text-xs text-gray-500 uppercase">Statut</p>
                             <span class="text-green-500 font-bold text-sm bg-green-900/20 px-2 py-0.5 rounded">Confirmé</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-dark-card border border-white/5 p-5 rounded-xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-900/20 flex items-center justify-center text-blue-500">
                        <i class="fa-solid fa-compass text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Visites ce mois</p>
                        <p class="text-2xl font-bold text-white">12</p>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 p-5 rounded-xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-green-900/20 flex items-center justify-center text-green-500">
                        <i class="fa-solid fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Visiteurs guidés</p>
                        <p class="text-2xl font-bold text-white">145</p>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 p-5 rounded-xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-yellow-900/20 flex items-center justify-center text-yellow-500">
                        <i class="fa-solid fa-star text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Note Moyenne</p>
                        <p class="text-2xl font-bold text-white">4.8 <span class="text-sm text-gray-500">/ 5</span></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-dark-card border border-white/5 rounded-xl overflow-hidden shadow-lg">
                    <div class="p-6 border-b border-white/5 flex justify-between items-center">
                        <h3 class="font-serif text-lg text-white font-bold">Planning à venir</h3>
                        <a href="guide_tours.php" class="text-xs text-gold hover:underline">Voir tout</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-400">
                            <thead class="bg-black text-gray-500 uppercase font-bold text-xs">
                                <tr>
                                    <th class="px-6 py-4">Visite</th>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Remplissage</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <tr class="hover:bg-white/5 transition">
                                    <td class="px-6 py-4 font-bold text-white">Petit-Déj Girafes</td>
                                    <td class="px-6 py-4 text-gold">Demain, 08:30</td>
                                    <td class="px-6 py-4 w-40">
                                        <div class="flex justify-between text-xs mb-1">
                                            <span>8/10</span>
                                            <span class="text-green-500">80%</span>
                                        </div>
                                        <div class="w-full bg-gray-800 rounded-full h-1.5">
                                            <div class="bg-green-500 h-1.5 rounded-full" style="width: 80%"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-400 hover:text-white"><i class="fa-solid fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="px-6 py-4 font-bold text-white">Rencontre Lions</td>
                                    <td class="px-6 py-4">22 Déc, 14:00</td>
                                    <td class="px-6 py-4 w-40">
                                        <div class="flex justify-between text-xs mb-1">
                                            <span>2/15</span>
                                            <span class="text-red-500">13%</span>
                                        </div>
                                        <div class="w-full bg-gray-800 rounded-full h-1.5">
                                            <div class="bg-red-500 h-1.5 rounded-full" style="width: 13%"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-400 hover:text-white"><i class="fa-solid fa-eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 rounded-xl overflow-hidden shadow-lg flex flex-col">
                    <div class="p-6 border-b border-white/5">
                        <h3 class="font-serif text-lg text-white font-bold">Derniers Avis</h3>
                    </div>
                    
                    <div class="p-4 space-y-4">
                        <div class="bg-black/40 p-4 rounded-lg border border-white/5">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex text-yellow-500 text-xs">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-600">Il y a 2h</span>
                            </div>
                            <p class="text-gray-300 text-sm italic">"Ahmed était passionnant ! On a adoré les lions."</p>
                            <p class="text-xs text-gray-500 mt-2 font-bold">- Jean D.</p>
                        </div>

                        <div class="bg-black/40 p-4 rounded-lg border border-white/5">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex text-yellow-500 text-xs">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-600">Hier</span>
                            </div>
                            <p class="text-gray-300 text-sm italic">"Super visite, mais un peu courte."</p>
                            <p class="text-xs text-gray-500 mt-2 font-bold">- Sophie L.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>