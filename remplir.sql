/*Remplissage de la table option*/
INSERT INTO OPTION (codeopt, nomopt) VALUES
    ("AGE", "Administration et gestion des entreprises"), ("AGRO", "Agronomie"),
    ("RIT", "Réseaux Informatiques et Télécommunications"),
    ("SIL", "Systèmes Informatiques et Logiciels");

/*Remplissage de la table etudiant*/
INSERT INTO ETUDIANT (codeopt, nom, prenom, date_naissance, sexe, ville) VALUES
    ("SIL", "ADIMI", "Jean", "1997-08-10", "M", "Cotonou"),
    ("RIT", "SOGLO", "Bernard", "1994-09-12", "M", "Porto-Novo"),
    ("AGRO", "DOSSOU", "Brice", "1995-12-04", "M", "Cotonou"),
    ("SIL", "CHABI SIKA", "Eric", "1993-11-25", "M", "Parakou"),
    ("SIL", "DOSSOU", "Chantal", "1994-02-18", "F", "Abomey"),
    ("SIL", "ZINSOU", "Jules", "1996-08-21", "M", "Ouidah"),
    ("AGE", "ALAO", "Mariam", "1996-04-30", "F", "Porto-Novo"),
    ("SIL", "CHABI SIKA", "Juliette", "1996-05-10", "F", "Bohicon");
