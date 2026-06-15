<?php
session_start();
include "conn.php";

$user_id = $_SESSION['id'];
$onderwerp = $_POST['onderwerp'];
$sterren = $_POST['sterren'];
$review = $_POST["review"];

$sql = "INSERT INTO reviews (user_id, sterren, onderwerp, beschrijving) VALUES (:user_id, :sterren, :onderwerp, :review)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id, 'sterren' => $sterren, 'onderwerp' => $onderwerp, 'review' => $review]);
header("Location: account.php");
exit;
