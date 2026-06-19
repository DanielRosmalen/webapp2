<?php
session_start();
include '../includes/conn.php';

$user_id = $_SESSION['id'];
$trip_id = $_POST['trip_id'];

try {
    $sql = "INSERT INTO boekingen (user_id, trip_id) VALUES (:user_id, :trip_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':trip_id', $trip_id);
    $stmt->execute();
    header('Location: ../index.php');
    exit;
} catch (PDOException $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}
?>
