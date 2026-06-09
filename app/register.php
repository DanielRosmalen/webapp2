<?php
include 'conn.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $name = trim($_POST['name']);
        $pdo->query("INSERT INTO users (email, password, name) VALUES ('$email', '$password', '$name')");
        exit;
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
    <input type="text" name="name" placeholder="Naam">
    <button type="submit">Maak aan</button>
</form>

</body>
</html>
