<?php
require_once '../controllers/AuthController.php';

$auth = new AuthController();
$auth->register();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>