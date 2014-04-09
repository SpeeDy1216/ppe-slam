<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Page profile de <?php if (isset($_SESSION['log'])) echo $_SESSION['log']; ?></title>


    <?php
        include_once 'user.php';
        $u = new user();
        require 'header.php';
    ?>

<h3><b>Vos informations personnelles:</b></h3>

<?php
    if (isset($_SESSION['log'])) {
        $u->recup();
    }

    if (isset($_POST['deconnexion'])) {
        $u->deco();
    }
    if (isset($_POST['ancienMdp']) && isset($_POST['newMdp'])) {
        $u->Newmdp($_POST['ancienMdp'], $_POST['newMdp']);
    }

    echo "Titre: ";
    if (isset($_SESSION['titre']))
        echo $_SESSION['titre']; echo "<br/>";
    echo "NOM: ";
    if (isset($_SESSION['nom']))
        echo $_SESSION['nom']; echo "<br/>";
    echo "Prénom: ";
    if (isset($_SESSION['prenom']))
        echo $_SESSION['prenom']; echo "<br/>";
    echo "Adresse: ";
    if (isset($_SESSION['adr']))
        echo $_SESSION['adr']; echo "<br/>";
    echo "Code postal: ";
    if (isset($_SESSION['cp']))
        echo $_SESSION['cp']; echo "<br/>";
    echo "Ville: ";
    if (isset($_SESSION['ville']))
        echo $_SESSION['ville']; echo "<br/>";
    echo "Pays: ";
    if (isset($_SESSION['pays']))
        echo $_SESSION['pays']; echo "<br/>";
    echo "Téléphone: ";
    if (isset($_SESSION['tel']))
        echo $_SESSION['tel']; echo "<br/>";
    echo "Mobile: ";
    if (isset($_SESSION['mobile']))
        echo $_SESSION['mobile']; echo "<br/>";
    echo "Email: ";
    if (isset($_SESSION['email']))
        echo $_SESSION['email']; echo "<br/>";
?>
<div class="deco">
    <form id="bouton" action="profil.php" method="post">
        <label>Ancien mot de passe:</label><input id="ancienMdp" name="ancienMdp" type="password"/><br/>
        <label>Nouveau mot de passe:</label><input id="newMdp" name="newMdp" type="password"/><br/><br/>
        <input id="change" name="change" type="submit" value="Changer de mot de passe"/>
    </form>
</div>

<?php require 'footer.php'; ?>