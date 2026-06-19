<?php
session_start();
include '../includes/conn.php';

$boeking_id = $_POST['boeking_id'];

try {
    $sql = "DELETE FROM boekingen WHERE id = :boeking_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':boeking_id', $boeking_id);
    $stmt->execute();
    header("Location: ../account.php");
    exit;
} catch (PDOException $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}
?>
