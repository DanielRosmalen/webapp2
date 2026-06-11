<?php
session_start();
include 'conn.php';

$user_id = $_SESSION['id'];
$trip_id = $_POST['trip_id'];

$pdo->query("INSERT INTO boekingen (user_id, trip_id) VALUES ('$user_id', '$trip_id')");
header('Location: index.php');
exit;
?>
