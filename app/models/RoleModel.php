<?php
require_once dirname(__DIR__, 2) . '/config/database.php';

class RoleModel {
    private $conn;

    // Le constructeur attend un argument : la connexion à la base de données
    public function __construct($db) {
        $this->conn = $db;  // On assigne la connexion à la propriété $conn
    }

    // Méthode pour récupérer tous les rôles disponibles
    public function getAllRoles() {
        $query = "SELECT * FROM roles";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>