<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations Reçues | Espace Guide</title>
    
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
            
            <a href="guide_tours.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-list w-6"></i>
                <span class="text-sm font-medium">Mes Visites</span>
            </a>
            
            <a href="guide_create.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-plus w-6"></i>
                <span class="text-sm font-medium">Créer Visite</span>
            </a>

            <a href="guide_booking.php" class="flex items-center px-8 py-3 text-gold bg-gold/10 border-r-4 border-gold">
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
            <h1 class="font-serif text-2xl text-white font-bold">Liste des Invités</h1>
            
            <div class="flex items-center gap-2 text-sm text-gray-400 bg-[#151515] px-4 py-2 rounded-full border border-gray-700">
                <i class="fa-regular fa-calendar text-gold"></i>
                <span>Aujourd'hui, 15 Déc</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 bg-[#0a0a0a]">
            
            <div class="flex flex-col md:flex-row gap-4 mb-6 justify-between items-center bg-dark-card p-4 rounded-xl border border-white/5">
                
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <span class="text-xs uppercase font-bold text-gray-500">Filtrer par visite :</span>
                    <select id="tourFilter" class="bg-black border border-gray-700 text-white text-sm rounded px-3 py-2 focus:border-gold focus:outline-none">
                        <option value="all">Toutes les visites</option>
                        <option value="safari">Safari Nocturne (20 Déc)</option>
                        <option value="girafes">Déjeuner Girafes (21 Déc)</option>
                    </select>
                </div>

                <div class="relative w-full md:w-64">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-500"></i>
                    <input type="text" id="clientSearch" placeholder="Chercher un client..." class="w-full bg-black border border-gray-700 text-sm rounded pl-10 pr-4 py-2 focus:border-gold focus:outline-none text-white">
                </div>
            </div>

            <div class="bg-dark-card border border-white/5 rounded-xl overflow-hidden shadow-lg">
                <table class="w-full text-left text-sm text-gray-400">
                    <thead class="bg-black text-gray-500 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Visite Réservée</th>
                            <th class="px-6 py-4 text-center">Personnes</th>
                            <th class="px-6 py-4">Total Payé</th>
                            <th class="px-6 py-4">Statut Paiement</th>
                            <th class="px-6 py-4 text-right">Check-in</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5" id="bookingTable">
                        
                        <tr class="hover:bg-white/5 transition group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gold to-yellow-800 flex items-center justify-center text-black font-bold text-xs">AC</div>
                                    <div>
                                        <p class="text-white font-bold">Achraf Chaoub</p>
                                        <p class="text-[10px] text-gray-500">#RES-882</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-white">Safari Nocturne</span>
                                <p class="text-[10px] text-gray-500">20 Déc • 21:00</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-gray-800 px-2 py-1 rounded text-white font-bold">3</span>
                            </td>
                            <td class="px-6 py-4 text-gold font-bold">450 DH</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded bg-green-900/30 text-green-500 border border-green-900/50 text-xs font-bold">
                                    <i class="fa-solid fa-check-circle mr-1"></i> Payé
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button onclick="markPresent(this)" class="px-3 py-1 border border-gray-600 rounded text-gray-400 hover:text-white hover:border-white transition text-xs uppercase tracking-wider">
                                    Valider
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-white/5 transition group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center text-white font-bold text-xs">JD</div>
                                    <div>
                                        <p class="text-white font-bold">John Doe</p>
                                        <p class="text-[10px] text-gray-500">#RES-901</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-white">Safari Nocturne</span>
                                <p class="text-[10px] text-gray-500">20 Déc • 21:00</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-gray-800 px-2 py-1 rounded text-white font-bold">2</span>
                            </td>
                            <td class="px-6 py-4 text-gold font-bold">300 DH</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded bg-yellow-900/30 text-yellow-500 border border-yellow-900/50 text-xs font-bold">
                                    <i class="fa-solid fa-clock mr-1"></i> En Attente
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="px-3 py-1 border border-gray-600 rounded text-gray-500 cursor-not-allowed text-xs uppercase tracking-wider" disabled>
                                    En attente
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-white/5 transition group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-900 flex items-center justify-center text-white font-bold text-xs">SL</div>
                                    <div>
                                        <p class="text-white font-bold">Sophie L.</p>
                                        <p class="text-[10px] text-gray-500">#RES-999</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-white">Déjeuner Girafes</span>
                                <p class="text-[10px] text-gray-500">21 Déc • 08:30</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-gray-800 px-2 py-1 rounded text-white font-bold">4</span>
                            </td>
                            <td class="px-6 py-4 text-gold font-bold">800 DH</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded bg-green-900/30 text-green-500 border border-green-900/50 text-xs font-bold">
                                    <i class="fa-solid fa-check-circle mr-1"></i> Payé
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-green-500 text-xs font-bold uppercase tracking-wider flex items-center justify-end gap-1">
                                    <i class="fa-solid fa-check"></i> Présent
                                </span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-xs text-gray-500">Affichage de 3 sur 12 réservations</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1 bg-black border border-white/10 rounded text-gray-500 hover:text-white transition">Précédent</button>
                    <button class="px-3 py-1 bg-gold text-black font-bold rounded">1</button>
                    <button class="px-3 py-1 bg-black border border-white/10 rounded text-gray-500 hover:text-white transition">Suivant</button>
                </div>
            </div>

        </div>
    </main>

    <script>
        // 1. Search Logic
        document.getElementById('clientSearch').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#bookingTable tr');
            
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                if(text.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // 2. Mark Present Logic
        function markPresent(btn) {
            // Change button to "Présent" text
            const parent = btn.parentElement;
            parent.innerHTML = `
                <span class="text-green-500 text-xs font-bold uppercase tracking-wider flex items-center justify-end gap-1 animate-pulse">
                    <i class="fa-solid fa-check"></i> Présent
                </span>
            `;
            // In real app, send AJAX request here to update DB
        }
    </script>
</body>
</html>