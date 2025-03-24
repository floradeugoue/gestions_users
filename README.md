# 📌 Projet Gestion des Utilisateurs

## 📖 Introduction
Ce projet vise à développer un **système de gestion des utilisateurs** en respectant une approche **itérative et versionnée avec Git/GitHub**. L'architecture repose sur le modèle **MVC (Modèle-Vue-Contrôleur)** pour une meilleure organisation du code.

---

## 🏗️ Architecture du Projet

```
/projet_gestion_utilisateurs
├── /app
│   ├── /controllers  # Contrôleurs (logique métier)
│   ├── /models       # Modèles (interaction avec la base de données)
│   ├── /views        # Vues (interface utilisateur)
│   ├── /helpers      # Fonctions d'aide
├── /config           # Configuration du projet
├── /core             # Classes centrales du framework
├── /database         # Scripts SQL et gestion de la base de données
├── /public
│   ├── index.php     # Point d'entrée de l'application
│   ├── /assets       # CSS, JS, images, etc.
├── .gitignore        # Fichiers et dossiers ignorés par Git
├── README.md         # Documentation du projet
```

---

## 🚀 Installation

### 🔹 Prérequis
- **PHP** (>= 7.4 recommandé)
- **MySQL** ou un autre SGBD compatible
- **Composer** pour la gestion des dépendances
- **Git** pour le versionnement du projet

### 🔹 Étapes d'installation
1. **Cloner le projet**
   ```bash
   git clone https://github.com/floradeugoue/projet_gestion_utilisateurs.git
   ```
2. **Se déplacer dans le dossier du projet**
   ```bash
   cd projet_gestion_utilisateurs
   ```
3. **Installer les dépendances avec Composer** (si applicable)
   ```bash
   composer install
   ```
4. **Configurer l'environnement**
   - Dupliquer le fichier `.env.example` en `.env`
   - Modifier les informations de connexion à la base de données

5. **Lancer l'application (serveur PHP intégré)**
   ```bash
   php -S localhost:8000 -t public
   ```

---

## 📌 Versionnement Git

Le projet suit une structure de branches organisée :
- **main** : Contient la version stable et validée
- **develop** : Branche de développement intégrant les nouvelles fonctionnalités
- **feature/*** : Branches spécifiques pour chaque nouvelle fonctionnalité

Exemple de workflow Git :
```bash
git checkout -b feature/nouvelle-fonction
# Développement...
git add .
git commit -m "Ajout d'une nouvelle fonctionnalité"
git push origin feature/nouvelle-fonction
```

Une fois terminé, la branche `feature/nouvelle-fonction` sera fusionnée dans `develop`, puis validée avant d’être intégrée à `main`.

---

## 📅 Roadmap

✅ **Version 1.0.0 : Initialisation du projet**  
🔜 **Version 1.1.0 : Mise en place de la base de données**  
🔜 **Version 1.2.0 : Authentification et gestion des sessions**  
🔜 **Version 1.3.0 : Gestion des rôles et permissions**  

---

## 🤝 Contribuer
Les contributions sont les bienvenues ! Voici comment vous pouvez aider :
1. **Forker** le projet
2. Créer une **branche feature**
3. **Commiter** vos modifications
4. Ouvrir une **pull request**

---

## 📜 Licence
Ce projet est sous licence **MIT** – voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

## 📧 Contact
📌 Développé par **Flora Deugoué**  
📧 Email : [floradeugoue@example.com](mailto:floradeugoue@example.com)  
🔗 GitHub : [floradeugoue](https://github.com/floradeugoue)