<?php
include './acties/overzicht.php';
$sql = "SELECT * FROM trips";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$trips = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <header>
        <div class="side-panel">
            <div class="side-panel-top">
                <div class="side-titel-box">
                    <h1 class="side-titel">Tegna Travels</h1>
                    <p class="side-subtitel">Beheerpaneel</p>
                </div>
                <div class="side-menu-box">
                    <nav class="side-menu">
                        <form method="get" class="side-menu">
                            <button type="submit" name="overzicht" class="side-menu-item actief">Overzicht</button>
                            <button type="submit" name="trips" class="side-menu-item">trips</button>
                            <button type="submit" name="reviews" class="side-menu-item">reviews</button>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="side-panel-bottom">
                <div class="admin-logout-container">
                    <div class="user-img">
                        <img src="assets/img/user-pictogram.png" alt="user">
                    </div>
                    <div class="admin-titel">admin</div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?php if (isset($_GET['overzicht']) || (!isset($_GET['trips']) && !isset($_GET['bewerken']) && !isset($_GET['verwijderen']) && !isset($_GET['toevoegen']))) { ?>
            <div class="main-topbar">
                <div>
                    <h1 class="main-titel">Overzicht</h1>
                    <p class="main-datum">16 juni 2026</p>
                </div>
                <a href="../acties/logout.php">Uitloggen</a>
            </div>

            <div class="stats-container">
                <div class="stats-box"> 
                    <p class="stats-label">Boekingen</p>
                    <h2 class="stats-cijfer"><?php echo count($boekingen); ?></h2>
                </div>
                <div class="stats-box">
                    <p class="stats-label">trips</p>
                    <h2 class="stats-cijfer"><?php echo count($trips); ?></h2>
                </div>
                <div class="stats-box">
                    <p class="stats-label">Reviews</p>
                    <h2 class="stats-cijfer"><?php echo count($reviews); ?></h2>
                </div>
            </div>
        <?php } ?>

        <?php if (isset($_GET['trips'])) { ?>
            <div class="main-topbar">
                <div>
                    <h1 class="main-titel">Trips Beheer</h1>
                    <p class="main-datum">Overzicht van alle reizen</p>
                </div>
                <form method="get">
                    <button type="submit" name="toevoegen" class="btn-toevoegen">Trip Toevoegen</button>
                </form>
            </div>
            <div class="trips-container">
                <?php foreach ($trips as $trip) { ?>
                    <div class="trip-row">
                        <span class="trip-locatie"><?php echo $trip['locatie']; ?></span>
                        <div class="trip-actions">
                            <form method="get">
                                <button type="submit" name="bewerken" value="<?php echo $trip['id']; ?>"
                                    class="btn-actie btn-bewerken">bewerken</button>
                                <button type="submit" name="verwijderen" value="<?php echo $trip['id']; ?>"
                                    class="btn-actie btn-verwijderen">verwijderen</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <?php
              if (isset($_GET['bewerken'])) {
            $id = $_GET['bewerken'];
            $stmt = $pdo->prepare("SELECT * FROM trips WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $trip = $stmt->fetch();
            ?>

        <form action="./acties/bewerken.php" method="post">
            <textarea name="locatie" id="locatie"><?php echo $trip['locatie'] ?></textarea>
            <textarea name="land" id="land"><?php echo $trip['land'] ?></textarea>
            <textarea name="prijs" id="prijs"><?php echo $trip['prijs'] ?></textarea>
            <textarea name="duur" id="duur"><?php echo $trip['duur'] ?></textarea>
            <textarea name="beschrijving" id="beschrijving"><?php echo $trip['beschrijving'] ?></textarea>
            <textarea name="foto" id="foto"><?php echo $trip['foto'] ?></textarea>
            <input type="hidden" name="id" value="<?php echo $trip['id'] ?>"></input>
            <input type="submit" name="submit"></input>
        </form>
    <?php } ?>

        <?php if (isset($_GET['verwijderen'])) {
            $id = $_GET['verwijderen'];
            $stmt = $pdo->prepare("SELECT * FROM trips WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $trip = $stmt->fetch();
            ?>
            <form action="./acties/verwijderen.php" method="post">
                <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">
                <p>Weet je zeker dat je de trip naar <?php echo $trip['locatie']; ?> wilt verwijderen?</p>
                <input type="submit" name="submit" value="Ja, verwijderen">
            </form>
        <?php } ?>

        <?php if (isset($_GET['toevoegen'])) { ?>
            <form action="./acties/toevoegen.php" method="post">
                <textarea name="locatie" id="locatie" placeholder="locatie"></textarea>
                <textarea name="land" id="land" placeholder="land"></textarea>
                <textarea name="prijs" id="prijs" placeholder="prijs"></textarea>
                <textarea name="duur" id="duur" placeholder="duur"></textarea>
                <textarea name="beschrijving" id="beschrijving" placeholder="beschrijving"></textarea>
                <textarea name="foto" id="foto" placeholder="foto"></textarea>
                <input type="submit" name="submit">
            </form>
        <?php } ?>
    </main>
</body>

</html>