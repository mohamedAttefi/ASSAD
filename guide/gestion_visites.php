<?php
include '../includes/header.php';
include '../includes/db.php';



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? 0;
    $titre = $_POST['titre'];
    $dateheure = $_POST['dateheure'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $langue = $_POST['langue'];
    $capacite_max = $_POST['capacite_max'];
    $statut = $_POST['statut'];


}


$result = $conn->query("SELECT * FROM visitesguidees ORDER BY dateheure DESC");
?>

<h2 class="text-3xl font-bold mb-4">Gestion des visites guidées</h2>

<form method="post" class="space-y-2 mb-6 max-w-lg bg-white p-4 rounded shadow">
    <input type="hidden" name="id">
    <input type="text" name="titre" placeholder="Titre" class="w-full border p-2 rounded" required>
    <input type="datetime-local" name="dateheure" class="w-full border p-2 rounded" required>
    <input type="text" name="duree" placeholder="Durée" class="w-full border p-2 rounded" required>
    <input type="number" name="prix" placeholder="Prix" class="w-full border p-2 rounded" required>
    <input type="text" name="langue" placeholder="Langue" class="w-full border p-2 rounded" required>
    <input type="number" name="capacite_max" placeholder="Capacité max" class="w-full border p-2 rounded" required>
    <select name="statut" class="w-full border p-2 rounded">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Enregistrer</button>
</form>

<table class="w-full table-auto bg-white rounded-lg shadow">
    <thead class="bg-green-700 text-white">
        <tr>
            <th class="px-4 py-2">Titre</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-t text-center">
            <td class="px-4 py-2"><?php echo $row['titre']; ?></td>
            <td class="px-4 py-2"><?php echo $row['dateheure']; ?></td>
            <td class="px-4 py-2">
                <a href="?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:underline">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

