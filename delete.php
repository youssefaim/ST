<?php
    require_once "db.php";
    $id = $_GET['id'];
    $query = $conn->prepare('DELETE FROM etudiant WHERE ID=?');
    $exe = $query->execute([$id]);
    header('location: index.php');
?>
