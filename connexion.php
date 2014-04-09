    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Connexion</title>
       
    <?php
        include_once 'user.php';
        $u = new user();
        require 'header.php';
         
        if(isset($_POST['log']) && isset($_POST['pwd'])){
            if ($u->auth() == true){                
                header("Location:profil.php");
            }else{
                $u->deco();
                header("Location:connexion.php");
            }
        }
    ?>

    <div id="login">
        <div id=""></div>
        <form name="loginform" id="loginform" action="connexion.php" method="post">
            <p>
                <label>Nom d'utilisateur:<br />
                <input type="text" name="log" id="log" class="input" value="" size="20" tabindex="10"/></label>
            </p>
            <p>
                <label>Mot de passe:<br />
                <input type="password" name="pwd" id="pwd" class="input" value="" size="20" tabindex="20"/></label>
            </p>
            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" value="Se connecter"/>
                <input type="hidden" name="redirect_to" value=""/>
                <input type="hidden" name="testcookie" value="1"/>
            </p>
        </form>
    </div><br/>
    <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>

    <?php require 'footer.php'; ?>