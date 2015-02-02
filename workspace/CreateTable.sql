/*Création de la table Administrateur*/

CREATE TABLE Administrateur
(
idAdministrateur INTEGER(10) PRIMARY KEY,
identifiant VARCHAR(20),
motDePasse VARCHAR(20),
niveauDeDroit VARCHAR(3) /* A DEFINIR LES DIFFÉRENTS DROIT || par défault il y a 3 rang*/ 
);

/*Création de la table Entretien */ /*ATTENTION ON EXECUTE LE FOREIGN KEY APRÈS AVOIR SAISI TOUTE LES TABLES : ALTER TABLE Entretien ADD FOREIGN KEY (idReunion) REFERENCES Reunion(idReunion) */	 

CREATE TABLE Entretien
(
idEntretien INTEGER(255) PRIMARY KEY,
etat BOOLEAN, /* 1 = Actif sinon 0*/
nomProfesseur VARCHAR(20),
idReunion INTEGER(20),
FOREIGN KEY (idReunion) REFERENCES Reunion(idReunion)
);

/*Création de la table Parent*/

CREATE TABLE Parent 
(
idParent INTEGER(255) PRIMARY KEY,
identifiant VARCHAR(20),
motDePassse VARCHAR(20),
etat VARCHAR(3), /* 3 états possible : occupé,indisponible, et disponible (trilean)*/
nom VARCHAR(20),
idAdministrateur INTEGER(10),
idEntretien INTEGER(255),
FOREIGN KEY (idAdministrateur) REFERENCES Administrateur(idAdministrateur),
FOREIGN KEY (idEntretien) REFERENCES Entretien(idEntretien)
);

/*Création de la table Eleve*/

CREATE TABLE Eleve
(
idEleve INTEGER(255) PRIMARY KEY,
nom VARCHAR(20),
prenom VARCHAR(20),
classe TEXT,
idParent INTEGER(255),
idAdministrateur INTEGER(10),
FOREIGN KEY (idAdministrateur) REFERENCES Administrateur(idAdministrateur)
);

/*Création de la table réunion*/

CREATE TABLE Reunion
(
idReunion INTEGER(20) PRIMARY KEY,
classe TEXT,
heureDeFin TIME,
heureDeDebut TIME,
date date,
etat BOOLEAN, /* 1 = réunion en déroulement , sinon 0 */
idParent INTEGER(255),
idEleve INTEGER(255),
idAdministrateur INTEGER(10),
FOREIGN KEY (idparent) REFERENCES Parent(idParent),
FOREIGN KEY (idAdministrateur) REFERENCES Administrateur(idAdministrateur)
);

/*Création de la table professeur*/

CREATE TABLE Professeur
(
idProfesseur INTEGER(100) PRIMARY KEY,
identifiant VARCHAR(20),
motDePasse VARCHAR(20),
classe TEXT,
etat VARCHAR(3), /* 3 états possible : occupé,indisponible, et disponible (trilean)*/
idAdministrateur INTEGER(10),
idEntretien INTEGER(255),
FOREIGN KEY (idAdministrateur) REFERENCES Administrateur(idAdministrateur),
FOREIGN KEY (idEntretien) REFERENCES Entretien(idEntretien)
);


CREATE TABLE Parent_Eleve
(
idParent INTEGER(255),
idEleve INTEGER(255),
FOREIGN KEY (idParent) REFERENCES Parent(idParent),
FOREIGN KEY (idEleve) REFERENCES Eleve(idEleve)
);