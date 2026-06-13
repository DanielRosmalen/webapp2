<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    $users = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetch();

    if ($users) {
        $pdo->query("UPDATE users SET password = '$wachtwoord' WHERE email = '$email'");
        echo "<h1>Wachtwoord geupdate!</h1>";
    } else {
        echo "<h1>Er bestaat geen account met de door u ingevoerde email</h1>";
    }
}