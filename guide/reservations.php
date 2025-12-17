<?php
include '../includes/header.php';
include '../includes/db.php';



$sql = "SELECT r.nbpersonnes, r.datereservation, u.nom, u.email
        FROM reservations r
        JOIN utilisateurs u ON r.idutilisateur = u.id
        ";
$result = $conn->query($sql);
?>

<h2 class="text-3xl font-bold mb-4">Réservations de la visite</h2>

<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Visiteur</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Nb Personnes</th>
            <th class="px-4 py-2">Date Réservation</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-t text-center">
            <td class="px-4 py-2"><?php echo $row['nom']; ?></td>
            <td class="px-4 py-2"><?php echo $row['email']; ?></td>
            <td class="px-4 py-2"><?php echo $row['nbpersonnes']; ?></td>
            <td class="px-4 py-2"><?php echo $row['datereservation']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

