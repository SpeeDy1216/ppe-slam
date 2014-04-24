<?php

class colloque{
    
    /**
     * Récupération de tout les colloques
     */
    function getAllColloque(){
        $sql = "SELECT * FROM collochv";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Récupération d'une colloque
     */
    function getColloque($nom){
        $sql = "SELECT * FROM collochv WHERE user = $nom";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Suppresion d'un colloque
     */
    function deleteColloque($id){
        $sql = "DELETE FROM collochv WHERE id = $id";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        
    }
    
    /**
     * Modifier colloque
     */
    function updateColloque(){
        
    }
}
