<?php
$host = "localhost";
$db = "ASSAD";
$user = "root";
$pass = "ME551234";
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
?>
