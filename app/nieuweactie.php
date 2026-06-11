<?php
session_start();
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$adminUsername = $_POST['username'];
$adminPassword = $_POST['password'];

$admin = $pdo -> query("SELECT * FROM users WHERE name = '$adminUsername' AND password = '$adminPassword'")->fetch();
if ($admin) {
    $_SESSION['admin'] = true;
    header('Location: admin.php');
    exit();
}else {
    echo "Invalid username or password.";
}
}
?>