<?php
session_start();
include 'conn.php';

if(isset($_SESSION['ingelogd'])){
    header('location: account.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->fetch();

    if ($users) {
        $_SESSION['ingelogd'] = true;
        $_SESSION['id'] = $users['id'];
        header('Location: index.php');
        exit;
    } else {
        echo "onjuist wachtwoord of email.";
        echo "<a href='wachtwoord.php'>Wachtwoord vergeten?</a>";
    }

}
?>