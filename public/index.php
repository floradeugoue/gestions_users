<?php
session_start();

// Inclure la connexion à la base de données
require_once '../config/database.php';

// Rediriger l'utilisateur en fonction de sa session
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>