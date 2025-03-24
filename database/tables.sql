CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    pswd VARCHAR(255) NOT NULL,
    image_u VARCHAR(255) DEFAULT NULL,
    id INT,
    status_u ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_role FOREIGN KEY (id) REFERENCES roles(id)
);

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name ENUM('admin', 'client') NOT NULL DEFAULT 'client'
);

CREATE TABLE IF NOT EXISTS sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,  -- L'ID de la session
    user_id INT NOT NULL,             -- L'ID de l'utilisateur lié à la session
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- L'heure de connexion de l'utilisateur  
    logout_time TIMESTAMP NULL,   -- L'heure de déconnexion de l'utilisateur
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(user_id)
);