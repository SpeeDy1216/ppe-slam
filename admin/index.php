<?php

    session_start();
    
    include '../config.php';
    
    //On inclut le contrôleur s'il existe et s'il spécifié
    if(!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php')){
        include 'controleurs/'.$_GET['page'].'.php';
    }else{
        include 'controleurs/home.php';
    }
    
    //On ferme la connexion
    $bdd = null;

?>