<?php
session_start();
include 'conn.php';

$boeking_id = $_POST['boeking_id'];

$pdo->query("DELETE FROM boekingen WHERE id = '$boeking_id'");
header("Location: account.php");
exit;
?>
