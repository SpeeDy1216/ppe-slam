<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Contact</title>

    <?php
    include_once 'user.php';
    $u = new user();
    require 'header.php';
    ?>

<div id="contenu">
    <section>
        <h1>Contactez moi:</h1><div id="bord"></div><br />
        <article style="width: 100%;">

            <?php
            if (isset($erreur)) {
                echo "<p>$erreur</p>";
            }
            ?>
            <p>Si vous avez besoin d'information sur la reservation contactez-moi:</p>
            <form method="post" action="contact.php">
                <?php
                if (isset($_POST) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])) {
                    extract($_POST);

                    $valid = true;

                    if (empty($nom)) {
                        $valid = false;
                        $erreurnom = "<br/>Vous n'avez pas rempli votre nom";
                    }


                    if (!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i", $email)) {
                        $valid = false;
                        $erreuremail = "Votre email n'est pas valide";
                    }

                    if (empty($email)) {
                        $valid = false;
                        $erreuremail = "<br/>Vous n'avez pas rempli votre email";
                    }

                    if (empty($message)) {
                        $valid = false;
                        $erreurmessage = "<br/>Vous n'avez pas rempli votre message";
                    }

                    if ($valid) {
                        $message = addslashes($message);
                        $message = str_replace("\'", "'", $message);
                        $destinataire = "testeurtest56@gmail.com";
                        $sujet = "Test de form de contact";
                        $msg = "Une question \n Nom: $nom\n Email: $email\n Message: $message";
                        $entete = "From: $nom\n Reply-To: $email";
                        mail($destinataire, $sujet, $msg, $entete);
                        echo "Nous avons bien reçu votre message";
                    } else {
                        echo "Votre message n'a pas pu être envoyer.";
                    }
                }
                ?>
                <fieldset>
                    <ul id="puce">
                        <li>
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" id="nom" value="<?php if (isset($_SESSION['nom'])) echo $_SESSION['nom']; ?>"/>
                            <span class="error-message"><?php if (isset($erreurnom)) echo $erreurnom; ?></span><br />
                        </li>
                        <li>
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" value="<?php if (isset($email)) echo $email; ?>"/>
                            <span class="error-message"><?php if (isset($erreuremail)) echo $erreuremail; ?></span><br />
                        </li>
                        <li>
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" ><?php if (isset($message)) echo $message; ?></textarea>
                            <span class="error-message"><?php if (isset($erreurmessage)) echo $erreurmessage; ?></span><br />
                        </li>
                        <li>
                            <input type="submit" value="Envoyer" id="envoyer"/>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </article>
    </section>
</div>
<?php require 'footer.php'; ?>
