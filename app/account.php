<?php
session_start();

include 'conn.php';
include 'log.php';

$user_id = $_SESSION['id'];

$boekingen = $pdo->query("SELECT boekingen.id AS boeking_id, trips.*
                            FROM boekingen
                            JOIN trips ON boekingen.trip_id = trips.id
                            WHERE boekingen.user_id = '$user_id'")->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    foreach ($boekingen as $boeking) { ?>
<div class="destination-card">
    <img src="assets/<?php echo $boeking['foto'] ?>" alt="<?php echo $boeking['locatie'] ?>">
    <div class="destination">
        <div class="destination-header">
            <h1><?php echo $boeking['locatie'] ?></h1>
            <h3>€<?php echo number_format($boeking['prijs'], 0, ',', '.')?></h3>
        </div>
        <div class="destination-sub">
            <h4><?php echo $boeking['land'] ?></h4>
            <h4>v.a. p.p. / <?php echo $boeking['duur'] ?></h4>
        </div>
        <h2><?php echo $boeking['beschrijving'] ?></h2>
    </div>
    <form method="post" action="annuleren.php">
        <input type="hidden" name="boeking_id" value="<?php echo $boeking['boeking_id']; ?>">
        <button type="submit" name="cancel" class="cancel-button">Annuleer Reis</button>
    </form>
</div>
<?php } ?>

<div>
    <form method="post">
        <button type="submit" name="loguit">uitloggen</button>
    </form>
</div>
</body>
</html>
