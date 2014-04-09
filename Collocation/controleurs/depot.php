<?php

//On inclut le fichier des fonctions
require_once("/../modeles/depot.php");
$dep = new Depot();
//Le dossier à gérer
$dossier = "depots";

if (isset($_GET['act'])) {
    
    switch ($_GET['act']) {
        //Renommer
        case "ren" :
            //Le nom du fichier
            $nomFic = $_POST['nom'];

            $nouvNom = $_POST['nouvNom'];
            //On appelle notre fonction
            $ok = $dep->renFic($dossier, $nomFic, $nouvNom);
            //On affiche un message de succÃ¨s ou d'Ã©chec
            if ($ok)
                echo "<p>Le fichier '" . $nomFic . "' a &eacute;t&eacute; renomm&eacute; en '" . $nouvNom . "'.</p>";
            else
                echo "<p>Le fichier '" . $nomFic . "' n'a pas pu &ecirc;tre renomm&eacute; &agrave; cause d'une erreur.</p>";
            break;

        //Supprimer
        case "sup" :
            //Le nom du fichier
            $nomFic = $_POST['nom'];

            //On appelle notre fonction
            $ok = $dep->supFic($dossier, $nomFic);
            //On affiche un message de succÃ¨s ou d'Ã©chec
            if ($ok)
                echo "<p>Le fichier '" . $nomFic . "' a &eacute;t&eacute; supprim&eacute;.</p>";
            else
                echo "<p>Le fichier '" . $nomFic . "' n'a pas pu&ecirc;tre supprim&eacute; &agrave; cause d'une erreur.</p>";
            break;

        //Envoyer
        case "env" :
            /* On appelle notre fonction. Celle-ci aura accÃ¨s au fichier car $_FILES est une variable globale.
              Le second paramÃ¨tre correspond au nom du champ de type "file" du formulaire */
            $ok = $dep->envFic($dossier, "fichier");
            //On affiche un message de succÃ¨s ou d'Ã©chec
            if ($ok)
                echo "<p>Le fichier a &eacute;t&eacute; envoy&eacute;.</p>";
            else
                echo "<p>Le fichier n'a pas pu &ecirc;tre envoy&eacute; &agrave; cause d'une erreur.</p>";
            break;
    }
}else {
    include '/../vues/depot.php';
}

