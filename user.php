<?php

include_once 'config.php';

/**
 * Classe utilisateur
 * 
 * @author Irfann Karimjy
 */
class user {

    private $_hostname;
    private $_login;
    private $_password;
    private $_db;

    function __construct() {
        session_start();
        $this->_hostname = DB_HOST;
        $this->_login = DB_LOGIN;
        $this->_password = DB_PASS;
        $this->_db = DB_BDD;
    }

    /**
     * Ajout d'un utilisateur
     */
    public function addUser() {
        extract($_POST);
        if (!empty($log) && !empty($pwd)) {
            $pwdCrypter = sha1($pwd);
            $sql = "INSERT INTO users (user,pwd,titre,nom,prenom,adresse,cp,ville,pays,tel,mobile,email)
                        VALUES ('$log','$pwdCrypter','$titre','$nom','$prenom','$adresse','$cp','$ville','$pays','$tel','$mobile','$email')";
            $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
            header('Location: connexion.php');
        } else {
            header('Location: inscription.php');
        }
    }

    /**
     * Fonction d'identification
     */
    public function auth() {

        $_SESSION['log'] = $_POST['log'];
        $_SESSION['pwd'] = sha1($_POST['pwd']);

        // On vérifie si le champ Login n'est pas vide.              
        if ($_SESSION['log'] == '') {
        // Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection        
            header('Location:connexion.php');
        } else {
            echo "Veuillez remplir les champs";
        }

        // Nous allons chercher le vrai mot de passe ( crypté ) de l'utilisateur connecté
        // Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
        //$Requete ="SELECT password('".$_SESSION['password']."');";     
        //$Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;

        $sql = "SELECT pwd FROM users";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

        while ($donnees = $req->fetch()) {
        // Le vrai mot de passe crypté est sauvergardé dans la variable $RealPasswd  
            $RealPasswd = $donnees["pwd"];
        }
        // Initialisation à Faux de la variable "L'utilisateur existe".
        $CheckUser = False;
        // On interroge la base de donnée Mysql sur le nom des users enregistrés
        $sql = "SELECT user, pwd FROM users";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
        while ($donnees = $req->fetch()) {
            // Si l'utilisateur X est celui de la session
            if ($donnees['user'] == $_SESSION['log']) {
                // Alors on vérifie si le mot de passe est le bon
                If ($RealPasswd == $_SESSION['pwd']) {
                // Si le couple est bon, c’est que l’utilisateur est le bon.
                    $CheckUser = True;
                }
            }
        }
        // Si l'utilisateur n'est toujours pas valide à la fin de la lecture tableau
        if ($CheckUser == False) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Fonction de récupération des donnés d'un utilisateur
     */
    public function recup() {
        $sql = "SELECT * FROM users WHERE user='{$_SESSION['log']}'";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

        while ($donnees = $req->fetch()) {
            $_SESSION['log'] = $donnees['user'];
            $_SESSION['titre'] = $donnees['titre'];
            $_SESSION['nom'] = $donnees['nom'];
            $_SESSION['prenom'] = $donnees['prenom'];
            $_SESSION['adr'] = $donnees['adresse'];
            $_SESSION['cp'] = $donnees['cp'];
            $_SESSION['ville'] = $donnees['ville'];
            $_SESSION['pays'] = $donnees['pays'];
            $_SESSION['tel'] = $donnees['tel'];
            $_SESSION['mobile'] = $donnees['mobile'];
            $_SESSION['email'] = $donnees['email'];
        }
        $req->closeCursor();
    }

    /**
     * Fonction de changement de mot de passe
     */
    public function Newmdp($ancienMdp, $newMdp) {
        $user = $_SESSION['log'];
        $ancienMdp = sha1($ancienMdp);
        $newMdpCrypter = sha1($newMdp);

        $sql = "SELECT user, pwd FROM users";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
        while ($donnees = $req->fetch()) {
            // Si l'utilisateur X est celui de la session
            if ($donnees['user'] == $user) {
                // Alors on vérifie si le mot de passe est le bon
                if ($ancienMdp == $donnees['pwd']) {
                    // Si le couple est bon, c’est que l’utilisateur est le bon.
                    $sql = "UPDATE users SET pwd ='$newMdpCrypter' WHERE user = '$user'";
                    $req1 = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
                    //header('Location:profil.php');
                }
            }
        }
    }

    /**
     * Fonction de deconnexion
     */
    public function deco() {
        if (session_destroy()) {
            $_SESSION = array(); // $_SESSION est désormais un tableau vide, toutes les variables de session ont été supprimées
            echo '<p>Vous etes maintenant déconnecté !<br/></p>';
            header('Location: connexion.php');
        } else {
            
        }
    }

}

?>
