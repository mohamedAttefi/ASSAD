<?php
include '../includes/header.php';
include '../includes/db.php';

$visite = $conn->query("SELECT * FROM visitesguidees")->fetch_assoc();

if(!$visite){
    echo "<div class='max-w-6xl mx-auto px-4 py-16 text-center'>
            <div class='text-6xl mb-6 text-gray-400'>🔍</div>
            <h2 class='text-3xl font-bold text-gray-700 mb-4'>Visite non trouvée</h2>
            <p class='text-gray-600 mb-8'>La visite que vous recherchez n'existe pas ou a été supprimée.</p>
            <a href='visites.php' class='inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition'>
                Voir toutes les visites
            </a>
          </div>";
    include '../includes/footer.php';
    exit;
}

// Formater la date
$date_formatted = date('d F Y', strtotime($visite['dateheure']));
$heure_formatted = date('H:i', strtotime($visite['dateheure']));
$date_complete = date('l d F Y à H:i', strtotime($visite['dateheure']));
$date_complete = str_replace(
    ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
    $date_complete
);
?>

<!-- Hero Section -->
<section class="relative py-12 bg-gradient-to-br from-green-900 via-emerald-800 to-green-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-600 rounded-full -translate-y-32 translate-x-32 opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-600 rounded-full translate-y-48 -translate-x-48 opacity-20"></div>
    
    <div class="relative max-w-6xl mx-auto px-4 z-10">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-2/3">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <span class="text-sm font-medium">Visite Guidée</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight"><?php echo htmlspecialchars($visite['titre']); ?></h1>
                <p class="text-xl text-green-100 mb-6 max-w-2xl">Réservez votre place pour une expérience unique au Zoo Virtuel ASSAD</p>
                
                <div class="flex flex-wrap gap-4 mt-8">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <p class="text-sm text-green-200">Date</p>
                            <p class="font-semibold"><?php echo $date_complete; ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm text-green-200">Durée</p>
                            <p class="font-semibold"><?php echo $visite['duree']; ?> minutes</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-6 h-6 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <p class="text-sm text-green-200">Prix</p>
                            <p class="font-semibold"><?php echo number_format($visite['prix'], 2); ?> DH</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 md:mt-0">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-full mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                            </svg>
                        </div>
                        <p class="text-2xl font-bold"><?php echo number_format($visite['prix'], 2); ?> DH</p>
                        <p class="text-green-200">par personne</p>
                    </div>
                    <div class="text-center">
                        <div class="text-sm text-green-200 mb-2">Places disponibles</div>
                        <div class="text-3xl font-bold"><?php echo $visite['capacite_max']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contenu principal -->
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Formulaire de réservation -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                <div class="flex items-center mb-8">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <span class="text-green-600 text-2xl">🎫</span>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">Réserver cette visite</h2>
                        <p class="text-gray-600">Choisissez le nombre de participants</p>
                    </div>
                </div>
                
                <form method="post" class="space-y-8">
                    <!-- Sélection du nombre de personnes -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">
                            Nombre de personnes *
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <?php for ($i = 1; $i <= min(8, $visite['capacite_max']); $i++): ?>
                                <label class="relative">
                                    <input type="radio" 
                                           name="nbpersonnes" 
                                           value="<?php echo $i; ?>" 
                                           class="sr-only peer"
                                           <?php echo $i == 1 ? 'checked' : ''; ?>>
                                    <div class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-green-300">
                                        <span class="text-2xl font-bold text-gray-700"><?php echo $i; ?></span>
                                        <span class="text-sm text-gray-500 mt-1">personne<?php echo $i > 1 ? 's' : ''; ?></span>
                                    </div>
                                </label>
                            <?php endfor; ?>
                            
                            <!-- Option personnalisée -->
                            <label class="relative md:col-span-2">
                                <input type="radio" 
                                       name="nbpersonnes" 
                                       value="custom" 
                                       id="custom-option"
                                       class="sr-only peer">
                                <div class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-green-300">
                                    <div class="flex items-center">
                                        <span class="text-2xl font-bold text-gray-700 mr-2">Autre</span>
                                        <input type="number" 
                                               id="custom-input"
                                               min="1" 
                                               max="<?php echo $visite['capacite_max']; ?>" 
                                               placeholder="Nombre"
                                               class="w-20 px-2 py-1 border border-gray-300 rounded text-center text-lg font-bold disabled:bg-gray-100"
                                               disabled>
                                    </div>
                                    <span class="text-sm text-gray-500 mt-1">Jusqu'à <?php echo $visite['capacite_max']; ?> places</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Résumé de la réservation -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Résumé de votre réservation</h3>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-700">Visite : <?php echo htmlspecialchars($visite['titre']); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo $date_complete; ?></p>
                                </div>
                                <span class="font-bold text-gray-800"><?php echo number_format($visite['prix'], 2); ?> DH</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-700" id="personnes-label">1 personne</p>
                                    <p class="text-sm text-gray-500">Prix par personne</p>
                                </div>
                                <span class="font-bold text-gray-800" id="total-personnes"><?php echo number_format($visite['prix'], 2); ?> DH</span>
                            </div>
                            
                            <div class="border-t border-gray-300 pt-4">
                                <div class="flex justify-between items-center">
                                    <p class="text-lg font-bold text-gray-800">Total</p>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-green-600" id="total-price"><?php echo number_format($visite['prix'], 2); ?> DH</p>
                                        <p class="text-sm text-gray-500">TVA incluse</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bouton de réservation -->
                    <div>
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-5 px-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-lg">
                            <span class="flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                                Confirmer la réservation
                            </span>
                        </button>
                        
                        <p class="text-center text-sm text-gray-500 mt-4">
                            En cliquant, vous acceptez nos 
                            <a href="#" class="text-green-600 hover:text-green-800 font-medium">conditions générales</a>
                        </p>
                    </div>
                </form>
            </div>
            
            <!-- Description de la visite -->
            <?php if (!empty($visite['description'])): ?>
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">À propos de cette visite</h3>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed"><?php echo nl2br(htmlspecialchars($visite['description'])); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Sidebar avec informations -->
        <div class="space-y-6">
            <!-- Card Informations -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Informations pratiques
                </h3>
                
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Lieu</p>
                            <p class="text-sm text-gray-600">Plateforme de visioconférence Zoom</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Langue</p>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($visite['langue']); ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Accès</p>
                            <p class="text-sm text-gray-600">Lien envoyé par email après réservation</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Garantie</p>
                            <p class="text-sm text-gray-600">Annulation gratuite jusqu'à 24h avant</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Guide -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl shadow-lg p-6 border border-green-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Votre guide</h3>
                
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-xl">G</span>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Guide Expert</p>
                        <p class="text-sm text-gray-600">Spécialiste des animaux africains</p>
                    </div>
                </div>
                
                <p class="text-sm text-gray-700 mb-4">
                    Notre guide vous accompagnera tout au long de la visite avec des explications détaillées et passionnées.
                </p>
                
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Plus de 500 visites guidées</span>
                </div>
            </div>
            
            <!-- Card Avis -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Avis des participants</h3>
                
                <div class="flex items-center mb-4">
                    <div class="flex">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.922-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        <?php endfor; ?>
                    </div>
                    <span class="ml-2 font-bold text-gray-800">4.8/5</span>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-gray-800">Marie D.</p>
                            <div class="flex text-yellow-400 text-sm mb-1">
                                ★★★★★
                            </div>
                            <p class="text-sm text-gray-600">"Visite passionnante, le guide était incroyable!"</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-gray-800">Jean P.</p>
                            <div class="flex text-yellow-400 text-sm mb-1">
                                ★★★★☆
                            </div>
                            <p class="text-sm text-gray-600">"Très instructif, je recommande!"</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="block text-center mt-4 text-green-600 hover:text-green-800 font-medium text-sm">
                    Voir tous les avis
                </a>
            </div>
            
            <!-- Card Partage -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-lg p-6 border border-blue-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Partager cette visite</h3>
                <p class="text-sm text-gray-600 mb-4">Invitez vos amis à participer avec vous !</p>
                
                <div class="flex space-x-3">
                    <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                    
                    <button class="flex-1 bg-blue-400 hover:bg-blue-500 text-white py-2 rounded-lg font-medium transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.213c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Gestion de la sélection du nombre de personnes
