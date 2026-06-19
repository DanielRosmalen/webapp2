<?php
try {
$sql = "SELECT * FROM trips";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$trips = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}
try {
if (isset($_GET['search'])) {
    $search = '%' . $_GET['search']. '%' ;
    $sql = "SELECT * FROM trips WHERE land LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search);
    $stmt->execute();
    $tripsearch = $stmt->fetchAll();
} } catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}

try {
    $sql = "SELECT * FROM reviews
        JOIN users ON reviews.user_id = users.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $reviews = $stmt->fetchAll();
}
catch (Exception $e) {
    echo "Er ging iets fout, probeer het opnieuw";
}
?>