# 🦁 Zoo Virtuel ASSAD – CAN 2025

## 📌 Présentation du projet

À l’occasion de la **Coupe d’Afrique des Nations 2025 organisée au Maroc**, le projet **Zoo Virtuel ASSAD** vise à promouvoir la **biodiversité africaine**, avec un accent particulier sur le **Lion de l’Atlas (Asaad)**, à travers une **plateforme web éducative et interactive**.

Le site permet aux **supporters de football**, **familles** et **visiteurs** de découvrir les animaux africains, leurs habitats, leur statut de conservation, et de participer à des **visites guidées virtuelles**.

---

## 🎯 Objectifs

- Sensibiliser à la faune africaine et à sa protection  
- Mettre en valeur le Lion de l’Atlas  
- Proposer des parcours éducatifs interactifs  
- Associer **culture, sport et technologie**  
- Mettre en pratique les compétences de **développement web full-stack**

---

## 👥 Rôles utilisateurs

### 🦊 Visiteur
- Consulter la liste des animaux (images, pays, habitats)
- Filtrer les animaux par habitat et pays africain
- Consulter la fiche spéciale **« Asaad – Lion de l’Atlas »**
- Rechercher des visites guidées
- Réserver une visite guidée
- Laisser un commentaire et une note après une visite

### 🧭 Guide
- Créer, modifier et annuler des visites guidées
- Définir :
  - Titre
  - Date et heure
  - Durée
  - Prix
  - Langue
  - Capacité maximale
- Ajouter des **étapes de visite (parcours)** en masse
- Consulter les réservations de ses visites

### 🛠️ Administrateur
- Compte **unique et hardcodé** dans la base de données
- Gestion des utilisateurs :
  - Activation / désactivation
  - Validation du rôle Guide
- CRUD complet :
  - Animaux
  - Habitats
- Consultation de statistiques :
  - Nombre total de visiteurs
  - Visiteurs par pays
  - Animaux les plus consultés
  - Visites les plus réservées

---

## ⚙️ Fonctionnalités principales

- 🔐 Authentification sécurisée (hashage des mots de passe)
- 🗂️ Gestion des rôles (Visiteur / Guide / Admin)
- 📅 Système de réservation de visites guidées
- 🧩 Parcours de visites avec étapes ordonnées
- 💬 Commentaires et notes
- 🔎 Recherche de visites
- 📊 Statistiques dynamiques
- 🧹 Validation côté serveur (Regex)
- ✨ Animations JavaScript (optionnel)

---

## 🧠 Aspects techniques

### 🔧 Technologies utilisées
- **PHP**
- **MySQL / SQL**
- **HTML / CSS**
- **JavaScript**
- **Tailwind CSS**
- **Font Awesome**

---

## 🗃️ Base de données (ERD)

### Tables principales

- **animaux**  
  `(id, nom, espece, alimentation, image, paysorigine, descriptioncourte, id_habitat)`

- **habitats**  
  `(id, nom, typeclimat, description, zonezoo)`

- **utilisateurs**  
  `(id, nom, email, role, motdepasse_hash)`

- **visitesguidees**  
  `(id, titre, dateheure, langue, capacite_max, statut, duree, prix, id_guide)`

- **etapesvisite**  
  `(id, titreetape, descriptionetape, ordreetape, id_visite)`

- **reservations**  
  `(id, idvisite, idutilisateur, nbpersonnes, datereservation)`

- **commentaires**  
  `(id, idvisite, idutilisateur, note, texte, date_commentaire)`

---

## 📐 Modélisation

- Diagramme de **cas d’utilisation UML**
- Diagramme de **classes / ERD**
- Requêtes SQL avec **jointures**
- Validation côté serveur avec **Regex**

---

## 🚀 Installation du projet

### 1️⃣ Cloner le dépôt
```bash
git clone https://github.com/votre-repo/zoo-virtuel-assad.git
