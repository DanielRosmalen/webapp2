<?php
session_start();
include 'conn.php';

$user_id = $_SESSION['id'];
$trip_id = $_POST['trip_id'];

$sql = "INSERT INTO boekingen (user_id, trip_id) VALUES (:user_id, :trip_id)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':trip_id', $trip_id);
$stmt->execute();
header('Location: index.php');
exit;
?>
