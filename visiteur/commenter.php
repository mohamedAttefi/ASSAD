<?php
include '../includes/header.php';
include '../includes/db.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $idvisite = $_POST['idvisite'];
    $note = $_POST['note'];
    $texte = $_POST['texte'];
    $user_id = $_SESSION['user_id'];
}
?>

<h2 class="text-3xl font-bold mb-4">Ajouter un commentaire</h2>
<form method="post" class="space-y-4 max-w-md">
    <input type="number" name="idvisite" placeholder="ID Visite" class="w-full border p-2 rounded" required>
    <input type="number" name="note" min="1" max="5" placeholder="Note (1-5)" class="w-full border p-2 rounded" required>
    <textarea name="texte" placeholder="Votre commentaire" class="w-full border p-2 rounded" required></textarea>
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Envoyer</button>
</form>

