<?php
    require 'config.php';
    extract($_POST);
    
    if(!empty($log) && !empty($pwd)){
        $pwdCrypter = sha1($pwd);
        $sql = "INSERT INTO users (user,pwd,nom,prenom,adresse,cp,ville,pays,tel,mobile,email)
                VALUES ('$log','$pwdCrypter','$nom','$prenom','$adresse','$cp','$ville','$pays','$tel','$mobile','$email')";
        $req = $bdd->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
        header('Location: connexion.php');
    }else{
        header('Location: inscription.php');
    }
?>
