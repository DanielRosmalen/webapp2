<?php
include '../includes/conn.php';

try {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    header('location: ../login.php');
    exit;
} catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw.";
}
?>