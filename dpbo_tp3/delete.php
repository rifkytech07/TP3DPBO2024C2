<?php
require_once "config/db.php";
require_once "classes/AnggotaDPR.php";

$id = $_GET['id'];

$query = "DELETE FROM anggota WHERE id_anggota=$id";
$conn->query($query);

header("Location: index.php");
?>
