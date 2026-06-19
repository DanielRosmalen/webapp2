<?php
session_start();
include '../includes/conn.php';

$user_id = $_SESSION['id'];
$onderwerp = $_POST['onderwerp'];
$sterren = $_POST['sterren'];
$review = $_POST["review"];
try {
    $sql = "INSERT INTO reviews (user_id, sterren, onderwerp, beschrijving) VALUES (:user_id, :sterren, :onderwerp, :review)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':sterren', $sterren);
    $stmt->bindParam(':onderwerp', $onderwerp);
    $stmt->bindParam(':review', $review);
    $stmt->execute();
    header("Location: ../account.php");
    exit;
} catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw.";
}
