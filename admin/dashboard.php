<?php
include '../includes/header.php';
include '../includes/db.php';



// Statistiques
$total_visiteurs = $conn->query("SELECT COUNT(*) as total FROM utilisateurs WHERE role='Visiteur'")->fetch_assoc()['total'];
$total_animaux = $conn->query("SELECT COUNT(*) as total FROM animaux")->fetch_assoc()['total'];
$total_visites = $conn->query("SELECT COUNT(*) as total FROM visitesguidees")->fetch_assoc()['total'];
?>

<h2 class="text-3xl font-bold mb-4">Dashboard Admin</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <div class="bg-white p-4 rounded shadow text-center">
        <h3 class="text-xl font-semibold">Visiteurs</h3>
        <p class="text-2xl"><?php echo $total_visiteurs; ?></p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
        <h3 class="text-xl font-semibold">Animaux</h3>
        <p class="text-2xl"><?php echo $total_animaux; ?></p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
        <h3 class="text-xl font-semibold">Visites</h3>
        <p class="text-2xl"><?php echo $total_visites; ?></p>
    </div>
</div>

