<?php 
require_once("../../includes/auth/guard.php");
require_role("admin");

?>

<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | ASSAD Zoo</title>
    
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
                        'dark-hover': '#1a1a1a'
                    }
                }
            }
        }
    </script>
    <style>
        /* CSS-Only Simple Charts */
        .chart-bar {
            transition: height 1s ease-out;
        }
        .chart-bar:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body class="bg-dark text-gray-100 font-sans h-screen flex overflow-hidden selection:bg-gold selection:text-black">

    <aside class="w-64 bg-black border-r border-white/10 hidden md:flex flex-col z-20">
        <div class="h-20 flex items-center px-8 border-b border-white/5 bg-gold/5">
            <i class="fa-solid fa-crown text-gold text-xl mr-3"></i>
            <span class="font-serif font-bold text-lg tracking-widest text-white">ASSAD ADMIN</span>
        </div>

        <nav class="flex-1 py-6 space-y-1 overflow-y-auto">
            <p class="px-8 text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 mt-2">Principal</p>
            
            <a href="admin_dashboard.php" class="flex items-center px-8 py-3 text-gold bg-gold/10 border-r-4 border-gold">
                <i class="fa-solid fa-chart-line w-6"></i>
                <span class="text-sm font-medium">Statistiques</span>
            </a>
            
            <p class="px-8 text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 mt-6">Gestion</p>

            <a href="manage_users.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition group">
                <i class="fa-solid fa-users w-6 group-hover:text-gold transition"></i>
                <span class="text-sm font-medium">Utilisateurs</span>
                <span class="ml-auto bg-gold text-black text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
            </a>

            <a href="manage_animals.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition group">
                <i class="fa-solid fa-paw w-6 group-hover:text-gold transition"></i>
                <span class="text-sm font-medium">Animaux</span>
            </a>

            <a href="manage_habitats.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition group">
                <i class="fa-solid fa-tree w-6 group-hover:text-gold transition"></i>
                <span class="text-sm font-medium">Habitats</span>
            </a>

            <a href="manage_tours.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition group">
                <i class="fa-solid fa-compass w-6 group-hover:text-gold transition"></i>
                <span class="text-sm font-medium">Visites Guidées</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/5 bg-black">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=Super+Admin&background=C6A87C&color=000" class="w-10 h-10 rounded-full border border-gold">
                <div>
                    <p class="text-sm font-bold text-white">Super Admin</p>
                    <a href="../../includes/auth/logout.php" class="text-xs text-red-500 hover:text-red-400">Déconnexion</a>
                </div>
            </div>
        </div>

</aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="md:hidden h-16 bg-black border-b border-white/10 flex items-center justify-between px-4">
            <span class="font-serif font-bold text-gold">ADMIN PANEL</span>
            <button class="text-white"><i class="fa-solid fa-bars"></i></button>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 bg-[#0a0a0a]">
            
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h1 class="font-serif text-3xl text-white font-bold">Vue d'ensemble</h1>
                    <p class="text-gray-500 text-sm mt-1">Données en temps réel du Zoo Virtuel.</p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <div class="bg-dark-card border border-white/5 p-6 rounded-xl shadow-lg relative overflow-hidden group">
                    <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition">
                        <i class="fa-solid fa-users text-6xl text-white"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Tout l'utilisateur</p>
                    <h3 class="text-3xl font-bold text-white" id="users_text"></h3>
                </div>

                <div class="bg-dark-card border border-gold/30 p-6 rounded-xl shadow-[0_0_15px_rgba(198,168,124,0.1)] relative overflow-hidden">
                    <div class="absolute right-0 top-0 p-4 opacity-10">
                        <i class="fa-solid fa-user-shield text-6xl text-gold"></i>
                    </div>
                    <p class="text-gold text-xs font-bold uppercase tracking-widest mb-2">Guides en Attente</p>
                    <h3 class="text-3xl font-bold text-white" id="not_active_count"></h3>
                    <p class="text-xs text-gray-400 mt-2">Action requise</p>
                </div>

                <div class="bg-dark-card border border-white/5 p-6 rounded-xl shadow-lg relative overflow-hidden">
                    <div class="absolute right-0 top-0 p-4 opacity-10">
                        <i class="fa-solid fa-paw text-6xl text-white"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Animaux Recensés</p>
                    <h3 class="text-3xl font-bold text-white">45</h3>
                    <p class="text-xs text-gray-500 mt-2">5 Habitats</p>
                </div>

                <div class="bg-dark-card border border-white/5 p-6 rounded-xl shadow-lg relative overflow-hidden">
                    <div class="absolute right-0 top-0 p-4 opacity-10">
                        <i class="fa-solid fa-coins text-6xl text-white"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Revenus Billetterie</p>
                    <h3 class="text-3xl font-bold text-white">85k <span class="text-sm font-normal text-gray-500">DH</span></h3>
                    <p class="text-xs text-green-500 mt-2">CAN 2025 Boost</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-dark-card border border-white/5 rounded-xl p-8 shadow-lg">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="font-serif text-xl text-white font-bold">Réservations par Mois</h3>
                        <select class="bg-black border border-white/10 text-xs text-gray-400 rounded px-2 py-1">
                            <option>2025</option>
                        </select>
                    </div>

                    <div class="flex items-end justify-between h-64 gap-2 text-center text-xs text-gray-500">
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-20 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Juin</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-32 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Juil</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-24 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Août</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-40 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Sep</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-48 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Oct</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gray-800 rounded-t h-56 group-hover:bg-gold transition-colors chart-bar"></div>
                            <span>Nov</span>
                        </div>
                        <div class="w-full flex flex-col gap-2 items-center group">
                            <div class="w-full bg-gold/80 rounded-t h-full shadow-[0_0_15px_rgba(198,168,124,0.5)] chart-bar relative">
                                <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-white font-bold">CAN</span>
                            </div>
                            <span class="text-white font-bold">Déc</span>
                        </div>
                    </div>
                </div>

                <div class="bg-dark-card border border-white/5 rounded-xl p-0 shadow-lg flex flex-col">
                    <div class="p-6 border-b border-white/5 flex justify-between items-center">
                        <h3 class="font-serif text-lg text-white font-bold">Approbations</h3>
                        <a href="manage_users.php" class="text-xs text-gold hover:underline">Voir tout</a>
                    </div>

                    <div class="flex-1 overflow-y-auto p-4 space-y-3">
                        
                        <div class="bg-black/40 p-4 rounded-lg border border-white/5 flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white">Youssef Amrani</p>
                                    <p class="text-xs text-gray-500">Inscrit: il y a 2h</p>
                                </div>
                            </div>
                            <div class="flex gap-2 w-full">
                                <form action="approve_guide.php" method="POST" class="w-1/2">
                                    <input type="hidden" name="user_id" value="101">
                                    <input type="hidden" name="action" value="approve">
                                    <button class="w-full py-2 bg-green-900/30 text-green-500 border border-green-900 rounded hover:bg-green-900/50 text-xs font-bold transition">
                                        <i class="fa-solid fa-check mr-1"></i> Valider
                                    </button>
                                </form>
                                <form action="approve_guide.php" method="POST" class="w-1/2">
                                    <input type="hidden" name="user_id" value="101">
                                    <input type="hidden" name="action" value="reject">
                                    <button class="w-full py-2 bg-red-900/30 text-red-500 border border-red-900 rounded hover:bg-red-900/50 text-xs font-bold transition">
                                        <i class="fa-solid fa-xmark mr-1"></i> Refuser
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="bg-black/40 p-4 rounded-lg border border-white/5 flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white">Sarah Oulad</p>
                                    <p class="text-xs text-gray-500">Inscrit: il y a 5h</p>
                                </div>
                            </div>
                            <div class="flex gap-2 w-full">
                                <button class="w-1/2 py-2 bg-green-900/30 text-green-500 border border-green-900 rounded hover:bg-green-900/50 text-xs font-bold transition">
                                    <i class="fa-solid fa-check mr-1"></i> Valider
                                </button>
                                <button class="w-1/2 py-2 bg-red-900/30 text-red-500 border border-red-900 rounded hover:bg-red-900/50 text-xs font-bold transition">
                                    <i class="fa-solid fa-xmark mr-1"></i> Refuser
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        getUsersCount();
        getNotActiveUsers();
        function getUsersCount(){
            const users_text = document.getElementById("users_text");
            let data = new FormData();
            data.append("users_count","all");
            fetch("../../includes/admin/users_data.php",{
                method : "POST",
                body : data
        })
        .then(response=>response.text())
        .then(data=>{
            users_text.innerText = data;
        })
        }

         function getNotActiveUsers(){
            const not_active_count = document.getElementById("not_active_count");
            let data = new FormData();
            data.append("users_count","notactiveusers");
            fetch("../../includes/admin/users_data.php",{
                method : "POST",
                body : data
        })
        .then(response=>response.json())
        .then(data=>{
            not_active_count.innerText = data;
        })
        }

    </script>
</body>
</html>