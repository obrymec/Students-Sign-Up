/*Requête de création de la table option*/
CREATE TABLE IF NOT EXISTS OPTION (
    codeopt VARCHAR (16) PRIMARY KEY,
    nomopt VARCHAR (32) NOT NULL
) Engine = InnoDB;

/*Requête de création de la table etudiant*/
CREATE TABLE IF NOT EXISTS ETUDIANT (
    id_etu INTEGER PRIMARY KEY AUTO_INCREMENT,
    codeopt VARCHAR (16) NOT NULL,
    prenom VARCHAR (32) NOT NULL,
    date_naissance DATE NOT NULL,
    ville VARCHAR (32) NOT NULL,
    nom VARCHAR (32) NOT NULL,
    sexe CHAR (1) NOT NULL,
    FOREIGN KEY (codeopt) REFERENCES OPTION (codeopt) ON DELETE CASCADE
) Engine = InnoDB;
