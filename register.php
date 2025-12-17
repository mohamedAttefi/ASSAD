<?php
include 'includes/header.php';
include 'includes/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    
}
?>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow mt-10">
    <h2 class="text-2xl font-bold mb-4">Inscription</h2>
    <form method="post" class="space-y-4">
        <input type="text" name="nom" placeholder="Nom complet" class="w-full border p-2 rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded" required>
        <input type="password" name="password" placeholder="Mot de passe" class="w-full border p-2 rounded" required>
        <select name="role" class="w-full border p-2 rounded">
            <option value="Visiteur">Visiteur</option>
            <option value="Guide">Guide</option>
        </select>
        <button class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800 transition">S'inscrire</button>
    </form>
</div>

