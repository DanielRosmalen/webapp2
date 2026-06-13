<?php
include 'conn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $pdo->query("INSERT INTO users (email, password, name) VALUES ('$email', '$password', '$name')");
    header('location: login.php');
    exit;
}
?>