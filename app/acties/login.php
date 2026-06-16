<?php
session_start();
include_once "./conn.php";


//ophalen
$email = $_POST['email'];
$password = $_POST['password'];

//versturen
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
$stmt->bindParam('email', $email);
$stmt->bindParam('password', $password);
$stmt->execute();
$users = $stmt->fetch();



if ($users) {
    $_SESSION['rol'] = $users['role'];
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../admin.php");
        exit;

    } else {
        header("Location: ../index.php");
        exit;
    }


}