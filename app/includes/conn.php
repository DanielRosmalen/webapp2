<?php
try {
    $pdo = new PDO(
        "mysql:host=db;dbname=tegna_travels;charset=utf8mb4",
        "root", "rootpassword");
}
catch (Exception $e) {
    echo "Error: Kon geen verbinding maken met database";
}
