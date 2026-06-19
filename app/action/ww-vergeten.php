<?php
include '../includes/conn.php';

    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];
try {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $users = $stmt->fetch();

    if ($users) {
        $sql = "UPDATE users SET password = :wachtwoord WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header("location: ../login.php");
        exit;
    } else {
        echo "<h1>Er bestaat geen account met de door u ingevoerde email</h1>";
    }
} catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw.";
}
