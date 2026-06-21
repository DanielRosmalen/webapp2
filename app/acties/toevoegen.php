<?php
include './conn.php';
$locatie = $_POST['locatie'];
$land = $_POST['land'];
$prijs = $_POST['prijs'];
$duur = $_POST['duur'];
$beschrijving = $_POST['beschrijving'];
$foto = $_POST['foto'];
$sql = "INSERT INTO trips (locatie, land, prijs, duur, beschrijving, foto) VALUES (:locatie, :land, :prijs, :duur, :beschrijving, :foto)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':locatie', $locatie);
$stmt->bindParam(':land', $land);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':duur', $duur);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':foto', $foto);
$stmt->execute();

header('location: ../admin.php?trips');
exit;