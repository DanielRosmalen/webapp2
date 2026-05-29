<?php
$pdo = new PDO(
        "mysql:host=db;dbname=tegna_travels;charset=utf8mb4",
             "root", "rootpassword",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
);

$trips = $pdo->query("SELECT * FROM trips")->fetchAll() ;
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
        <div class="login">
            <a href="#">Inloggen</a>
            <a href="#" class="btn">Boek je reis</a>
        </div>
    </div>
</nav>

<header class="header">
    <div class="header-content">
        <h1>Reizen die u <span class="highlight">nooit</span> ergens anders zult vinden.</h1>
        <h2>Tegna Travels ontwerpt reizen voor wie warmte, water en een traag
            soort luxe zoekt — van privé-villa's in de Cycladen tot stille
            rifkampen in de Indische Oceaan.</h2>
    </div>
</header>

<form class="search-bar" method="get" action="">
    <div class="search-tabs">
        <button type="button" class="tab tab-active">Reizen</button>
        <button type="button" class="tab">Privé villa's</button>
        <button type="button" class="tab">Cruises</button>
        <button type="button" class="tab">Op maat</button>
    </div>

    <div class="search-fields">

        <div class="search-field">
            <label for="bestemming">Bestemming</label>
            <select name="bestemming" id="bestemming">
                <option value="">Kies een bestemming</option>
                <?php foreach ($trips as $trip) : ?>
                <option value="<?= htmlspecialchars($trip['locatie']) ?>">
                <?= htmlspecialchars($trip['locatie']) ?>, <?= htmlspecialchars($trip['land']) ?>
                </option>
                <?php endforeach; ?>
            </select>
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
    <h3>1 / 6</h3>
    <button type="button" class="arrow-button-2">
        <img src="assets/Vector.png" alt="">
    </button>
            </div>
        </div>
    </div>

    <div class="destinations-track">

        <?php foreach ($trips as $trip) : ?>

    <div class="destination-card">
        <img src="assets/<?= htmlspecialchars($trip['foto']) ?>" alt="<?= htmlspecialchars($trip['locatie']) ?>">
        <div class="destination">
            <div class="destination-header">
                <h1><?= htmlspecialchars($trip['locatie']) ?></h1>
                <h3>€<?= number_format($trip['prijs'], 0, ',', '.') ?></h3>
            </div>
       <div class="destination-sub">
           <h4><?= htmlspecialchars($trip['land']) ?></h4>
           <h4>v.a. p.p. / <?= htmlspecialchars($trip['duur']) ?></h4>
       </div>
           <h2><?= htmlspecialchars($trip['beschrijving']) ?></h2>
        </div>
    </div>

    <?php endforeach; ?>
    </div>

</div>

<script src="script.js" defer></script>
</body>
</html>
