<?php
include './acties/conn.php';
$sql = "SELECT * FROM reviews";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reviews = $stmt->fetchAll();

$sql = "SELECT * FROM boekingen";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$boekingen = $stmt->fetchAll();

$sql = "SELECT * FROM trips";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$trips = $stmt->fetchAll();
