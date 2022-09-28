DROP table if exists Etudiant, Prof, Patient, Scenario, Note, Medicament, Intervenant, Prescription, Diagnostic;



CREATE Table Etudiant (
    email text primary key,
    mdp text not null,
    nom text ,
    prenom text,
    classe text,
    statut text,
    Annee int
);


Create Table Prof (
    email text primary key,
    matiere text not null,
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
    CodePostal int not null
);


Create table Scenario (
    idScenario int primary key,
    email text references Prof,
    idPatient int references Patient
);

Create Table Note (
    email text references Etudiant,
    idScenario int references Scenario,
    note int not null,
    primary key (email, idScenario)
);

CREATE table Medicament(
    nom text primary key,
    CP int not null,
    prise text not null
);

Create Table Intervenant (
    idIntervenant int primary key,
    nom text not null,
    prenom text not null
);


Create table Prescription (
    idPrescription int primary key,
    prise date not null,
    medicament text references Medicament,
    idPatient int references Patient,
    intervenant int references Intervenant
);

Create table Diagnostic (
    idDiag serial primary key,
    CompteRendu text not null,
    idIntervenant int references Intervenant,
    idPatient int references Patient
);
Create table Radio (
    idRadio serial Primary Key,
     image text not null,
     idPatient int references Patient
);

Create TABLE Neuro (
    date date PRIMARY KEY ,
    t°c float not null,
    Glasgow float not null,
    EVA int not null,
    AlgoPlus int not null,
    idPatient int references Patient
);

CREATE TABLE Mobilite(
    date date primary key,
    aideALaMarche boolean not null,
    aideAuLever boolean not null,
    aideAuCoucher boolean not null,
    aideAuFauteil boolean not null,
    idPatient int references Patient
);

CREATE table MiseEnSecuite(
    date date primary key,
    barriereDeLitPrescrite boolean not null ,
    barriereDeLitConfort boolean not null ,
    ServeillanceContention boolean not null ,
    idPatient int references Patient

);

Create table Elimination(
    date date primary key,
    Selles boolean not null ,
    Gaz boolean not null ,
    Urines boolean not null ,
    idPatient int references Patient
);

Create Table Alimentation(
    date date primary key ,
    aJeun boolean not null ,
    SurveillanceHydratation boolean not null ,
    SurveillanceAlimentation boolean not null ,
    regime boolean not null ,
    AideAuRepas boolean not null ,
    idPatient int references Patient

);

CREATE table  SoinsRelationnels(
    date date primary key ,
    Accueil boolean not null ,
    EntretienInfirmer boolean not null ,
    ToucherMassage boolean not null ,
    idPatient int references Patient

);

Create table Cardio(
    date date primary key,
    TA text not null,
    pls int not null ,
    ECG text not null ,
    idPatient int references Patient

);

Create table Respi(
    date date primary key ,
    SaO2 int not null ,
    Fr int not null ,
    O2 text not null,
    idPatient int references Patient

);

Create table Hygiene(
    date date primary key ,
    Douche boolean not null ,
    Bain boolean not null ,
    refectionLit boolean not null ,
    Change boolean not null ,
    SoinDeBouche boolean not null ,
    PreventionDescare boolean not null ,
    ChangementDePos boolean not null,
    MatelasAAir boolean not null ,
    idPatient int references Patient

);

Create table Soins(
    date date primary key ,
    /* CatheterVeineuxPeriph not null ,*/
    SurveillancePerf boolean not null ,
    Pansement boolean not null,
    /*SondageUriniaire not null,*/
    SurveillanceGlycemique float not null ,
    BasDeContention boolean not null ,
    Autre text not null ,
    idPatient int references Patient

)