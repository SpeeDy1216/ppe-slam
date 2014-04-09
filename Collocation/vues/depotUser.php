<?php include '../header.php'; ?>
<head>
    <title>Gestionnaire de fichiers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />
</head>

<h1>Gestionnaire de fichiers</h1>
<p>Les fichiers ne doivent pas dépasser 5Mo.<p>
<!--Envoi de fichiers sur le serveur-->
<p><form name="formUpload" method="post" action="index.php?page=depot&&act=env" enctype="multipart/form-data">
    <!--Taille limite des fichiers de 5Mo (1024 x 1024 x 5)-->
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
    <input type="file" name="fichier" />
    <textarea name="description" id="description" ></textarea>
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
    
    echo "</tr>";
}

echo "</table>";
?>