<?php
session_start();

include 'conn.php';

$user_id = $_SESSION['id'];

 $sql = "SELECT boekingen.id AS boeking_id, trips.*
         FROM boekingen
         JOIN trips ON boekingen.trip_id = trips.id
         WHERE boekingen.user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$boekingen  = $stmt->fetchAll();

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
<div>
    <a href="index.php"><button id="back">Home pagina</button></a>
    <form method="GET" class="account-options">
        <button type="submit" name="boekingen" value="boekingen">Mijn Boekingen</button>
        <button type="submit" name="review" value="review">Review Plaatsen</button>
    </form>
    <form method="post" action="logout.php">
        <button type="submit" name="loguit">uitloggen</button>
    </form>
</div>
<?php
if (isset($_GET['boekingen'])) {
    if (empty($boekingen)) {
        echo '<div>Geen boekingen gevonden</div>';
    }
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
<?php } }  ?>

<?php if (isset($_GET['review'])) { ?>

<div class="form-box">
    <form method="post" action="review.php" class="form-card">
        <div class="card-title">
        <img src="assets/tegna_logo.png" alt="logo" width="100" height="39">
        <h1>Review plaatsen</h1>
        </div>
        <input type="text" name="onderwerp" id="onderwerp">
        <select name="sterren" id="sterren">
            <option value="1">1 STER</option>
            <option value="2">2 STER</option>
            <option value="3">3 STER</option>
            <option value="4">4 STER</option>
            <option value="5">5 STER</option>
        </select>
        <textarea name="review" id="review" cols="30" rows="10" placeholder="Schrijf je recensie..."></textarea>
        <input type="submit" name="submit" id="submit">
    </form>
</div>
    <?php } ?>
</body>
</html>
