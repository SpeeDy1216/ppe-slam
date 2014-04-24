<?php

class Reservation{
    /**
     * Récupération de tout les réservations
     */
    function getAllReservation(){
        $sql = "SELECT * FROM reservations";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Récupération d'une réservation
     */
    function getReservation($nom){
        $sql = "SELECT * FROM reservations WHERE nom_user = $namr";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Ajout d'une réservation
     */
    function addReservation(){
        
    }
    
    /**
     * Suppresion d'une réservation
     */
    function deleteReservation($id){
        $sql = "DELETE FROM reservations WHERE id_reserv = $id";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    function type($id){
        $sql = "Select name FROM type WHERE id_type = '.$id.'";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
}
