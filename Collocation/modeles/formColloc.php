<?php
/**
 * Classe gestion du formulaire de collocation
 */

class formColloc{
    function ajouter(){
        if(isset($_POST)){
            extract($_POST);
            
            $sql = "INSERT INTO collocHV (nom,prenom,adresse,cp,ville,pays,tel,email,type,motif,matos,repas,heber)
                        VALUES ('$nom','$prenom','$adr','$cp','$ville','$pays','$tel','$mail','$Type_resevation','$motif','$matos','$repas','$heber')";
                $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        }
    }
}

?>