const personOptions = document.querySelectorAll('input[name="nbpersonnes"]');
const customInput = document.getElementById('custom-input');
const customOption = document.getElementById('custom-option');
const prixUnitaire = <?php echo $visite['prix']; ?>;

// Mise à jour des totaux
function updateTotals(nbPersonnes) {
    if (!nbPersonnes || nbPersonnes < 1) {
        nbPersonnes = 1;
    }
    
    // Mettre à jour l'affichage
    const personnesLabel = document.getElementById('personnes-label');
    const totalPersonnes = document.getElementById('total-personnes');
    const totalPrice = document.getElementById('total-price');
    
    const total = prixUnitaire * nbPersonnes;
    
    personnesLabel.textContent = nbPersonnes + ' personne' + (nbPersonnes > 1 ? 's' : '');
    totalPersonnes.textContent = total.toFixed(2) + ' DH';
    totalPrice.textContent = total.toFixed(2) + ' DH';
}

// Écouter les changements sur les boutons radio
personOptions.forEach(option => {
    option.addEventListener('change', function() {
        if (this.value === 'custom') {
            customInput.disabled = false;
            customInput.focus();
            customInput.value = '';
        } else {
            customInput.disabled = true;
            customInput.value = '';
            updateTotals(parseInt(this.value));
        }
    });
});

// Écouter les changements sur l'input personnalisé
customInput.addEventListener('input', function() {
    if (customOption.checked) {
        const value = parseInt(this.value) || 0;
        const max = <?php echo $visite['capacite_max']; ?>;
        
        if (value > max) {
            this.value = max;
            updateTotals(max);
        } else if (value < 1) {
            this.value = 1;
            updateTotals(1);
        } else {
            updateTotals(value);
        }
    }
});

// Validation du formulaire


// Initialiser les totaux
document.addEventListener('DOMContentLoaded', function() {
    updateTotals(1);
    
    // Animation pour les cartes
    const cards = document.querySelectorAll('.bg-white, .bg-gradient-to-r');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

