<?php

/**
 * La class Depot permet de faire des modification/lister/envoyer des documents
 *
 * @author SpeeDy1216
 */
class Depot {

    /**
     * Fonction qui retourne une liste de fichiers dans le dossier 
     * de l'adresse indiquer
     * 
     * @param type $adr
     * @return type
     */
    function genLst($adr) {
        $tab = array();

        //Si le dossier est bien ouvert
        $dossier = opendir($adr);
        if ($dossier) {
            //Pour chacun des fichiers du dossier
            while ($fichier = readdir($dossier)) {
                if ($fichier != "." && $fichier != "..") {
                    //Extension du fichier
                    $extension = explode(".", $fichier);
                    $extension = $extension[count($extension) - 1]; //Le dernier élément est l'extension
                    //Taille du fichier en ko
                    $octets = filesize($adr . "/" . $fichier);
                    $taille = $octets / 1024;
                    $taille = round($taille, 2);


                    $tab[] = array("nom" => $fichier, "extension" => $extension, "taille" => $taille);
                }
            }

            closedir($dossier);

            return $tab;
        }
    }

    /**
     * Fonction permettant le renomage d'un fichier
     * 
     * @param type $adr
     * @param type $nom
     * @param type $nouvNom
     * @return type
     */
    function renFic($adr, $nom, $nouvNom) {
        $ok = false;

        if ($adr != "" && $nom != "" && $nouvNom != "") {
            
            $ancienNom = $adr . "/" . $nom;
            $nouveauNom = $adr . "/" . $nouvNom;
            
            //On vÃ©rifie que le fichier existe bien et qu'il n'existe pas déjà  de fichier avec le nouveau nom
            if (file_exists($ancienNom) && !file_exists($nouveauNom)) {
                
                //Puis on le renomme
                $ok = rename($ancienNom, $nouveauNom);
            }
        }

        return $ok;
    }

    /**
     * Fonction permettant de supprimer un fichier
     * 
     * @param type $adr
     * @param string $nom
     * @return type
     */
    function supFic($adr, $nom) {
        $ok = false;

        if ($adr != "" && $nom != "") {
            $nom = $adr . "/" . $nom;

            if (file_exists($nom)) {
                $ok = unlink($nom);
            }
        }

        return $ok;
    }

    /**
     * Envoie du fichier sur le serveur
     * 
     * @param type $adr
     * @param type $nomChamp
     * @return boolean
     */
    function envFic($adr, $nomChamp) {

        $ok = false;
        $origine = $_FILES[$nomChamp]['tmp_name'];
        $destination = $adr . "/" . $_FILES[$nomChamp]['name'];

        if (move_uploaded_file($origine, $destination)) {
            $ok = true;
        }

        return $ok;
    }

}
