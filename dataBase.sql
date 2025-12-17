CREATE TABLE habitats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    typeclimat VARCHAR(100),
    description TEXT,
    zonezoo VARCHAR(100)
);

INSERT INTO habitats (nom, typeclimat, description, zonezoo) VALUES
('Savane', 'Chaud et sec', 'Grande plaine africaine habitée par les grands mammifères', 'Zone Afrique'),
('Océan', 'Marin', 'Habitat des animaux marins et côtiers', 'Zone Aquatique'),
('Jungle', 'Chaud et humide', 'Forêt tropicale dense et riche en biodiversité', 'Zone Tropicale'),
('Désert', 'Aride', 'Région sèche avec une faune adaptée aux conditions extrêmes', 'Zone Désertique');


CREATE TABLE animaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    espece VARCHAR(100),
    alimentation VARCHAR(100),
    image VARCHAR(255),
    paysorigine VARCHAR(100),
    descriptioncourte TEXT,
    id_habitat INT,
    FOREIGN KEY (id_habitat) REFERENCES habitats(id)
);

INSERT INTO animaux 
(nom, espece, alimentation, image, paysorigine, descriptioncourte, id_habitat) VALUES
('Asaad', 'Lion de l’Atlas', 'Carnivore', 'asaad.jpg', 'Maroc', 'Symbole de la faune nord-africaine', 1),
('Requin blanc', 'Carcharodon carcharias', 'Carnivore', 'requin.jpg', 'Afrique du Sud', 'Grand prédateur marin', 2),
('Singe vervet', 'Chlorocebus pygerythrus', 'Omnivore', 'singe.jpg', 'Cameroun', 'Petit singe vivant en jungle', 3),
('Fennec', 'Vulpes zerda', 'Omnivore', 'fennec.jpg', 'Maroc', 'Renard du désert aux grandes oreilles', 4);


CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    role ENUM('visiteur','guide') NOT NULL,
    motpasse_hash VARCHAR(255) NOT NULL,
    statut ENUM('actif','desactive','en_attente') DEFAULT 'en_attente'
);


INSERT INTO utilisateurs (nom, email, role, motpasse_hash, statut) VALUES
('Mohamed Attefi', 'Mohamed@gmail.com', 'visiteur', '$2y$10$testhashvisiteur1', 'actif'),
('Mohamed Lhamdaoui', 'Lhamdaoui@gmail.com', 'visiteur', '$2y$10$testhashvisiteur2', 'actif'),
('Younes Kamal', 'Younes_guide@gmail.com', 'guide', '$2y$10$testhashguide1', 'en_attente');



CREATE TABLE visitesguidees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    dateheure DATETIME NOT NULL,
    langue VARCHAR(50),
    capacite_max INT CHECK (capacite_max > 0),
    statut ENUM('active','annulee') DEFAULT 'active',
    duree INT CHECK (duree > 0),
    prix float CHECK (prix >= 0),
    id_guide INT,
    FOREIGN KEY (id_guide) REFERENCES utilisateurs(id)
);

INSERT INTO visitesguidees 
(titre, dateheure, langue, capacite_max, duree, prix, id_guide) VALUES
('Safari africain', '2025-12-30 18:00:00', 'Français', 20, 60, 50.00, 3),
('Découverte des lions', '2026-01-20 16:00:00', 'Arabe', 15, 45, 40.00, 3);



CREATE TABLE etapesvisite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titreetape VARCHAR(150),
    descriptionetape TEXT,
    ordreetape INT,
    id_visite INT,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees(id)
        
);

INSERT INTO etapesvisite 
(titreetape, descriptionetape, ordreetape, id_visite) VALUES
('Zone Savane', 'Présentation des lions et éléphants', 1, 1),
('Zone Forêt', 'Découverte des gorilles', 2, 1),
('Lion Asaad', 'Histoire du lion de l’Atlas', 1, 2);



CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idvisite INT,
    idutilisateur INT,
    nbpersonnes INT,
    datereservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idvisite) REFERENCES visitesguidees(id),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs(id)
);

ALTER TABLE reservations
MODIFY datereservation DATE;


INSERT INTO reservations (idvisite, idutilisateur, nbpersonnes) VALUES
(1, 1, 2),
(2, 2, 1);



CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idvisitesguidees INT,
    idutilisateur INT,
    note INT CHECK (note BETWEEN 1 AND 5),
    texte TEXT,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idvisitesguidees) REFERENCES visitesguidees(id),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs(id)
);

INSERT INTO commentaires (idvisitesguidees, idutilisateur, note, texte) VALUES
(1, 1, 5, 'Visite très éducative et interactive !'),
(2, 2, 4, 'Très belle présentation du lion Asaad');


select * from animaux INNER JOIN habitats ON id_habitat = habitats.id;

select nom, texte, note from commentaires INNER JOIN utilisateurs ON idutilisateur = utilisateurs.id;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    motpasse_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('actif','desactive') DEFAULT 'actif'
);



