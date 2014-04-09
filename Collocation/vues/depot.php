        <?php include '../header.php'; ?>
    <title>Gestionnaire de fichiers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />


<h1>Gestionnaire de fichiers</h1>
<p>Les fichiers ne doivent pas dépasser 5Mo.<p>
<!--Envoi de fichiers sur le serveur-->
<p><form name="formUpload" method="post" action="index.php?page=depot&&act=env" enctype="multipart/form-data">
    <!--Taille limite des fichiers de 5Mo (1024 x 1024 x 5)-->
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
    <input type="file" name="fichier" />
    <input type="submit" name="submit" value="Envoyer" />
</form></p>

<?php
//On appelle notre fonction et on met le rÃ©sultat dans la variable lstFic

$dep = new Depot();
$lstFic = $dep->genLst($dossier);

//Pour des raisons de lisibilitÃ©, on crÃ©e un tableau
echo "<table>";

//Pour chacun des fichiers de notre tableau $lstFic, on affiche son nom
foreach ($lstFic as $fic) {
    echo "<tr>";

    echo "<td>";
    //Selon l'extension, on va afficher une icone
    switch ($fic['extension']) {
        case 'png': //png ou jpg
        case 'jpg':
            $icone = "image";
            break;
        case 'txt':
            $icone = "texte";
            break;
        case 'mp3':
            $icone = "son";
            break;
        //Si le fichier n'est rien de tout ca, on affiche autre.gif
        default:
            $icone = "autre";
            break;
    }
    echo "<img src='icones/" . $icone . ".gif' alt='" . $fic['extension'] . "' />";
    echo "</td>";

    echo "<td><a href='uploads/" . $fic['nom'] . "'>" . $fic['nom'] . "</a></td>";
    echo "<td class='taille'>" . $fic['taille'] . " ko</td>";

    /* FONCTION RENOMMER
      Il suffira de saisir le nouveau nom du fichier et de valider pour le renommer.

      Le formulaire enverra le nom actuel et le nouveau nom en POST,
      ainsi qu'une valeur en GET : act = ren C'est grÃ¢ce Ã  cette valeur qu'on saura
      qu'on veut renommer un fichier (ren pour renommer).

      - le premier champ est de type hidden (cachÃ©) et contient le nom actuel du fichier
      - le second est de type text et ce sera dans ce champ que le nouveau nom sera saisi
      - le troisiÃ¨me est le bouton de validation */

    echo "<td><form method='post' action='index.php?page=depot&&act=ren'>";
    echo "<input type='hidden' name='nom' value='" . $fic['nom'] . "'>";
    echo "<input type='text' name='nouvNom' value=''>";
    echo "<input type='submit' name='submit' value='Renommer'>";
    echo "</form></td>";

    //FONCTION SUPPRIMER
    echo "<td><form method='post' action='index.php?page=depot&&act=sup'>";
    echo "<input type='hidden' name='nom' value='" . $fic['nom'] . "'>";
    echo "<input type='submit' name='submit' value='Supprimer'>";
    echo "</form></td>";

    echo "</tr>";
}

echo "</table>";
?>
<?php include '../footer.php'; ?>