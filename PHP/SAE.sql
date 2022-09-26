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
)