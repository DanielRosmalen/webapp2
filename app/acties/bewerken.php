<?php
include './acties/conn.php';
$locatie = $_POST['locatie'];
$land = $_POST['land'];
$prijs = $_POST['prijs'];
$duur = $_POST['duur'];
$beschrijving = $_POST['beschrijving'];
$foto = $_POST['foto'];
$id = $_POST['id'];
$sql = "UPDATE trips SET locatie = :locatie, land = :land, prijs = :prijs, 
duur = :duur, beschrijving = :beschrijving, foto = :foto WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':locatie', $locatie);
$stmt->bindParam(':land', $land);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':duur', $duur);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':foto', $foto);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('location: admin.php?trips');
exit;
?>