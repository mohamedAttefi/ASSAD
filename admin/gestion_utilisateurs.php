<?php
include '../includes/header.php';
include '../includes/db.php';


// Activer / Désactiver / Approuver
if(isset($_GET['toggle'])){
    $id = (int)$_GET['toggle'];
    $user = $conn->query("SELECT * FROM utilisateurs WHERE id=$id")->fetch_assoc();
    $newStatus = $user['approved'] ? 0 : 1;
    $conn->query("UPDATE utilisateurs SET approved=$newStatus WHERE id=$id");
}

// Supprimer
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM utilisateurs WHERE id=$id");
}

$result = $conn->query("SELECT * FROM utilisateurs ORDER BY role ASC, nom ASC");
?>

<h2 class="text-3xl font-bold mb-4">Gestion des Utilisateurs</h2>

<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Rôle</th>
            <th class="px-4 py-2">Approuvé</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-t text-center">
            <td class="px-4 py-2"><?php echo $row['nom']; ?></td>
            <td class="px-4 py-2"><?php echo $row['email']; ?></td>
            <td class="px-4 py-2"><?php echo $row['role']; ?></td>
            <td class="px-4 py-2"><?php echo $row['statut'] ? 'Oui' : 'Non'; ?></td>
            <td class="px-4 py-2">
                <?php if($row['role'] == 'Guide'): ?>
                    <a href="?toggle=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline"><?php echo $row['statut'] ? 'Désapprouver' : 'Approuver'; ?></a> |
                <?php endif; ?>
                <a href="?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:underline">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

