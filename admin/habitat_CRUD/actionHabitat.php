<?php
include '../../includes/db.php';

if (isset($_POST['ajouterHabitat'])) {
    $sql = "INSERT INTO habitats 
        (nom, typeclimat, description, zonezoo)
        VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $nom = $_POST['nom'];
    $typeclimat = $_POST['typeclimat'];
    $zonezoo = $_POST['zonezoo'];
    $description = $_POST['description'];



    $stmt->bind_param(
        "ssss",
        $nom,
        $typeclimat,
        $zonezoo,
        $description
    );

    echo $sql;

    if ($stmt->execute()) {
        echo "Animal ajouté avec succès 🐾";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header('location: ../gestion_habitats.php');
    exit;
}


if (isset($_POST['modifierHabitat'])) {

    $id = (int) $_POST['modifierHabitat'];

    if (!empty($_POST['nom'])) {
        $nom = $_POST['nom'];
        $modifier = "UPDATE habitats SET nom = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $nom, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['typeclimat'])) {
        $espece = $_POST['typeclimat'];
        $modifier = "UPDATE habitats SET typeclimat = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $typeclimat, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['zonezoo'])) {
        $alimentation = $_POST['zonezoo'];
        $modifier = "UPDATE habitats SET zonezoo = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $zonezoo, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['description'])) {
        $image = $_POST['description'];
        $modifier = "UPDATE habitats SET description = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $description, $id);
        $stmtMod->execute();
    }


    header('location: ../gestion_habitats.php');
    exit;
}
