<?php
include '../includes/header.php';
include '../includes/db.php';



// Ajouter / Modifier animal
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? 0;
    $nom = $_POST['nom'];
    $espece = $_POST['espece'];
    $alimentation = $_POST['alimentation'];
    $paysorigine = $_POST['paysorigine'];
    $description = $_POST['descriptioncourte'];
    $id_habitat = $_POST['id_habitat'];
    $image = $_FILES['image']['name'] ?? null;

    
}

// Supprimer
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM animaux WHERE id=$id");
}

// Liste animaux
$result = $conn->query("SELECT * FROM animaux ORDER BY nom ASC");
?>

<h2 class="text-3xl font-bold mb-4">Gestion des Animaux</h2>

<form method="post" enctype="multipart/form-data" class="space-y-2 mb-6 bg-white p-4 rounded shadow max-w-lg">
    <input type="hidden" name="id">
    <input type="text" name="nom" placeholder="Nom" class="w-full border p-2 rounded" required>
    <input type="text" name="espece" placeholder="Espèce" class="w-full border p-2 rounded" required>
    <input type="text" name="alimentation" placeholder="Alimentation" class="w-full border p-2 rounded">
    <input type="text" name="paysorigine" placeholder="Pays d'origine" class="w-full border p-2 rounded">
    <input type="text" name="descriptioncourte" placeholder="Description" class="w-full border p-2 rounded">
    <input type="number" name="id_habitat" placeholder="ID Habitat" class="w-full border p-2 rounded">
    <input type="file" name="image" class="w-full border p-2 rounded">
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Enregistrer</button>
</form>

<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">Espèce</th>
            <th class="px-4 py-2">Pays</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-t text-center">
            <td class="px-4 py-2"><?php echo $row['nom']; ?></td>
            <td class="px-4 py-2"><?php echo $row['espece']; ?></td>
            <td class="px-4 py-2"><?php echo $row['paysorigine']; ?></td>
            <td class="px-4 py-2">
                <a href="?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:underline">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

