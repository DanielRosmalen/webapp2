<?php
session_start();
include 'conn.php';

 $sql = "SELECT * FROM trips";
 $stmt = $pdo->prepare($sql);
 $stmt->execute();
 $trips = $stmt->fetchAll();

$search = '%' . ($_GET['search'] ?? ' '). '%' ;

 $sql = "SELECT * FROM trips WHERE land LIKE :search";
 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':search', $search);
 $stmt->execute();
 $tripsearch = $stmt->fetchAll();

$sql = "SELECT * FROM reviews
        JOIN users ON reviews.user_id = users.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reviews = $stmt->fetchAll();

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
<nav class="navbar">
    <div class="container">
        <div class="logo">
            <img src="assets/tegna_logo.png" alt="logo">
        </div>
        <div class="menu">
        <a href="index.html" class="">Bestemmingen</a>
        <a href="index.html" class="">Ervaringen</a>
        <a href="index.html" class="">Over ons</a>
        <a href="index.html" class="">Boek</a>
        </div>
        <?php if (!isset($_SESSION['ingelogd'])) {
        echo '<div class="login">';
            echo '<a href="login.php">Inloggen</a>';
            echo '<a href="#" class="btn">Boek je reis</a>';
        echo '</div>';
       } ?>
        <?php if (isset($_SESSION['ingelogd'])) {
            echo '<div class="login">';
            echo '<a href="account.php">Mijn Account</a>';
            echo '<a href="#" class="btn">Boek je reis</a>';
            echo '</div>';
        } ?>
    </div>
</nav>

<header class="header">
    <div class="header-content">
        <h1>Reizen die u <span class="highlight">nooit</span> ergens anders zult vinden.</h1>
        <h2>Tegna Travels ontwerpt reizen voor wie warmte, water en een traag
            soort luxe zoekt â€” van privÃ©-villa's in de Cycladen tot stille
            rifkampen in de Indische Oceaan.</h2>
    </div>
</header>

<form class="search-bar" method="get" action="">
    <div class="search-tabs">
        <button type="button" class="tab tab-active">Reizen</button>
        <button type="button" class="tab">PrivÃ© villa's</button>
        <button type="button" class="tab">Cruises</button>
        <button type="button" class="tab">Op maat</button>
    </div>

    <div class="search-fields">

        <div class="search-field">
                <input type="text" class="search" name="search" placeholder="Zoek een reis voor...">
        </div>

        <div class="search-field">
            <label for="vertek">Vertrek</label>
            <input type="date" name="vertek" id="vertek">
        </div>

        <div class="search-field">
            <label for="terug">Terug</label>
            <input type="date" name="terug" id="terug">
        </div>

        <div class="search-field">
            <label for="reizigers">Reizigers</label>
            <select name="reizigers" id="reizigers">
                <option value="1">1 Volwassenen</option>
                <option value="2">2 Volwassenen</option>
                <option value="3">3 Volwassenen</option>
                <option value="4">4 Volwassenen</option>
            </select>
        </div>

        <button type="submit" class="search-button">Zoeken</button>
    </div>
</form>

<?php

    if (isset($_GET['search'])) { ?>
        <div class="results">
      <?php foreach ($tripsearch as $trip) { ?>
              <div class="result-item">
                <h1><?php echo $trip['land'] ?></h1>
                <h2><?php echo $trip['locatie'] ?></h2>
                <p><?php echo $trip['beschrijving'] ?></p>
              </div>
       <?php } ?>
        </div>
   <?php } ?>

<div class="location-container">
    <div class="location-text">
        <h1>Plekken om <span class="highlight-2">te <br>
                dromen</span>  <br>
            en te boeken.</h1>

        <div class="location-text-right">
        <h2>Een selectie van onze meest geboekte bestemmingen. <br>
            Blader door de kaarten en kies waar uw volgende reis <br>
            begint.</h2>

            <div class="pictures-slides">
    <button type="button" class="arrow-button">
        <img src="assets/Vector.png" alt="">
    </button>
    <h3 id="counter">1</h3>
                <span> / </span>
                <h3 id="total"><?php echo count($trips) ?></h3>
    <button type="button" class="arrow-button-2">
        <img src="assets/Vector.png" alt="">
    </button>
            </div>
        </div>
    </div>

    <div class="destinations-track">

        <?php foreach ($trips as $trip) : ?>

    <div class="destination-card">
        <img src="assets/<?php echo $trip['foto'] ?>" alt="<?php echo $trip['locatie'] ?>">
        <div class="destination">
            <div class="destination-header">
                <h1><?php echo $trip['locatie'] ?></h1>
                <h3>€<?php echo number_format($trip['prijs'], 0, ',', '.')?></h3>
            </div>
       <div class="destination-sub">
           <h4><?php echo $trip['land'] ?></h4>
           <h4>v.a. p.p. / <?php echo $trip['duur'] ?></h4>
       </div>
           <h2><?php echo $trip['beschrijving'] ?></h2>
        </div>
        <?php
        if (isset($_SESSION['ingelogd'])) { ?>
            <form method="post" action="boek.php">
                <input type="hidden" name="trip_id" value="<?php echo $trip['id']; ?>">
                <button type="submit" name="boek" class="boek-button">Boek Reis</button>
            </form>
      <?php } ?>
    </div>

    <?php endforeach; ?>
    </div>

</div>

<div class="review-slides">
    <button type="button" class="arrow-button-3">
        <img src="assets/Vector.png" alt="">
    </button>
    <h3 id="counter-2">1</h3>
    <span> / </span>
    <h3 id="total-reviews"><?php echo count($reviews) ?></h3>
    <button type="button" class="arrow-button-4">
        <img src="assets/Vector.png" alt="">
    </button>
</div>

<div class="review-container">
    <div class="reviews-track">
        <?php foreach ($reviews as $review) { ?>
            <div class="review-card">
                <h2 class="review-name"><?php echo $review['name'] ?></h2>
                <h3 class="review-subject"><?php echo $review['onderwerp'] ?></h3>
            <div class="review-stars">
        <?php for ($i = 0; $i < $review['sterren']; $i++ ) { ?>
            <img src="assets/star.png" alt="ster" width="30" height="30">
        <?php } ?>
            </div>
                <p class="review-desc"><?php echo $review['beschrijving'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>


<script src="script.js" defer></script>
</body>
</html>
