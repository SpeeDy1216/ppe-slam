<?php

class Type{
    /**
     * Récupération de tout les types
     */
    function getAllType(){
        $sql = "SELECT * FROM type";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Récupération d'un type
     */
    function getType($nom){
        $sql = "SELECT * FROM type WHERE nom = $namr";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Ajout d'un type
     */
    function addType(){
        
    }
    
    /**
     * Suppresion d'un type
     */
    function deleteType($id){
        $sql = "DELETE FROM type WHERE id_type = $id";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
}
