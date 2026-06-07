<?php
session_start();
include 'conn.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->fetch();

    if ($users) {
        $_SESSION['ingelogd'] = true;
        header('Location: index.php');
        exit;
    } else {
        echo "onjuist wachtwoord of email.";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

<div>
    <a href="register.php">Nog geen account?</a>
</div>

</body>
</html>
