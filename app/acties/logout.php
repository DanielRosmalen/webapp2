<?php 
session_start();

session_destroy();
header('Location: ../adlogg.php');
exit;