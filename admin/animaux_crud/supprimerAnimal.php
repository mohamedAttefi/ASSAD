<?php
include '../includes/db.php';

if (isset($_POST['supprimerAnimal'])) {
    $id = $_POST['supprimerAnimal'];
    $sql = "delete from animaux where id = $id;";
    echo $sql;
    $res = mysqli_query($conn, $sql);
    header('location: ../gestion_animaux.php');
    exit;
}


