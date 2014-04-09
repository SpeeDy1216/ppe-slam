<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inscription</title>

    <?php require 'header.php'; ?>

    <?php
    include_once 'user.php';
    $u = new user();

    if (isset($_POST['log']) && isset($_POST['pwd']) && isset($_POST['nom']) && isset($_POST['prenom']) &&
            isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['email'])) {
        $u->addUser();
    }
    ?>

<div id="login">
    <div id=""></div>
    <form name="loginform" id="loginform" action='inscription.php' method='post'>
        <p>
        <h4><b>Enregistration:</b></h4>
        <label for="log">Pseudo*:</label>
        <input type="text" name="log" id="log" class="input" value="" size="20" tabindex="10"/><br />

        <label for="pwd">Mot de passe*:</label>
        <input type="password" name="pwd" id="pwd" class="input" value="" size="20" tabindex="20"/><br />
        </p>
        <p>
        <h4><b>Informations personnelles:</b></h4>
        <label for="titre">Titre*:</label>
        <select id="titre">
            <option value="M.">M.
            <option value="Mlle.">Mlle.
            <option value="Mme.">Mme.
        </select>
        <br />
        <label for="nom">Nom*:</label>
        <input type="text" name="nom" id="nom" class="input" value=""/><br />
        <label for="prenom">Prénom*:</label>
        <input type="text" name="prenom" id="prenom" class="input" value="" /><br />
        <label for="adr">Adresse*:</label>
        <input type="text" name="adresse" id="adresse" class="input" value=""/><br />
        <label for="cp">Code postal*:</label>
        <input type="text" name="cp" id="cp" class="input" value=""/><br />
        <label for="ville">Ville*:</label>
        <input type="text" name="ville" id="ville" class="input" value=""/><br />
        <label for="pays">Pays*:</label>
        <input type="text" name="pays" id="pays" class="input" value=""/><br />
        <label for="tel">Téléphone*:</label>
        <input type="text" name="tel" id="tel" class="input" value=""/><br />
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" id="mobile" class="input" value=""/><br />
        <label for="email">Email*:</label>
        <input type="text" name="email" id="email" class="input" value=""/><br />
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" value="S'inscrire"/>
            <input type="hidden" name="redirect_to" value=""/>
            <input type="hidden" name="testcookie" value="1"/>
        </p>
    </form>
</div>

<?php require 'footer.php'; ?>