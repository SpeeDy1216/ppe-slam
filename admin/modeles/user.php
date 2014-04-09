<?php

class User{
    
    /**
     * Récupération de tout les utilisateurs
     */
    function getAllUser(){
        $sql = "SELECT * FROM users";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Récupération d'un utilisateur
     */
    function getUser($nom){
        $sql = "SELECT * FROM users WHERE user = $nom";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        return $req->fetchAll();
    }
    
    /**
     * Suppresion d'un utilisateur
     */
    function deleteUser($id){
        $sql = "DELETE FROM users WHERE id_user = $id";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        
    }
    
    /**
     * Modifier l'utilisateur
     */
    function updateUser(){
        
    }
}
