<?php
if (!isset($_SESSION['ingelogd'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['id'];
try {
$sql = "SELECT boekingen.id AS boeking_id, trips.*
         FROM boekingen
         JOIN trips ON boekingen.trip_id = trips.id
         WHERE boekingen.user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$boekingen  = $stmt->fetchAll();
}
catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}

try {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $users = $stmt->fetch();
}
catch (Exception $e) {
    "Er ging iets fout, probeer het opnieuw";
}
?>