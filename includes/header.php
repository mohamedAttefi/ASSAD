<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Zoo Virtuel ASSAD</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800">
<header class="bg-green-700 text-white p-4">
    <nav class="container mx-auto flex justify-between items-center">
        <div class="font-bold text-xl">Zoo Virtuel ASSAD</div>
        <div class="space-x-4">
            <a href="../index.php" class="hover:underline">Accueil</a>
            <a href="../animaux.php" class="hover:underline">Animaux</a>
            <a href="../visites.php" class="hover:underline">Visites Guidées</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="hover:underline">Déconnexion</a>
            <?php else: ?>
                <a href="login.php" class="hover:underline">Connexion</a>
                <a href="register.php" class="hover:underline">Inscription</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main class="container mx-auto p-4">
