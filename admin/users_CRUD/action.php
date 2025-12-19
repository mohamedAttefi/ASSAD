<?php
include '../../includes/db.php';
if(isset($_POST['approuvee'])){
    $id = $_POST['approuvee'];
    $update = "update utilisateurs set statut = 'approuvee' where id = $id";
    $res = mysqli_query($conn, $update);
    header('location: ../gestion_utilisateurs.php');
    exit;
}
if(isset($_POST['desapprouvee'])){
    $id = $_POST['desapprouvee'];
    $update = "update utilisateurs set statut = 'desapprouvee' where id = $id";
    $res = mysqli_query($conn, $update);
    header('location: ../gestion_utilisateurs.php');
    exit;
}
if(isset($_POST['supprimerUser'])){
    $id = $_POST['supprimerUser'];
    $sql = "delete from utilisateurs where id = $id";
    $res = mysqli_query($conn, $sql);
    echo $id;
    header('location: ../gestion_utilisateurs.php');
    exit;
}
print_r($_POST);
?> 