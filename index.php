<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="relative py-16 md:py-20 bg-gradient-to-br from-amber-900 via-amber-800 to-yellow-900 text-white rounded-lg mb-8 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 max-w-6xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-center">Zoo Virtuel ASSAD</h1>
        <p class="text-xl md:text-2xl mb-8 text-center">Découvrez Asaad – Le majestueux Lion des Atlas</p>
        
        <div class="grid md:grid-cols-2 gap-8 items-center mt-10">
            <div class="text-left">
                <h2 class="text-3xl font-bold mb-4">Le roi des montagnes</h2>
                <p class="mb-4 text-amber-100">Le Lion de l'Atlas, également connu sous le nom de lion de Barbarie, est une sous-espèce éteinte à l'état sauvage qui habitait autrefois les montagnes de l'Atlas en Afrique du Nord.</p>
                <p class="mb-6 text-amber-100">Symbolisant la force et la noblesse, Asaad est l'ambassadeur de cette espèce légendaire dans notre zoo virtuel.</p>
                <a href="#caracteristiques" class="inline-block bg-amber-600 hover:bg-amber-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 transform hover:scale-105">Découvrir ses caractéristiques</a>
            </div>
            <div class="relative">
                <img src="https://i.pinimg.com/1200x/ac/42/1c/ac421cca69b8cff7eafc983b26c279e2.jpg" 
                     alt="Lion des Atlas - Asaad" 
                     class="mx-auto rounded-xl shadow-2xl border-4 border-amber-500 transform hover:scale-105 transition duration-500">
                <div class="absolute -bottom-4 -right-4 bg-amber-700 text-white px-4 py-2 rounded-lg shadow-lg">
                    <span class="font-bold">Asaad</span> - Mâle, 8 ans
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pattern overlay -->
    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-black/20 to-transparent"></div>
</section>

<!-- Characteristics Section -->
<section id="caracteristiques" class="py-10 mb-10 bg-gradient-to-r from-gray-50 to-amber-50 rounded-lg">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 text-amber-900">Caractéristiques du Lion des Atlas</h2>
        <p class="text-center text-gray-600 mb-10">Une sous-espèce unique avec des traits distinctifs</p>
        
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-600">
                <div class="text-amber-600 text-4xl mb-4">🦁</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Apparence distinctive</h3>
                <p class="text-gray-600">Plus grand et plus massif que les autres lions africains, avec une crinière épaisse et sombre qui s'étend souvent sur le ventre.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-600">
                <div class="text-amber-600 text-4xl mb-4">🗺️</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Habitat historique</h3>
                <p class="text-gray-600">Originaire des montagnes de l'Atlas au Maroc, en Algérie et en Tunisie. Adapté aux climats montagneux plus froids que la savane africaine.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-600">
                <div class="text-amber-600 text-4xl mb-4">📜</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Statut de conservation</h3>
                <p class="text-gray-600">Éteint à l'état sauvage depuis les années 1940. Seuls des descendants subsistent en captivité, faisant de chaque individu une précieuse relique génétique.</p>
            </div>
        </div>
        
        <!-- Facts Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
            <div class="bg-amber-800 text-white p-4">
                <h3 class="text-2xl font-bold">Fiche technique d'Asaad</h3>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg mb-3 text-amber-800">Informations générales</h4>
                        <ul class="space-y-2">
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Nom scientifique:</span>
                                <span class="text-gray-700">Panthera leo leo</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Taille:</span>
                                <span class="text-gray-700">2,7 - 3,1 m (mâle)</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Poids:</span>
                                <span class="text-gray-700">180 - 270 kg</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Longévité:</span>
                                <span class="text-gray-700">20-25 ans en captivité</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-3 text-amber-800">Particularités</h4>
                        <ul class="space-y-2">
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Crinière:</span>
                                <span class="text-gray-700">Épaisse et étendue</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Régime alimentaire:</span>
                                <span class="text-gray-700">Carnivore strict</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Tempérament:</span>
                                <span class="text-gray-700">Majestueux et calme</span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="font-medium">Date d'arrivée:</span>
                                <span class="text-gray-700">15 mars 2019</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conservation Section -->
<section class="py-10 mb-10 bg-gradient-to-b from-green-900 to-green-800 text-white rounded-lg">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Protection et conservation</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Le Lion des Atlas est un symbole de la biodiversité perdue. Notre programme de conservation vise à préserver la mémoire génétique de cette espèce emblématique.</p>
        
        <div class="grid md:grid-cols-3 gap-8 mt-10">
            <div class="bg-green-800/50 p-6 rounded-xl">
                <div class="text-4xl mb-4">🧬</div>
                <h3 class="text-xl font-bold mb-3">Programme génétique</h3>
                <p>Participation à un programme international de préservation du patrimoine génétique du Lion des Atlas.</p>
            </div>
            
            <div class="bg-green-800/50 p-6 rounded-xl">
                <div class="text-4xl mb-4">📚</div>
                <h3 class="text-xl font-bold mb-3">Éducation</h3>
                <p>Sensibilisation du public à l'importance de la conservation des espèces menacées à travers notre zoo virtuel.</p>
            </div>
            
            <div class="bg-green-800/50 p-6 rounded-xl">
                <div class="text-4xl mb-4">🤝</div>
                <h3 class="text-xl font-bold mb-3">Partenariats</h3>
                <p>Collaboration avec des organisations internationales pour la protection des grands félins en Afrique.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-10 text-center bg-gradient-to-r from-amber-100 to-yellow-100 rounded-lg mb-10">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6 text-amber-900">Explorez notre zoo virtuel</h2>
        <p class="text-lg mb-8 text-gray-700">Rencontrez d'autres animaux africains et découvrez leurs histoires uniques.</p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="animaux.php" class="bg-amber-700 hover:bg-amber-800 text-white font-bold px-8 py-4 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                Voir tous les animaux
            </a>
            <a href="#" class="bg-white hover:bg-gray-100 text-amber-700 font-bold px-8 py-4 rounded-lg text-lg transition duration-300 border-2 border-amber-700 transform hover:scale-105">
                Visite virtuelle (360°)
            </a>
        </div>
        
        <div class="mt-10 pt-8 border-t border-amber-300">
            <p class="text-gray-600 mb-2">Suivez les aventures d'Asaad au quotidien</p>
            <a href="#" class="inline-flex items-center text-amber-700 font-bold hover:text-amber-800">
                <span class="mr-2">📱</span> Voir le journal de bord d'Asaad
            </a>
        </div>
    </div>
</section>

