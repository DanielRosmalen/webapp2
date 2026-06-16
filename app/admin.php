<?php
include "./acties/logcontrole.php"
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/admin.css?v=<?php echo time(); ?>">
</head>

<body>
    <section class="full-container">
        <header>
            <div class="side-panel">
                <div class="side-panel-top">
                    <div class="side-titel-box">
                        <h1 class="side-titel">Tegna Travels</h1>
                    </div>
                    <div class="side-menu-box">
                        <nav class="side-menu">
                            <p>Overzicht</p>
                            <p>products</p>
                            <p>bestelingen</p>
                        </nav>
                    </div>
                </div>
                <div class="side-panel-bottom">
                    <div class="admin-logout-container">
                        <div class="user-img">
                            <img src="assets/img/user-pictogram.png" alt="user">
                        </div>
                        <div class="dropdown">admin
                            <div class="dropdown-content"><form method="post" action="../acties/logout.php">
                            <button type="submit" name="loguit">Uitloggen</button>
                        </form></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="welcome-container">
                <div class="img-container"><img src="assets/img/tropisch.jpg" alt="tropisch" class="welcome-img">
                    <h1>Welkom, admin!</h1>
                    <p>Hier vind je een overzicht van de belangrijkste functies.</p>
                </div>
            </div>
            <div class="overzicht-container">
                <div class="overzicht-box">
                    <h2>Boekingen Overzicht</h2>
                    <p>Dit is het overzicht van alle boekingen.</p>
                </div>
                <div class="overzicht-box">
                    <h2>Producten Overzicht</h2>
                    <p>Dit is het overzicht van alle producten.</p>
                </div>
                <div class="overzicht-box">
                    <h2>Klanten Overzicht</h2>
                    <p>Dit is het overzicht van alle klanten.</p>
                </div>
            </div>
            <div class="inkomende-vluchten-container">
                <h2>Inkomende Vluchten <span></span></h2>
                <p>Dit is het overzicht van inkomende vluchten.</p>
            </div>
        </main>
    </section>

</body>

</html>