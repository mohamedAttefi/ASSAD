<?php
include '../includes/header.php';
include '../includes/db.php';



$sql = "SELECT r.id, v.titre, r.nbpersonnes, r.datereservation
        FROM reservations r
        JOIN visitesguidees v ON r.idvisite = v.id
        ";
$result = $conn->query($sql);

?>

<h2 class="text-3xl font-bold mb-4">Mes Réservations</h2>
<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Titre Visite</th>
            <th class="px-4 py-2">Nombre de personnes</th>
            <th class="px-4 py-2">Date de réservation</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="text-center border-t">
            <td class="px-4 py-2"><?php echo $row['titre']; ?></td>
            <td class="px-4 py-2"><?php echo $row['nbpersonnes']; ?></td>
            <td class="px-4 py-2"><?php echo $row['datereservation']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

