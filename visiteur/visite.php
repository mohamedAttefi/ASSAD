<?php
include '../includes/header.php';
include '../includes/db.php';

$visite = $conn->query("SELECT * FROM visitesguidees")->fetch_assoc();

if(!$visite){
    echo "<p>Visite non trouvée</p>";
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nbpersonnes = (int)$_POST['nbpersonnes'];
    $user_id = $_SESSION['user_id'] ?? 0;

 
}
?>

<h2 class="text-3xl font-bold mb-4"><?php echo $visite['titre']; ?></h2>
<p>Date et heure: <?php echo $visite['dateheure']; ?></p>
<p>Durée: <?php echo $visite['duree']; ?></p>
<p>Prix: <?php echo $visite['prix']; ?> DH</p>
<p>Langue: <?php echo $visite['langue']; ?></p>
<p>Capacité: <?php echo $visite['capacite_max']; ?></p>

<form method="post" class="mt-4 space-y-2 max-w-md">
    <input type="number" name="nbpersonnes" placeholder="Nombre de personnes" class="w-full border p-2 rounded" min="1" max="<?php echo $visite['capacite_max']; ?>" required>
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Réserver</button>
</form>

