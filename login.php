<?php
include 'includes/header.php';
include 'includes/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    
}
?>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow mt-10">
    <h2 class="text-2xl font-bold mb-4">Connexion</h2>
    <?php if(isset($error)) echo "<p class='text-red-500 mb-2'>$error</p>"; ?>
    <form method="post" class="space-y-4">
        <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded" required>
        <input type="password" name="password" placeholder="Mot de passe" class="w-full border p-2 rounded" required>
        <button class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800 transition">Se connecter</button>
    </form>
</div>

