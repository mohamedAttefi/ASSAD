<?php
include '../includes/header.php';
include '../includes/db.php';


// Ajouter / modifier
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? 0;
    $nom = $_POST['nom'];
    $typeclimat = $_POST['typeclimat'];
    $description = $_POST['description'];
    $zonezoo = $_POST['zonezoo'];

  
}

// Supprimer
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM habitats WHERE id=$id");
}

$result = $conn->query("SELECT * FROM habitats ORDER BY nom ASC");
?>

<h2 class="text-3xl font-bold mb-4">Gestion des Habitats</h2>

<form method="post" class="space-y-2 mb-6 bg-white p-4 rounded shadow max-w-lg">
    <input type="hidden" name="id">
    <input type="text" name="nom" placeholder="Nom" class="w-full border p-2 rounded" required>
    <input type="text" name="typeclimat" placeholder="Type climat" class="w-full border p-2 rounded">
    <input type="text" name="description" placeholder="Description" class="w-full border p-2 rounded">
    <input type="text" name="zonezoo" placeholder="Zone du zoo" class="w-full border p-2 rounded">
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Enregistrer</button>
</form>

<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">Type Climat</th>
            <th class="px-4 py-2">Zone Zoo</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-t text-center">
            <td class="px-4 py-2"><?php echo $row['nom']; ?></td>
            <td class="px-4 py-2"><?php echo $row['typeclimat']; ?></td>
            <td class="px-4 py-2"><?php echo $row['zonezoo']; ?></td>
            <td class="px-4 py-2">
                <a href="?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:underline">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

