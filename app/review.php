<?php
session_start();
include "conn.php";

$user_id = $_SESSION['id'];
$onderwerp = $_POST['onderwerp'];
$sterren = $_POST['sterren'];
$review = $_POST["review"];

$pdo->query("INSERT INTO reviews (user_id, sterren, onderwerp, beschrijving) VALUES ('$user_id', '$sterren', '$onderwerp', '$review')");
header("Location: account.php");
exit;
