CREATE table message(
    id serial primary key,
    email text,
    userx text,
    textmessage text,
    date date,
    idgroupe int not null ,
    foreign key (idgroupe, email) references groupe(idgroupe, email) on delete cascade
);

CREATE table messageAide(
                        id serial primary key,
                        email text,
                        userx text,
                        textmessage text,
                        date date,
                        idgroupe int not null ,
                        foreign key (idgroupe) references besoindaide(idba) on delete cascade,
                        foreign key (email) references email(email)
);

CREATE TABLE Groupe (
    idGroupe serial,
    nomGroupe text,
    email text REFERENCES Etudiant(email) on delete cascade,
    primary key (idGroupe,email),
    admin boolean not null,
    sujet text not null
);

create TABLE email(
    email text primary key
);

CREATE Table Etudiant (
    email text primary key,
    mdp text not null,
    nom text ,
    prenom text,
    classe text,
    Annee int,
    Code text
);


Create Table Prof (
    email text primary key,
    matiere text ,
    mdp text not null,
    nom text not null,
    prenom text not null
);

Create Table Patient(
    idPatient serial primary key,
    nom text not null,
    prenom text not null,
    Age int not null,
    DDN date not null,
    poids int not null,
    taille int not null,
    IEP int not null,
    IPP int not null,
    sexe text not null,
    Adresse text not null,
    Ville text not null,
    CodePostal int not null,
    emailprof text references Prof
);

Create table Scenario (
    idScenario serial primary key,
    email text references Prof on delete cascade,
    idPatient int references Patient on delete cascade
);

Create Table Note (
    email text references Etudiant on delete cascade,
    idPatient int references Patient on delete cascade,
    note float not null,
    primary key (email, idPatient)
);

CREATE table Medicament(
    nom text primary key,
    CP int not null,
    prise text not null
);
Create table Prescription (
    idPrescription serial primary key,
    prise timestamp not null,
    dose int not null ,
    medicament text not null ,
    idPatient int references Patient on delete cascade,
    medecin text not null
);


Create table Radio (
    idRadio serial Primary Key,
     image text not null,
     idPatient int references Patient on delete cascade
);
Create TABLE Neuro (
    date timestamp not null ,
    t°c float ,
    Glasgow float ,
    EVA int ,
    AlgoPlus int ,
    idPatient int references Patient on delete cascade,
    primary key (date,idPatient)
);

CREATE TABLE Mobilite(
    date timestamp not null,
    aideALaMarche boolean not null,
    aideAuLever boolean not null,
    aideAuCoucher boolean not null,
    aideAuFauteil boolean not null,
    idPatient int references Patient on delete cascade,
    primary key (date, idPatient)

);

CREATE table MiseEnSecurite(
    date timestamp not null ,
    barriereDeLitPrescrite boolean not null ,
    barriereDeLitConfort boolean not null ,
    ServeillanceContention boolean not null ,
    idPatient int references Patient on delete cascade,
    primary key (date, idPatient)

);

Create table Elimination(
    date timestamp not null,
    Selles boolean not null ,
    Gaz boolean not null ,
    Urines boolean not null ,
    idPatient int references Patient on delete cascade,
    primary key (date, idPatient)
);

Create Table Alimentation(
    date timestamp not null ,
    aJeun boolean not null ,
    SurveillanceHydratation boolean not null ,
    SurveillanceAlimentation boolean not null ,
    regime boolean not null ,
    AideAuRepas boolean not null ,
    idPatient int references Patient on delete cascade,
    primary key (date , idPatient)

);


CREATE table  SoinsRelationnels(
    date timestamp not null ,
    Accueil boolean not null ,
    EntretienInfirmer boolean not null ,
    ToucherMassage boolean not null ,
    idPatient int references Patient on delete cascade ,
    primary key (date, idPatient)

);

Create table Cardio(
    date timestamp not null,
    TA text ,
    pls int  ,
    ECG text  ,
    idPatient int references Patient on delete cascade,
    primary key (date,idPatient)

);

Create table Respi(
    date timestamp not null ,
    SaO2 int  ,
    Fr int  ,
    O2 text ,
    idPatient int references Patient on delete cascade,
    primary key (date, idPatient)

);

Create table Hygiene(
    date timestamp not null ,
    toilette boolean not null,
    Douche boolean not null ,
    Bain boolean not null ,
    refectionLit boolean not null ,
    Change boolean not null ,
    SoinDeBouche boolean not null ,
    PreventionDescare boolean not null ,
    ChangementDePos boolean not null,
    MatelasAAir boolean not null ,
    idPatient int references Patient on delete cascade,
    primary key (date , idPatient)

);
Create table Soins(
    date timestamp not null ,
    SurveillancePerf boolean not null ,
    Pansement boolean not null,
    SurveillanceGlycemique float not null ,
    BasDeContention boolean not null ,
    catheter text not null,
    SondageUrinaire text not null,
    Autre text not null ,
    idPatient int references Patient on delete cascade,
    primary key (date, idPatient)

);
drop table Diagnostic;
CREATE TABLE Diagnostic
(
    idDiag      serial Primary Key,
    date        timestamp not null,
    Nom         text      not null,
    Prenom      text      not null,
    compteRendu text      not null,
    idPatient int references Patient on delete cascade


);



/* nouveau modèle de donnée*/

Create table Categorie(
    nom text primary key,
    ordreDePriorite int
);

Create table Donnee (
    idDonnee serial primary key,
    date timestamp not null,
    nom text not null,
    donnee text not null,
    idPatient int references Patient
);
Create table CategorieDonnee
(
    nom      text references Categorie on delete cascade,
    idDonnee serial references Donnee on delete cascade,
    primary key (nom,idDonnee)
);

Insert into categorie (nom) values ('Securite');
Insert into categorie (nom) values ('Soins relationnel');
Insert into categorie (nom) values ('Elimation');
Insert into categorie (nom) values ('Cardio');
Insert into categorie (nom) values ('Mobilite');
Insert into categorie (nom) values ('Hygiene');
Insert into categorie (nom) values ('Alimentation');
Insert into categorie (nom) values ('Soins');
Insert into categorie (nom) values ('Neuro');
Insert into categorie (nom) values ('Respi');


Create table GroupeClasse(
    idGroupe serial primary key ,
    nom text not null

);
Create table GroupeEtudiant(
    idGroupe int references GroupeScenario,
    email text references Etudiant,
    primary key (idGroupe,email)

);

        Create table GroupeScenario(
        idGroupe int references GroupeClasse,
        primary key (idGroupe,idPatient)

);

CREATE table BesoinDaide
(
    idBA  serial primary key,
    sujet text not null,
    email text not null
);

Create table ReponseEtu(
    idRep serial primary key ,
    email text references Etudiant,
    idPatient int references Patient,
    texte text not null

);

SELECT nom,prenom,DDN from groupescenario join groupeetudiant g on groupescenario.idgroupe = g.idgroupe join patient p on groupescenario.idpatient = p.idpatient  where email='mdangreaux11@gmail.com';

