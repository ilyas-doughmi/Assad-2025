<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Détails Visite | ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Outfit"', 'sans-serif'], serif: ['"Cinzel"', 'serif'] },
                    colors: { gold: '#C6A87C', dark: '#050505' }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-gray-100 font-sans">

    <nav class="fixed w-full z-50 bg-black/90 border-b border-white/10 px-6 py-4 flex justify-between items-center">
        <a href="tours.php" class="text-gray-400 hover:text-white"><i class="fa-solid fa-arrow-left mr-2"></i> Retour aux visites</a>
        <span class="font-serif font-bold text-xl tracking-widest text-gold">ASSAD</span>
        <div class="w-20"></div> </nav>

    <div class="h-[50vh] relative">
        <img src="https://images.unsplash.com/photo-1549366021-9f761d450615?q=80&w=1935" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-t from-dark to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 max-w-7xl mx-auto w-full">
            <span class="bg-gold text-black text-xs font-bold px-3 py-1 rounded uppercase tracking-widest mb-3 inline-block">Safari</span>
            <h1 class="font-serif text-5xl font-bold text-white mb-2">Safari Nocturne : Les Félins</h1>
            <div class="flex gap-6 text-sm text-gray-300">
                <span><i class="fa-regular fa-clock text-gold mr-2"></i> 2h00</span>
                <span><i class="fa-solid fa-language text-gold mr-2"></i> Français</span>
                <span><i class="fa-solid fa-user-tie text-gold mr-2"></i> Guide: Ahmed B.</span>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-12">
        
        <div class="md:col-span-2 space-y-12">
            
            <div>
                <h2 class="font-serif text-2xl text-white mb-4">À propos de cette expérience</h2>
                <p class="text-gray-400 leading-relaxed">
                    Découvrez la vie secrète des grands prédateurs une fois le soleil couché. 
                    Ce parcours exclusif vous emmène au plus près des lions de l'Atlas et des léopards dans une ambiance mystérieuse et sécurisée.
                </p>
            </div>

            <div>
                <h2 class="font-serif text-2xl text-white mb-6">Votre Parcours</h2>
                <div class="border-l-2 border-gray-800 ml-3 space-y-8">
                    
                    <div class="relative pl-8">
                        <span class="absolute -left-[9px] top-0 w-5 h-5 rounded-full bg-gold border-4 border-dark"></span>
                        <h3 class="text-white font-bold text-lg">Point de Rencontre</h3>
                        <p class="text-gray-500 text-sm">Briefing de sécurité et équipement.</p>
                    </div>

                    <div class="relative pl-8">
                        <span class="absolute -left-[9px] top-0 w-5 h-5 rounded-full bg-gray-700 border-4 border-dark"></span>
                        <h3 class="text-white font-bold text-lg">Territoire des Lions</h3>
                        <p class="text-gray-500 text-sm">Observation silencieuse du repas (30 min).</p>
                    </div>

                    <div class="relative pl-8">
                        <span class="absolute -left-[9px] top-0 w-5 h-5 rounded-full bg-gray-700 border-4 border-dark"></span>
                        <h3 class="text-white font-bold text-lg">Fin du parcours</h3>
                        <p class="text-gray-500 text-sm">Retour au lodge et questions/réponses.</p>
                    </div>

                </div>
            </div>

            <div class="pt-8 border-t border-white/10">
                <h2 class="font-serif text-2xl text-white mb-6">Avis des visiteurs</h2>
                <div class="bg-white/5 p-4 rounded-lg mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="font-bold text-gold">Sophie L.</span>
                        <div class="text-yellow-500 text-xs"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    </div>
                    <p class="text-gray-400 text-sm">"Incroyable de voir Asaad d'aussi près !"</p>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="bg-[#111] border border-gold/30 rounded-xl p-6 sticky top-24 shadow-2xl">
                <div class="flex justify-between items-end mb-6">
                    <span class="text-gray-400">Prix par personne</span>
                    <span class="text-3xl font-serif font-bold text-gold">150 DH</span>
                </div>
                
                <form action="process_booking.php" method="POST">
                    <input type="hidden" name="tour_id" value="1">
                    
                    <div class="mb-4">
                        <label class="block text-xs uppercase text-gray-500 font-bold mb-2">Date</label>
                        <div class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white text-sm">
                            20 Décembre 2025 à 21:00
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs uppercase text-gray-500 font-bold mb-2">Nombre de personnes</label>
                        <input type="number" name="nb_people" value="1" min="1" max="10" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white focus:border-gold outline-none">
                    </div>

                    <button type="submit" class="w-full bg-gold text-black font-bold py-4 rounded hover:bg-white transition uppercase tracking-widest text-sm">
                        Réserver maintenant
                    </button>
                    <p class="text-center text-xs text-gray-500 mt-4"><i class="fa-solid fa-lock mr-1"></i> Paiement sécurisé</p>
                </form>
            </div>
        </div>

    </div>
</body>
</html>