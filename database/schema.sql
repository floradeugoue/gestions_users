-- Création de la table des rôles (d'abord)
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name ENUM('admin', 'client') NOT NULL DEFAULT 'client'
);

-- Création de la table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    pswd VARCHAR(255) NOT NULL,
    image_u VARCHAR(255) DEFAULT NULL,
    role_id INT, -- Renommé pour être plus explicite
    status_u ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);

-- Création de la table des sessions
CREATE TABLE IF NOT EXISTS sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT NOT NULL,           
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    logout_time TIMESTAMP NULL,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Insertion des rôles
INSERT INTO roles (role_name) VALUES 
('admin'),
('client');

-- Insertion des utilisateurs avec des mots de passe bcrypt valides
INSERT INTO users (username, email, pswd, image_u, role_id, status_u, created_at) VALUES 
('Flora', 'flora@example.com', '$2y$10$VbCwHh9mTlFT3wGPeY2xu.6pX8l', 'flora.jpg', 1, 'active', '2021-01-01 08:00:00'),
('Maurice', 'maurice@example.com', '$2y$10$PkkA4kDhnc2OZrru.CSTyOdVv3O', 'maurice.jpg', 2, 'inactive', '2021-01-01 08:00:00');

-- Insertion des sessions utilisateurs
INSERT INTO sessions (user_id, login_time, logout_time) VALUES 
(1, '2021-01-01 08:00:00', '2021-01-01 12:00:00'),
(2, '2021-01-01 08:00:00', '2021-01-01 12:00:00');