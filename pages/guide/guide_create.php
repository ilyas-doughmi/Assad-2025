<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Visite | Espace Guide</title>
    
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
                        'dark-panel': '#121212',
                    }
                }
            }
        }
    </script>
    <style>
        .dash-input {
            background-color: #0a0a0a;
            border: 1px solid #333;
            color: white;
            transition: all 0.3s;
        }
        .dash-input:focus {
            border-color: #C6A87C;
            box-shadow: 0 0 0 1px #C6A87C;
            outline: none;
        }
        /* Animation for wizard steps */
        .fade-in { animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
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
            <a href="guide_create.php" class="flex items-center px-8 py-3 text-gold bg-gold/10 border-r-4 border-gold">
                <i class="fa-solid fa-plus w-6"></i>
                <span class="text-sm font-medium">Créer Visite</span>
            </a>
            <a href="guide_booking.php" class="flex items-center px-8 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
                <i class="fa-solid fa-ticket w-6"></i>
                <span class="text-sm font-medium">Réservations</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="h-20 bg-[#0a0a0a] border-b border-white/5 flex items-center justify-between px-8">
            <h1 class="font-serif text-2xl text-white font-bold">Nouvelle Expédition</h1>
            <div class="flex items-center gap-4 text-sm">
                <div id="ind-step1" class="flex items-center gap-2 text-gold font-bold transition-all">
                    <span class="w-6 h-6 rounded-full border border-gold flex items-center justify-center text-xs">1</span>
                    <span>Informations</span>
                </div>
                <div class="w-10 h-[1px] bg-gray-700"></div>
                <div id="ind-step2" class="flex items-center gap-2 text-gray-600 transition-all">
                    <span class="w-6 h-6 rounded-full border border-gray-700 flex items-center justify-center text-xs">2</span>
                    <span>Parcours (Étapes)</span>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 bg-[#0a0a0a]">
            
            <form action="process_tour.php" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
                
                <div id="step1" class="fade-in space-y-8">
                    
                    <div class="bg-dark-panel border border-white/10 rounded-xl p-8">
                        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Média</h3>
                        <div class="flex items-start gap-6">
                            <div class="w-32 h-32 bg-black border border-gray-700 rounded-lg overflow-hidden flex items-center justify-center relative group">
                                <img id="imgPreview" class="w-full h-full object-cover hidden">
                                <i id="imgIcon" class="fa-solid fa-image text-2xl text-gray-600"></i>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm text-gray-400 mb-2">Image de couverture</label>
                                <input type="file" name="cover_image" onchange="previewImage(this)" class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gold file:text-black hover:file:bg-white cursor-pointer">
                                <p class="text-xs text-gray-600 mt-2">Format: JPG, PNG. Max: 5MB.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-dark-panel border border-white/10 rounded-xl p-8">
                        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Détails Principaux</h3>
                        
                        <div class="grid grid-cols-1 gap-6 mb-6">
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Titre de la visite</label>
                                <input type="text" name="title" required placeholder="Ex: Safari Nocturne" class="dash-input w-full rounded-lg px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Description</label>
                                <textarea name="description" rows="3" class="dash-input w-full rounded-lg px-4 py-3 text-sm"></textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Date & Heure</label>
                                <input type="datetime-local" name="date" required class="dash-input w-full rounded-lg px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Durée (Minutes)</label>
                                <input type="number" name="duration" placeholder="90" class="dash-input w-full rounded-lg px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Prix (DH)</label>
                                <input type="number" name="price" placeholder="150" class="dash-input w-full rounded-lg px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Capacité Max</label>
                                <input type="number" name="capacity" placeholder="20" class="dash-input w-full rounded-lg px-4 py-3 text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="goToStep(2)" class="bg-gold text-black font-bold px-8 py-3 rounded shadow hover:bg-white transition flex items-center gap-2">
                            Suivant : Définir le Parcours <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div id="step2" class="fade-in hidden space-y-8">
                    
                    <div class="bg-dark-panel border border-white/10 rounded-xl p-8">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest">Le Parcours</h3>
                                <p class="text-xs text-gray-400 mt-1">Définissez les étapes clés de la visite pour vos clients.</p>
                            </div>
                            <button type="button" onclick="addStep()" class="text-xs border border-gold text-gold px-3 py-1.5 rounded hover:bg-gold hover:text-black transition">
                                <i class="fa-solid fa-plus mr-1"></i> Ajouter une étape
                            </button>
                        </div>

                        <div id="stepsContainer" class="space-y-4">
                            
                            <div class="step-item bg-black border border-gray-800 rounded-lg p-4 relative">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold rounded-l-lg"></div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-[10px] uppercase text-gray-500 font-bold">Titre de l'étape</label>
                                        <input type="text" name="steps[0][title]" placeholder="Ex: Rencontre avec les Lions" class="bg-transparent border-b border-gray-700 w-full text-white text-sm py-1 focus:border-gold focus:outline-none">
                                    </div>
                                    <div class="w-32">
                                        <label class="text-[10px] uppercase text-gray-500 font-bold">Durée (min)</label>
                                        <input type="number" name="steps[0][duration]" placeholder="15" class="bg-transparent border-b border-gray-700 w-full text-white text-sm py-1 focus:border-gold focus:outline-none">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <input type="text" name="steps[0][desc]" placeholder="Description de l'activité..." class="bg-transparent text-gray-500 text-xs w-full focus:outline-none">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <button type="button" onclick="goToStep(1)" class="text-gray-500 hover:text-white transition flex items-center gap-2">
                            <i class="fa-solid fa-arrow-left"></i> Retour
                        </button>
                        <button type="submit" class="bg-green-600 text-white font-bold px-8 py-3 rounded shadow hover:bg-green-500 transition flex items-center gap-2">
                            <i class="fa-solid fa-check"></i> Finaliser et Publier
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <script>
        // 1. Wizard Logic
        function goToStep(stepNumber) {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const ind1 = document.getElementById('ind-step1');
            const ind2 = document.getElementById('ind-step2');

            if(stepNumber === 2) {
                step1.classList.add('hidden');
                step2.classList.remove('hidden');
                
                // Update Indicators
                ind1.classList.remove('text-gold', 'font-bold');
                ind1.classList.add('text-gray-600');
                
                ind2.classList.remove('text-gray-600');
                ind2.classList.add('text-gold', 'font-bold');
            } else {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');

                // Update Indicators
                ind2.classList.remove('text-gold', 'font-bold');
                ind2.classList.add('text-gray-600');
                
                ind1.classList.remove('text-gray-600');
                ind1.classList.add('text-gold', 'font-bold');
            }
        }

        // 2. Image Preview Logic
        function previewImage(input) {
            const preview = document.getElementById('imgPreview');
            const icon = document.getElementById('imgIcon');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 3. Dynamic Steps Logic
        let stepCount = 1;
        function addStep() {
            const container = document.getElementById('stepsContainer');
            const newStep = document.createElement('div');
            newStep.className = 'step-item bg-black border border-gray-800 rounded-lg p-4 relative fade-in';
            newStep.innerHTML = `
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-gray-700 rounded-l-lg"></div>
                <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500"><i class="fa-solid fa-trash text-xs"></i></button>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="text-[10px] uppercase text-gray-500 font-bold">Titre de l'étape</label>
                        <input type="text" name="steps[${stepCount}][title]" placeholder="Nouvelle étape" class="bg-transparent border-b border-gray-700 w-full text-white text-sm py-1 focus:border-gold focus:outline-none">
                    </div>
                    <div class="w-32">
                        <label class="text-[10px] uppercase text-gray-500 font-bold">Durée (min)</label>
                        <input type="number" name="steps[${stepCount}][duration]" placeholder="0" class="bg-transparent border-b border-gray-700 w-full text-white text-sm py-1 focus:border-gold focus:outline-none">
                    </div>
                </div>
                <div class="mt-2">
                    <input type="text" name="steps[${stepCount}][desc]" placeholder="Description..." class="bg-transparent text-gray-500 text-xs w-full focus:outline-none">
                </div>
            `;
            container.appendChild(newStep);
            stepCount++;
        }
    </script>
</body>
</html>