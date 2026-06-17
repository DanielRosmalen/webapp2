<?php
include './acties/overzicht.php';

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
                    <p class="side-menu-item actief">Overzicht</p>
                    <p class="side-menu-item">trips</p>
                    <p class="side-menu-item">reviews</p>
                </nav>
            </div>
        </div>
        <div class="side-panel-bottom">
            <div class="admin-logout-container">
                <div class="user-img">
                    <img src="assets/img/user-pictogram.png" alt="user">
                </div>
                <div class="dropdown">admin
                </div>
            </div>
        </div>
    </div>
</header>
<main>
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
            <h2 class="stats-cijfer"><?php echo count($boekingen)?></h2>
        </div>
        <div class="stats-box">
            <p class="stats-label">trips</p>
            <h2 class="stats-cijfer"><?php echo count($trips)?></h2>
        </div>
        <div class="stats-box">
            <p class="stats-label">Revieuws</p>
            <h2 class="stats-cijfer"><?php echo count($reviews)?></h2>
        </div>
    </div>
</main>
</body>
</html>