<?php
session_start();
include 'conn.php';

$user_id = $_SESSION['id'];
$trip_id = $_POST['trip_id'];

$sql = "INSERT INTO boekingen (user_id, trip_id) VALUES (:user_id, :trip_id)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id, 'trip_id' => $trip_id]);
header('Location: index.php');
exit;
?>
