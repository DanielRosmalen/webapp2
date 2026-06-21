<?php
include './conn.php';
$id = $_POST['id'];
$sql = "DELETE FROM boekingen WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('location: ../admin.php?boekingen');
exit;
?>