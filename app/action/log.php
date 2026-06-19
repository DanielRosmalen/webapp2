<?php
session_start();
include '../includes/conn.php';

if(isset($_SESSION['ingelogd'])){
    header('location: ../account.php');
    exit;
}

    $email = $_POST['email'];
    $password = $_POST['password'];
try {
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $users = $stmt->fetch();

    if ($users) {
        $_SESSION['ingelogd'] = true;
        $_SESSION['id'] = $users['id'];
        header('Location: ../index.php');
        exit;
    } else {
        echo "onjuist wachtwoord of email.";
        echo "<a href='../wachtwoord.php'>Wachtwoord vergeten?</a>";
    }
} catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw.";
}


?>