CREATE DATABASE instemptio;
-- drop database instemptio
USE instemptio;

/* Utilisateur*/
CREATE TABLE roles(idRole INT PRIMARY KEY AUTO_INCREMENT, nomRole VARCHAR(255))ENGINE = INNODB;		
CREATE TABLE utilisateurs (idUtilisateur INT PRIMARY KEY AUTO_INCREMENT, idRole INT, nom VARCHAR(255), prenom VARCHAR(255), nomRue VARCHAR(255), numeroRue VARCHAR(10), nomVille VARCHAR(255), codePostal VARCHAR(10), email VARCHAR(500) UNIQUE, mdp VARCHAR(255), isActive INT, FOREIGN KEY (idRole) REFERENCES roles (idRole) )ENGINE = INNODB;

/*Article*/
CREATE TABLE articles (idArticle INT PRIMARY KEY AUTO_INCREMENT, urlArticle VARCHAR(255) UNIQUE, nomArticle VARCHAR(255) UNIQUE, prixArticle NUMERIC (10,2), descriptionArticle VARCHAR(500), nomImageArticle VARCHAR(255), isActive INT)ENGINE = INNODB;
/*Commande*/
CREATE TABLE panier (idPanier INT PRIMARY KEY AUTO_INCREMENT, idUtilisateur INT, idArticle INT, FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (idUtilisateur), FOREIGN KEY (idArticle) REFERENCES articles (idArticle))ENGINE = INNODB;
CREATE TABLE statut(idStatut INT PRIMARY KEY AUTO_INCREMENT, nomStatut VARCHAR(255))ENGINE = INNODB;
CREATE TABLE enTeteCommande(idEnTeteCommande INT PRIMARY KEY AUTO_INCREMENT, idUtilisateur INT, idStatut INT, prixTotal NUMERIC (10,2), dateCommande DATETIME, FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (idUtilisateur), FOREIGN KEY (idStatut) REFERENCES statut (idStatut))ENGINE = INNODB;
CREATE TABLE detailsCommande(idDetailsCommande INT PRIMARY KEY AUTO_INCREMENT, idEnTeteCommande INT, idArticle INT, prixUnitaire NUMERIC (10,2), FOREIGN KEY (idArticle) REFERENCES articles (idArticle), FOREIGN KEY (idEnTeteCommande) REFERENCES enTeteCommande (idEnTeteCommande))ENGINE = INNODB; 

-- -----------------------------------------------------------------------------------------------------------------------

/*Utilisateur*/
INSERT INTO roles (nomRole)
	VALUES  ('SuperAdmin'),
		('Admin'),
		('Client');
				
INSERT INTO utilisateurs (idRole, nom, prenom, nomRue, numeroRue, nomVille, codePostal, email, mdp, isActive) -- /!\ Le mot de passe est projetweb pour tous
	VALUES  (1, 'SuperAdmin', 'Wendy','Rue des clocicot', '45A', 'Licorne', '0000', 'SuperAdmin.wendy@gmail.com', '$2y$10$JlaJFTprINgMLeFQrA3FhO0pGOswSbH9FjDVZbIKlOO9t2lwxar7y',1),
		(2, 'Admin', 'Wendy', 'Rue des clocicot', '45A', 'Licorne', '0000', 'Admin.wendy@gmail.com', '$2y$10$erSaLTfv4e1xAV08uRmvtun3U5ooXhCM/58O1EpgDTW6Atj73G2/.',1),
		(3, 'Client', 'Wendy', 'Rue des clocicot', '45A', 'Licorne', '0000', 'Client.wendy@gmail.com', '$2y$10$CYs4Co9bBi42jx.ct9M1e.z9uBwlRq1R7/DAL2Fei5lkw2dooLBEO',1);

		
/*Commande*/
INSERT INTO statut (nomStatut)
	VALUES  ('En cours'),
		('En attente'),
		('Envoyer');
				
/*Procédure stocké*/
DELIMITER |
CREATE PROCEDURE Commande (IN idUtilisateur INT)
BEGIN 
	DECLARE idLast INT;
	DECLARE prixTotal NUMERIC(10,2);
	/* on commence la transaction*/
	START TRANSACTION;

	SELECT SUM(a.prixArticle) INTO prixTotal
	FROM panier p
	INNER JOIN articles a 
	ON a.idArticle = p.idArticle
	WHERE idUtilisateur = idUtilisateur;
			
	 /* on crée la ligne de l'en tête*/
	INSERT INTO entetecommande (idUtilisateur, idStatut, dateCommande, prixTotal)
	VALUES (idUtilisateur, 1, NOW(), prixTotal);
	
	/* on vient mettre l'id de cette ligne dans une variables*/ 
	SET idLast= LAST_INSERT_ID();
	
	/* on crée les lignes des détails*/ 
	INSERT INTO detailscommande (idEnTeteCommande, idArticle, prixUnitaire)
	SELECT idLast, p.idArticle, a.prixArticle
	FROM panier p
	INNER JOIN articles a 
		ON a.idArticle = p.idArticle
	WHERE p.idUtilisateur = idUtilisateur;

	/* on crée le panier*/ 
	DELETE FROM panier WHERE idUtilisateur = idUtilisateur;
	 /*Si tout se passe bien, la transaction est validée*/ 
	COMMIT;
END |
DELIMITER ;