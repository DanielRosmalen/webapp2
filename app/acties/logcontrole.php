<?php
session_start();
if(!isset($_SESSION['rol'])) {
    header("Location: adlogg.php");
    exit();
}
?>