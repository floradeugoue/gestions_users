<?php
require_once dirname(__DIR__, 2) . '/config/database.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($username, $email, $password, $image, $role_id) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        // Définir le dossier d'upload
        $uploadDir = __DIR__ . '/../../public/assets/uploads/'; // Adapte selon la structure de ton projet
        $imagePath = $uploadDir . basename($image['name']);
        
        // Vérifier et déplacer l'image téléchargée
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Requête d'insertion avec le rôle
            $query = "INSERT INTO users (username, email, pswd, image_u, id) 
                      VALUES (:username, :email, :mot_de_passe, :image,  :id)";
            
            $stmt = $this->conn->prepare($query);
            
            return $stmt->execute([
                'username' => $username,
                'email' => $email,
                'mot_de_passe' => $hashedPassword,
                'image' => $imagePath,
                'id' => $role_id // Ajouter le rôle ici
            ]);
        } else {
            return false; // Échec du téléchargement de l'image
        }
    }
    

    // Trouver un utilisateur par email
    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Connexion de l'utilisateur
    public function login($email, $password) {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['pswd'])) {
            return $user;
        }
        return false;
    }
}
?>