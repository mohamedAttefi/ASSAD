<?php
session_start();
include '../../includes/db.php';

if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    echo $id;
    $sql = "delete from visitesguidees where id = '$id'";
    mysqli_query($conn, $sql);
}
if (isset($_POST['modifier'])) {

    $id = (int) $_POST['modifier'];

    $sql = "UPDATE visitesguidees SET
        titre = ?,
        dateheure = ?,
        langue = ?,
        capacite_max = ?,
        statutVisite = ?,
        duree = ?,
        prix = ?
        WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $titre = $_POST['titre'];
    $dateheure = $_POST['dateheure'];
    $langue = $_POST['langue'];
    $capacite_max = (int) $_POST['capacite_max'];
    $statut = $_POST['statut'];
    echo $statut;
    $duree = (int) $_POST['duree'];
    $prix = (float) $_POST['prix'];

    echo $statut;

    $stmt->bind_param(
        "sssisidi",
        $titre,
        $dateheure,
        $langue,
        $capacite_max,
        $statut,
        $duree,
        $prix,
        $id
    );

    $stmt->execute();
    $stmt->close();

    // header("Location: index.php");
    // exit;
}

if (isset($_POST['ajouter'])) {
    $sql = "INSERT INTO visitesguidees 
        (titre, dateheure, langue, capacite_max, statutVisite, duree, prix, id_guide)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Variables
    $titre = $_POST['titre'];
    $dateheure = $_POST['dateheure'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $statut = $_POST['statut'];
    $capacite_max = $_POST['capacite_max'];
    $langue = $_POST['langue'];
    $id = $_SESSION['user_id'];
    echo $id;


    $stmt->bind_param(
        "sssisidi",
        $titre,
        $dateheure,
        $langue,
        $capacite_max,
        $statut,
        $duree,
        $prix,
        $id
    );

    echo $sql;

    if ($stmt->execute()) {
        echo "Animal ajouté avec succès 🐾";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
