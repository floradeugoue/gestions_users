<?php
require_once '../models/User.php';

class AuthController {

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username= trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $image = $_FILES['image'];
    
            // Vérification des champs vides
            if (empty($username) || empty($email) || empty($password) || empty($image['name'])) {
                die("Tous les champs sont obligatoires.");
            }
    
            // Vérification du format de l'image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
            if (!in_array($imageExtension, $allowedExtensions)) {
                die("Seuls les formats JPG, JPEG, PNG et GIF sont autorisés.");
            }
    
            // Vérifier si l'email est déjà utilisé
            $userModel = new User();
            if ($userModel->findByEmail($email)) {
                die("Cet email est déjà utilisé.");
            }
            
            // Par défaut, on attribue le rôle 'client' (role_id = 2)
            $role_id = 2;

    
            // Enregistrement de l'utilisateur avec l'image
            if ($userModel->register($username, $email, $password, $image,$role_id)) {
                session_start(); // Démarrer la session après l'inscription
                $_SESSION['username'] = $username; // Stocker le nom de l'utilisateur en session
    
                header("Location: dashbord.php");
                exit();
            } else {
                die("Erreur lors de l'inscription.");
            }
        }
    }
    
    

    // Connexion d'un utilisateur
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['pswd'];
    
            $userModel = new User();
            $user = $userModel->login($email, $password);
    
            if ($user) {
                session_start();
                $_SESSION['username'] = $user['username']; // Stocker le username en session
    
                header("Location: dashbord.php");
                exit();
            } else {
                die("Email ou mot de passe incorrect.");
            }
        }
    }
    

    // Déconnexion de l'utilisateur
    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>