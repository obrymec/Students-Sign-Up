<?php
    /*
    * Ce script php gère les demandes (requêtes) effectuées à partir des pages "inscriptionDEC.html" et "rechercheDEC.html".
    * Ainsi l'objectif de cet script est de satisfaire les opérations suivantes:
    *   -> Récupérer la liste de toutes les options disponibles sur la base de données.
    *   -> Inscrire un étudiant(e) à partir des données récupérées de la page "inscriptionDEC.html".
    *   -> Récupérer les étudiant(e)(s) inscrit dans une option donnée.
    */

    // La ligne de code ci-dessous accomplie les objectifs de ce script.
    try {
        // Création d'une connexion vers la base de données "students_signup" en mode "root" sans mot de passe particulier.
        $db = new PDO ("mysql:host=localhost;dbname=students_signup;charset=utf8", "root", '');
        // Si l'opération à effectuée vaut: "recuperer_options".
        if ($_POST ["operation"] == "recuperer_options") {
            // Préparation de la requête de récupération des options.
            $options = $db->prepare ("SELECT DISTINCT codeopt FROM OPTION;");
            // Exécutons la requête ainsi préparée.
            $options->execute ();
            // Récupération des résultats de la requête SQL.
            $resultats = $options->fetchAll ();
            // Envoie des données à la surface.
            echo json_encode (array ("options" => $resultats));
        // Si l'opération à effectuée vaut: "rechercher_des_etudiants".
        } elseif ($_POST ["operation"] == "rechercher_des_etudiants") {
            // Préparation de la requête de récupération des étudiants.
            $etudiants_inscris = $db->prepare ("SELECT DISTINCT nom, prenom, sexe FROM ETUDIANT WHERE codeopt = :codeopt;");
            // Exécutons la requête ainsi préparée avec les données requises.
            $etudiants_inscris->execute (array ("codeopt" => $_POST ["codeopt"]));
            // Récupération des résultats de la requête SQL.
            $resultats = $etudiants_inscris->fetchAll ();
            // Envoie des données à la surface.
            echo json_encode (array ("etudiants" => $resultats));
        // Si l'opération à effectuée vaut: "inscrire_un_etudiant".
        } elseif ($_POST ["operation"] == "inscrire_un_etudiant") {
            // Préparation de la requête d'inscription d'un étudiant.
            $inscrire_un_etudiant = $db->prepare ("INSERT INTO ETUDIANT (codeopt, nom, prenom, date_naissance, sexe, ville)
                VALUES (:codeopt, :nom, :prenom, :date_naissance, :sexe, :ville);");
            // Exécutons la requête ainsi préparée avec les données requises.
            $inscrire_un_etudiant->execute (array (
                "codeopt" => $_POST ["codeopt"], "nom" => $_POST ["nom"], "prenom" => $_POST ["prenom"],
                "date_naissance" => $_POST ["date_de_naissance"], "sexe" => $_POST ["sexe"],
                "ville" => $_POST ["ville"],
            ));
            // Envoie d'une réponse à la surface pour informer l'utilisateur de la réussite de l'opération.
            echo json_encode (array ("status" => 200));
        }
    // Gestion de l'erreur.
    } catch (PDOException $exp) {
        // Affichons le méssage d'erreur détecté.
        echo ("Erreur de connexion à la base de données: " . $exp->getMessage ());
    }
?>
