<?php
include 'includes/header.php';
include 'includes/db.php';

$id = (int)$_GET['id'];
$sql = "SELECT * FROM animaux WHERE id=$id";
$res = $conn->query($sql);
$animal = $res->fetch_assoc();

if(!$animal){
    echo "<p>Animal non trouvé</p>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-3xl font-bold mb-4"><?php echo $animal['nom']; ?></h2>
    <img src="assets/images/<?php echo $animal['image']; ?>" alt="<?php echo $animal['nom']; ?>" class="rounded-lg w-full mb-4 h-64 object-cover">
    <p><strong>Espèce:</strong> <?php echo $animal['espece']; ?></p>
    <p><strong>Alimentation:</strong> <?php echo $animal['alimentation']; ?></p>
    <p><strong>Pays d'origine:</strong> <?php echo $animal['paysorigine']; ?></p>
    <p><strong>Description:</strong> <?php echo $animal['descriptioncourte']; ?></p>
    <a href="animaux.php" class="inline-block mt-4 bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">Retour à la liste</a>
</div>

