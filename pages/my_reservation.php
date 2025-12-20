<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Mes Réservations | ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['"Outfit"', 'sans-serif'], serif: ['"Cinzel"', 'serif'] }, colors: { gold: '#C6A87C', dark: '#050505' } } }
        }
    </script>
</head>
<body class="bg-dark text-gray-100 font-sans">
    
    <?php include(dirname(__DIR__).'/includes/visitor_nav.php'); ?>

    <div class="max-w-4xl mx-auto px-6 pt-32 pb-12">
        <h1 class="font-serif text-3xl text-white font-bold mb-8">Mes Réservations</h1>

        <h2 class="text-xs font-bold text-gold uppercase tracking-widest mb-4">À Venir</h2>
        <div class="bg-[#111] border border-white/5 rounded-xl p-6 mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <img src="https://images.unsplash.com/photo-1549366021-9f761d450615?q=80&w=1935" class="w-20 h-20 object-cover rounded-lg">
                <div>
                    <h3 class="font-serif text-lg text-white">Safari Nocturne</h3>
                    <p class="text-sm text-gray-500">20 Déc. 2025 • 21:00</p>
                    <span class="inline-block bg-green-900/30 text-green-500 text-[10px] font-bold px-2 py-0.5 rounded border border-green-900/50 mt-1">Confirmé</span>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="invoice.php?id=1" target="_blank" class="px-4 py-2 border border-gray-700 text-gray-300 rounded hover:text-white hover:border-white transition text-sm"><i class="fa-solid fa-file-invoice mr-2"></i> Facture</a>
                <button class="px-4 py-2 bg-gold text-black font-bold rounded hover:bg-white transition text-sm">Voir Billet</button>
            </div>
        </div>

        <h2 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Historique</h2>
        <div class="bg-[#111] border border-white/5 rounded-xl p-6 opacity-75">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60?q=80&w=1986" class="w-20 h-20 object-cover rounded-lg grayscale">
                    <div>
                        <h3 class="font-serif text-lg text-gray-300">Rencontre Asaad</h3>
                        <p class="text-sm text-gray-600">10 Déc. 2025 • Terminé</p>
                    </div>
                </div>
                <button onclick="document.getElementById('reviewModal').classList.remove('hidden')" class="px-4 py-2 border border-gold text-gold rounded hover:bg-gold hover:text-black transition text-sm"><i class="fa-regular fa-star mr-2"></i> Noter</button>
            </div>
        </div>
    </div>

    <div id="reviewModal" class="hidden fixed inset-0 z-[60] bg-black/80 flex items-center justify-center p-4">
        <div class="bg-[#1a1a1a] p-8 rounded-xl max-w-md w-full border border-gold/30">
            <h3 class="font-serif text-xl text-white mb-4">Laisser un avis</h3>
            <div class="flex justify-center gap-2 text-2xl text-gray-600 mb-4 cursor-pointer">
                <i class="fa-solid fa-star hover:text-gold"></i><i class="fa-solid fa-star hover:text-gold"></i><i class="fa-solid fa-star hover:text-gold"></i><i class="fa-solid fa-star hover:text-gold"></i><i class="fa-solid fa-star hover:text-gold"></i>
            </div>
            <textarea class="w-full bg-black border border-gray-700 rounded p-3 text-white text-sm mb-4" rows="3" placeholder="Votre expérience..."></textarea>
            <div class="flex justify-end gap-3">
                <button onclick="document.getElementById('reviewModal').classList.add('hidden')" class="text-gray-500 hover:text-white text-sm">Annuler</button>
                <button class="bg-gold text-black font-bold px-4 py-2 rounded text-sm">Envoyer</button>
            </div>
        </div>
    </div>

</body>
</html>