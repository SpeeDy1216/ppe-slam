<?php

    session_start();
    
    define("DB_HOST","127.0.0.1");
    
    define("DB_LOGIN","root");
    
    define("DB_PASS","");
    
    define("DB_BDD", "cvven");
    
    global $bdd;
    try
    {
        //Connection a la BD
        $bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_BDD, DB_LOGIN, DB_PASS);    
    }
    catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
    
    //On inclut le contrôleur s'il existe et s'il spécifié
    if(!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php')){
        include 'controleurs/'.$_GET['page'].'.php';
    }else{
        header('Location: ../'.$_GET['page']);
    }
    
    //On ferme la connexion
    $bdd = null;

?>