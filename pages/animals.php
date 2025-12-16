<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Animaux | ASSAD Zoo</title>
    
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
        /* Custom Select Styling */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C6A87C' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
    </style>
</head>
<body class="bg-dark text-gray-100 font-sans selection:bg-gold selection:text-black">

    <nav class="fixed top-0 w-full z-50 bg-black/90 backdrop-blur-md border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="../index.php" class="flex items-center gap-2">
                <i class="fa-solid fa-crown text-gold text-xl"></i>
                <span class="font-serif font-bold text-xl tracking-widest text-white">ASSAD</span>
            </a>
            <div class="hidden md:flex gap-8 text-sm uppercase tracking-wider font-medium text-gray-400">
                <a href="index.php" class="hover:text-gold transition">Accueil</a>
                <a href="pages/asaad.php" class="hover:text-gold transition">Asaad</a>
                <a href="animals.php" class="text-white border-b border-gold">Animaux</a> <a href="tours.php" class="hover:text-gold transition">Visites</a>
            </div>
            <a href="login.php" class="text-sm font-bold text-gold border border-gold px-4 py-2 rounded hover:bg-gold hover:text-black transition">Connexion</a>
        </div>
    </nav>

    <header class="pt-32 pb-10 px-6 bg-[#0a0a0a] border-b border-white/5 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full filter blur-3xl translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto text-center md:text-left">
            <h1 class="font-serif text-4xl md:text-5xl text-white font-bold mb-2">Les Résidents</h1>
            <p class="text-gray-400 max-w-2xl">
                Découvrez la faune majestueuse de l'Afrique. Utilisez les filtres ci-dessous pour explorer par habitat ou par pays d'origine.
            </p>
        </div>
    </header>

    <div class="sticky top-20 z-40 bg-[#0a0a0a]/95 backdrop-blur-sm border-b border-white/10 py-4 px-6 shadow-md">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-between">
            
            <div class="flex flex-wrap w-full md:w-auto gap-4">
                
                <div class="relative group w-full md:w-64">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-500 group-focus-within:text-gold transition"></i>
                    <input type="text" id="searchInput" placeholder="Rechercher un animal..." 
                           class="w-full bg-[#151515] border border-gray-700 text-white text-sm rounded-lg py-2.5 pl-10 pr-4 focus:outline-none focus:border-gold transition-colors">
                </div>

                <select id="habitatFilter" class="w-full md:w-48 bg-[#151515] border border-gray-700 text-gray-300 text-sm rounded-lg py-2.5 pl-4 pr-10 focus:outline-none focus:border-gold transition-colors cursor-pointer">
                    <option value="all">Tous les Habitats</option>
                    <option value="savane">Savane</option>
                    <option value="jungle">Jungle</option>
                    <option value="desert">Désert</option>
                    <option value="montagne">Montagnes de l'Atlas</option>
                    <option value="riviere">Rivière / Zone Humide</option>
                </select>

                <select id="countryFilter" class="w-full md:w-48 bg-[#151515] border border-gray-700 text-gray-300 text-sm rounded-lg py-2.5 pl-4 pr-10 focus:outline-none focus:border-gold transition-colors cursor-pointer">
                    <option value="all">Tous les Pays</option>
                    <option value="maroc">Maroc</option>
                    <option value="kenya">Kenya</option>
                    <option value="afrique_sud">Afrique du Sud</option>
                    <option value="congo">Congo</option>
                </select>
            </div>

            <div class="text-gray-500 text-sm font-medium">
                <span id="count" class="text-gold font-bold">6</span> animaux trouvés
            </div>
        </div>
    </div>

    <section class="py-12 px-6 min-h-[600px]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="animalsGrid">
            
            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg hover:shadow-gold/10"
                 data-habitat="montagne" data-country="maroc" data-name="lion atlas asaad">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60?q=80&w=1986&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute top-4 right-4 bg-gold text-black text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">Star</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Asaad</h3>
                            <p class="text-gray-500 text-xs italic">Panthera leo leo</p>
                        </div>
                        <i class="fa-solid fa-mountain text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Maroc</span>
                        <span>Montagnes</span>
                    </div>
                </div>
            </div>

            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg"
                 data-habitat="savane" data-country="kenya" data-name="elephant afrique kian">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?q=80&w=1932&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Kian</h3>
                            <p class="text-gray-500 text-xs italic">Loxodonta africana</p>
                        </div>
                        <i class="fa-solid fa-sun text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Kenya</span>
                        <span>Savane</span>
                    </div>
                </div>
            </div>

            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg"
                 data-habitat="savane" data-country="afrique_sud" data-name="girafe zola">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1541789094913-f3809a8f3ba5?q=80&w=1887&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Zola</h3>
                            <p class="text-gray-500 text-xs italic">Giraffa camelopardalis</p>
                        </div>
                        <i class="fa-solid fa-tree text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Afr. Sud</span>
                        <span>Savane</span>
                    </div>
                </div>
            </div>

            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg"
                 data-habitat="riviere" data-country="congo" data-name="crocodile nil">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1516021677334-93c0490f2378?q=80&w=2070&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Sobek</h3>
                            <p class="text-gray-500 text-xs italic">Crocodylus niloticus</p>
                        </div>
                        <i class="fa-solid fa-water text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Congo</span>
                        <span>Rivière</span>
                    </div>
                </div>
            </div>

            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg"
                 data-habitat="desert" data-country="maroc" data-name="fennec renard sables">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1570347854605-6a585e509c8e?q=80&w=2070&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Sahara</h3>
                            <p class="text-gray-500 text-xs italic">Vulpes zerda</p>
                        </div>
                        <i class="fa-solid fa-wind text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Maroc</span>
                        <span>Désert</span>
                    </div>
                </div>
            </div>

            <div class="animal-card group bg-dark-card rounded-xl overflow-hidden border border-white/5 hover:border-gold/50 transition-all duration-300 shadow-lg"
                 data-habitat="jungle" data-country="congo" data-name="gorille dos argente">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1535940587886-905c8680c656?q=80&w=2069&auto=format&fit=crop" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-serif text-2xl text-white group-hover:text-gold transition">Kong</h3>
                            <p class="text-gray-500 text-xs italic">Gorilla beringei</p>
                        </div>
                        <i class="fa-solid fa-leaf text-gray-600 group-hover:text-gold transition"></i>
                    </div>
                    <div class="w-full h-[1px] bg-gray-800 my-4"></div>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gold"></i> Congo</span>
                        <span>Jungle</span>
                    </div>
                </div>
            </div>

        </div>

        <div id="noResults" class="hidden text-center py-20">
            <i class="fa-solid fa-paw text-6xl text-gray-800 mb-4"></i>
            <h3 class="text-xl text-gray-400 font-serif">Aucun animal ne correspond à vos critères.</h3>
            <button onclick="resetFilters()" class="mt-4 text-gold hover:underline">Réinitialiser les filtres</button>
        </div>

        <div class="flex justify-center mt-12 gap-2">
            <button class="w-10 h-10 rounded border border-gray-700 text-gray-500 hover:text-white flex items-center justify-center transition disabled:opacity-50" disabled>
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="w-10 h-10 rounded bg-gold text-black font-bold flex items-center justify-center">1</button>
            <button class="w-10 h-10 rounded border border-gray-700 text-gray-400 hover:border-gold hover:text-gold transition flex items-center justify-center">2</button>
            <button class="w-10 h-10 rounded border border-gray-700 text-gray-400 hover:border-gold hover:text-gold transition flex items-center justify-center">3</button>
            <button class="w-10 h-10 rounded border border-gray-700 text-gray-400 hover:border-gold hover:text-gold transition flex items-center justify-center">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <footer class="bg-black border-t border-white/10 py-8 text-center mt-auto">
        <p class="text-gray-600 text-xs">© 2025 Zoo ASSAD.</p>
    </footer>

    <script>
        const habitatSelect = document.getElementById('habitatFilter');
        const countrySelect = document.getElementById('countryFilter');
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.animal-card');
        const noResults = document.getElementById('noResults');
        const countSpan = document.getElementById('count');

        function filterAnimals() {
            const habitat = habitatSelect.value;
            const country = countrySelect.value;
            const search = searchInput.value.toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const cardHabitat = card.dataset.habitat;
                const cardCountry = card.dataset.country;
                const cardName = card.dataset.name;

                const matchHabitat = habitat === 'all' || cardHabitat === habitat;
                const matchCountry = country === 'all' || cardCountry === country;
                const matchSearch = cardName.includes(search);

                if (matchHabitat && matchCountry && matchSearch) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            countSpan.innerText = visibleCount;
            
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }

        function resetFilters() {
            habitatSelect.value = 'all';
            countrySelect.value = 'all';
            searchInput.value = '';
            filterAnimals();
        }

        // Add Listeners
        habitatSelect.addEventListener('change', filterAnimals);
        countrySelect.addEventListener('change', filterAnimals);
        searchInput.addEventListener('input', filterAnimals);
    </script>
</body>
</html>