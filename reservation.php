<?php
include_once 'user.php';
$u = new user();

?>    
<?php
include_once 'calendrier.php';
require 'header.php';
?>


<h1>Réservation:</h1>
<form method="post" action="reservation.php" >
    <?php
    $ca = new calendrier();
    extract($_POST);
    if (isset($_POST) && isset($nom) || isset($prenom) || isset($adr) && isset($cp) && isset($ville) &&
            isset($pays) && isset($tel) && isset($mail) && isset($menage) && isset($dateD)) {

        $valid = true;


        if (!isset($nom)) {
            $valid = false;
            $erreurNom = "Veuillez saisir le nom";
        }
        if (!isset($prenom)) {
            $valid = false;
            $erreurPrenom = "Veuillez saisir le prenom";
        }
        if (!isset($adr)) {
            $valid = false;
            $erreurAdre = "Veuillez saisir l'adresse";
        }
        if (!isset($cp)) {
            $valid = false;
            $erreurCp = "Veuillez saisir le code postal";
        }
        if (!isset($ville)) {
            $valid = false;
            $erreurVille = "Veuillez saisir la ville";
        }
        if (!isset($pays)) {
            $valid = false;
            $erreurPays = "Veuillez saisir le pays";
        }
        if (!isset($tel)) {
            $valid = false;
            $erreurTel = "Veuillez saisir le téléphone";
        }
        if (!isset($mail)) {
            $valid = false;
            $erreurMail = "Veuillez saisir le mail";
        }
        if (!isset($menage))
            $valid = false; {
            $erreurMenage = "Veuillez saisir le ménage";
        }

        if (isset($dateD)) {
            $v = $ca->testDeValiditer($dateD);
        }

        if ($v == 3) {
            $erreur1 = "Saisissez une date dans les vacances scolaires";
        } else if ($v == 2) {
            $erreur2 = "Saisissez une date dans la premiere semaine des vancances(cela doit faire une semaine sans dépasser les limites des vacances)";
        } else if ($v == 1) {
            $res = "Réservation réussi";
            $ca->ajoutDeLaReservation();
        }

        if ($valid == true) {
            echo "ok";
        } else {
            echo $err = "Veuillez remplir le formulaire.";
        }
    }
    ?>
    <h5>Spècifications (indiquez le nombre de personne):</h5><br />
    <label>Type:</label>
    <select name="type" id="type">
        <?php
        $sql = "SELECT * FROM type";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
        while ($data = $req->fetch()) {
            echo "<option value=\"{$data["id_type"]}\">";
            echo "{$data["name"]}";
            echo "</option>";
        }
        ?>
    </select><br />

    <div id="spec">
        <label>Logement basic*:</label><input type="text" name="logSimple" id="logSimple" class="input" value="0"/><br/>
        <label>Logement 3 lits*:</label><input type="text" name="logTrois" id="logTrois" class="input" value="0"><br/>
        <label>Logement 4 lits*:</label><input type="text" name="logQuatre" id="logQuatre" class="input" value="0" /><br/>
        <label>Logement PMR**:</label> <input type="text" name="logH" id="logH" class="input" value="0"/>
    </div>
    <p id="info">*  entrée, douche et wc, 2 chambres à 2 lits avec coin toilette et balcon,<br/>
        3 lits séparés par une cloison mobile(Coin toilette, wc, douche),<br/>
        4 lits séparés par une cloison mobile(Balcon, wc, douche)<br/>
        **Pour personnes à mobilité réduite</p>
    <br/>

    <h5>Informations personnelles:</h5><br />
    <label>Nom*:</label>
    <input type="text" name="nom" id="nom" class="input" value="<?php if (isset($_SESSION['nom'])) echo $_SESSION['nom']; ?>"/>
    <span class="error-message"><?php if (isset($erreurNom)) echo $erreurNom; ?></span><br />
    <label>Prenom*:</label>
    <input type="text" name="prenom" id="prenom" class="input" value="<?php if (isset($_SESSION['prenom'])) echo $_SESSION['prenom']; ?>"/>
    <span class="error-message"><?php if (isset($erreurPrenom)) echo $erreurPrenom; ?></span><br />
    <label>Adresse*:</label>
    <input type="text" name="adr" id="adr" class="input" value="<?php if (isset($_SESSION['adr'])) echo $_SESSION['adr']; ?>"/>
    <span class="error-message"><?php if (isset($erreurAdre)) echo $erreurAdre; ?></span><br />
    <label>Code postal*:</label>
    <input type="text" name="cp" id="cp" class="input" value="<?php if (isset($_SESSION['cp'])) echo $_SESSION['cp']; ?>"/>
    <span class="error-message"><?php if (isset($erreurCp)) echo $erreurCp; ?></span><br />
    <label>Ville*:</label>
    <input type="text" name="ville" id="ville" class="input" value="<?php if (isset($_SESSION['ville'])) echo $_SESSION['ville']; ?>"/>
    <span class="error-message"><?php if (isset($erreurVille)) echo $erreurVille; ?></span><br />
    <label>Pays*:</label>
    <input type="text" name="pays" id="pays" class="input" value="<?php if (isset($_SESSION['pays'])) echo $_SESSION['pays']; ?>"/>
    <span class="error-message"><?php if (isset($erreurPays)) echo $erreurPays; ?></span><br />
    <label>Téléphone*:</label>
    <input type="text" name="tel" id="tel" class="input" value="<?php if (isset($_SESSION['tel'])) echo $_SESSION['tel']; ?>"/>
    <span class="error-message"><?php if (isset($erreurTel)) echo $erreurTel; ?></span><br />
    <label>Email*:</label>
    <input type="text" name="mail" id="mail" class="input" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>"/>
    <span class="error-message"><?php if (isset($erreurMail)) echo $erreurMail; ?></span><br />

    <label>Type de pension:</label>
    <select name='tp'>
        <option name='pc'>Pension complète
        <option name='dp'>Demi-pension
    </select><br />
    <label>Option forfait fin de ménage:</label>
    Oui<input type="radio" name="menage" id="menage" class="input" value="1"/>
    Non<input type="radio" name="menage" id="menage" class="input" value="0"/>
    <span class="error-message"><?php if (isset($erreurMenage)) echo $erreurMenage; ?></span><br /><br />
    <p>Date de debut(durée une semaine)*: <input type="text" name='dateD' id="datepicker" />
        <span class="error-message"><?php if (isset($erreur1))
            echo $erreur1;
        else if (isset($erreur2)) {
            echo $erreur2;
        } else if (isset($res)) {
            echo $res;
        }
        ?></span><br /></p>

    <input type="submit" value="Envoyer" />
</form>

<p id="info">Tous les champs suivie d'un "*" sont obligatoires.</p>
<?php require 'footer.php'; ?>