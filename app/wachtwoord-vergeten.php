<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email = $_POST['email'];

$users = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetch();

if ($users) {
    echo "verander wachtwoord";
} else {
    echo "geen geldig email";
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
<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <button type="submit">Wachtwoord vergeten</button>
</form>
</body>
</html>
