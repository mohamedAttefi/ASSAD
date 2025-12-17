<?php
include 'includes/header.php';
include 'includes/db.php';



$sql = "SELECT * FROM animaux";
$result = $conn->query($sql);
?>

<h2 class="text-3xl font-bold mb-4">Liste des animaux</h2>

<form method="get" class="flex gap-2 mb-6">
    <input type="text" name="pays" placeholder="Pays d'origine" class="border p-2 rounded">
    <input type="number" name="habitat" placeholder="ID Habitat" class="border p-2 rounded">
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Filtrer</button>
</form>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
<?php while($animal = $result->fetch_assoc()): ?>
    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
        <img src="assets/images/<?php echo $animal['image']; ?>" alt="<?php echo $animal['nom']; ?>" class="rounded-lg mb-2 w-full h-48 object-cover">
        <h3 class="text-xl font-semibold"><?php echo $animal['nom']; ?></h3>
        <p class="text-gray-600"><?php echo $animal['espece']; ?></p>
        <a href="animal.php?id=<?php echo $animal['id']; ?>" class="mt-2 text-green-700 hover:underline">Voir fiche</a>
    </div>
<?php endwhile; ?>
</div>

