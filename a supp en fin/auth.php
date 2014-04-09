<?php
    require "config.php";

 

    session_start();
    
    $_SESSION['log']=$_POST['log'];
    $_SESSION['pwd']=sha1($_POST['pwd']);
    
    // On vérifie si le champ Login n'est pas vide.              
    if ($_SESSION['log']=='')   
    // Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection        
     { Header('Location:connexion.php');   }  
    else     
     { echo "Veuillez remplir les champs";  }           
            
    // Nous allons chercher le vrai mot de passe ( crypté ) de l'utilisateur connecté
    // Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
    //$Requete ="SELECT password('".$_SESSION['password']."');";     
    //$Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
    
    $sql="SELECT pwd FROM users";
    $req = $bdd->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
    
    while ($donnees = $req->fetch())
    // Le vrai mot de passe crypté est sauvergardé dans la variable $RealPasswd  
     {$RealPasswd = $donnees["pwd"];}   
    // Initialisation à Faux de la variable "L'utilisateur existe".
     $CheckUser=False;  
    // On interroge la base de donnée Mysql sur le nom des users enregistrés
    $sql ="SELECT user, pwd FROM users";  
    $req = $bdd->query($sql)  or  die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
     while($donnees = $req->fetch())
     {
    // Si l'utilisateur X est celui de la session
      if ( $donnees['user']==$_SESSION['log'])         
      {
    // Alors on vérifie si le mot de passe est le bon
       If ($RealPasswd == $_SESSION['pwd'])
    // Si le couple est bon, c’est que l’utilisateur est le bon.
        {
           $CheckUser=True;
        }
      }
     }
    // Si l'utilisateur n'est toujours pas valide à la fin de la lecture tableau
     if ( $CheckUser==False )      
    // Redirection vers la fenêtre de connexion.
      {
         header('Location:connexion.php');
      }else{
           header('Location:profil.php');
      }
?>
