<?php
include '../includes/db.php';

if (isset($_POST['ajouterAnimal'])) {
    $sql = "INSERT INTO animaux 
        (nom, espece, alimentation, image, paysorigine, descriptioncourte, id_habitat)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Variables
    $nom = $_POST['nom'];
    $espece = $_POST['espece'];
    $alimentation = $_POST['alimentation'];
    $image = $_POST['image'];
    $paysorigine = $_POST['paysorigine'];
    $descriptioncourte = $_POST['descriptioncourte'];
    $id_habitat = $_POST['id_habitat'];


    $stmt->bind_param(
        "ssssssi",
        $nom,
        $espece,
        $alimentation,
        $image,
        $paysorigine,
        $descriptioncourte,
        $id_habitat
    );

    echo $sql;

    if ($stmt->execute()) {
        echo "Animal ajouté avec succès 🐾";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header('location: ../gestion_animaux.php');
    exit;
}


if (isset($_POST['modifierAnimal'])) {

    $id = (int) $_POST['modifierAnimal'];

    if (!empty($_POST['nom'])) {
        $nom = $_POST['nom'];
        $modifier = "UPDATE animaux SET nom = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $nom, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['espece'])) {
        $espece = $_POST['espece'];
        $modifier = "UPDATE animaux SET espece = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $espece, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['alimentation'])) {
        $alimentation = $_POST['alimentation'];
        $modifier = "UPDATE animaux SET alimentation = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $alimentation, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['image'])) {
        $image = $_POST['image'];
        $modifier = "UPDATE animaux SET image = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $image, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['id_habitat'])) {
        $id_habitat = (int) $_POST['id_habitat'];
        $modifier = "UPDATE animaux SET id_habitat = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("ii", $id_habitat, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['descriptioncourte'])) {
        $descriptioncourte = $_POST['descriptioncourte'];
        $modifier = "UPDATE animaux SET descriptioncourte = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $descriptioncourte, $id);
        $stmtMod->execute();
    }

    if (!empty($_POST['paysorigine'])) {
        $paysorigine = $_POST['paysorigine'];
        $modifier = "UPDATE animaux SET paysorigine = ? WHERE id = ?";
        $stmtMod = $conn->prepare($modifier);
        $stmtMod->bind_param("si", $paysorigine, $id);
        $stmtMod->execute();
    }
    header('location: ../gestion_animaux.php');
    exit;
}

