<?php
session_start();
include 'conn.php';

$boeking_id = $_POST['boeking_id'];

$sql = "DELETE FROM boekingen WHERE id = :boeking_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['boeking_id' => $boeking_id]);
header("Location: account.php");
exit;
?>
