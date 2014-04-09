<?php

class Type{
    /**
     * Récupération de tout les types
     */
    function getAllReservation(){
        $sql = "SELECT * FROM reservations";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
    }
    
    /**
     * Récupération d'un type
     */
    function getReservation($nom){
        $sql = "SELECT * FROM reservations WHERE nom_user = $namr";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
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
        $sql = "DELETE FROM reservations WHERE id_reserv = $id";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
    }
}
