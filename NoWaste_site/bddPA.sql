#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        ID_Utilisateurs Int NOT NULL AUTO_INCREMENT,
        Nom             Varchar (255) NOT NULL ,
        Prenom          Varchar (255) NOT NULL ,
        Email           Varchar (255) NOT NULL ,
        Role            Int NOT NULL ,
        Rue             Varchar (255) NOT NULL ,
        Numero          Int NOT NULL ,
        Code_Postal     Char (5) NOT NULL ,
        Ville           Varchar (255) NOT NULL ,
        Pass            Varchar (255) NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (ID_Utilisateurs)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Centre
#------------------------------------------------------------

CREATE TABLE Centre(
        ID_Centre   Int NOT NULL AUTO_INCREMENT,
        Rue         Varchar (255) NOT NULL ,
        Numero      Int NOT NULL ,
        Ville       Varchar (255) NOT NULL ,
        Code_Postal Char (5) NOT NULL
	,CONSTRAINT Centre_PK PRIMARY KEY (ID_Centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Transport
#------------------------------------------------------------

CREATE TABLE Transport(
        ID_Transport Int NOT NULL AUTO_INCREMENT,
        Autonomie    Int NOT NULL ,
        Cout         Int NOT NULL ,
        Volumetrie   Int ,
        Status       Int NOT NULL ,
        Role         Int NOT NULL ,
        ID_Centre    Int NOT NULL
	,CONSTRAINT Transport_PK PRIMARY KEY (ID_Transport)

	,CONSTRAINT Transport_Centre_FK FOREIGN KEY (ID_Centre) REFERENCES Centre(ID_Centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Liste_Produit
#------------------------------------------------------------

CREATE TABLE Liste_Produit(
        ID_Produit      Int NOT NULL AUTO_INCREMENT,
        Url             Varchar (5) NOT NULL ,
        Date            Date NOT NULL ,
        Quantite        Int ,
        Status          Int NOT NULL ,
        Type            Int NOT NULL ,
        ID_Transport    Int NOT NULL ,
        ID_Utilisateurs Int NOT NULL
	,CONSTRAINT Liste_Produit_PK PRIMARY KEY (ID_Produit)

	,CONSTRAINT Liste_Produit_Transport_FK FOREIGN KEY (ID_Transport) REFERENCES Transport(ID_Transport)
	,CONSTRAINT Liste_Produit_Utilisateurs0_FK FOREIGN KEY (ID_Utilisateurs) REFERENCES Utilisateurs(ID_Utilisateurs)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stock
#------------------------------------------------------------

CREATE TABLE Stock(
        ID_Stock   Int NOT NULL AUTO_INCREMENT,
        Url        Varchar (255) NOT NULL ,
        Peremption Date NOT NULL ,
        Quantite   Int NOT NULL
	,CONSTRAINT Stock_PK PRIMARY KEY (ID_Stock)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Society
#------------------------------------------------------------

CREATE TABLE Society(
        ID_Society  Int NOT NULL AUTO_INCREMENT,
        Nom         Varchar (255) NOT NULL ,
        Tel         Char (10) NOT NULL ,
        Numero      Int NOT NULL ,
        Rue         Varchar (255) NOT NULL ,
        Ville       Varchar (255) NOT NULL ,
        Code_Postal Char (5) NOT NULL
	,CONSTRAINT Society_PK PRIMARY KEY (ID_Society)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contient
#------------------------------------------------------------

CREATE TABLE Contient(
        ID_Stock  Int NOT NULL AUTO_INCREMENT,
        ID_Centre Int NOT NULL
	,CONSTRAINT Contient_PK PRIMARY KEY (ID_Stock,ID_Centre)

	,CONSTRAINT Contient_Stock_FK FOREIGN KEY (ID_Stock) REFERENCES Stock(ID_Stock)
	,CONSTRAINT Contient_Centre0_FK FOREIGN KEY (ID_Centre) REFERENCES Centre(ID_Centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        ID_Centre       Int NOT NULL AUTO_INCREMENT,
        ID_Utilisateurs Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (ID_Centre,ID_Utilisateurs)

	,CONSTRAINT Appartenir_Centre_FK FOREIGN KEY (ID_Centre) REFERENCES Centre(ID_Centre)
	,CONSTRAINT Appartenir_Utilisateurs0_FK FOREIGN KEY (ID_Utilisateurs) REFERENCES Utilisateurs(ID_Utilisateurs)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Manage
#------------------------------------------------------------

CREATE TABLE Manage(
        ID_Society      Int NOT NULL AUTO_INCREMENT,
        ID_Utilisateurs Int NOT NULL
	,CONSTRAINT Manage_PK PRIMARY KEY (ID_Society,ID_Utilisateurs)

	,CONSTRAINT Manage_Society_FK FOREIGN KEY (ID_Society) REFERENCES Society(ID_Society)
	,CONSTRAINT Manage_Utilisateurs0_FK FOREIGN KEY (ID_Utilisateurs) REFERENCES Utilisateurs(ID_Utilisateurs)
)ENGINE=InnoDB;

