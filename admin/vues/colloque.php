<?php 
    include'header.php';
?>
    
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Cp</th>
        <th>Ville</th>
        <th>Pays</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Type</th>
        <th>Motif</th>
        <th>Matériel</th>
        <th>Repas</th>
        <th>Hébergement</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($tab as $v) {
        echo '<tr><td>'.$v["nom"].'</td>';
        echo '<td>'.$v["prenom"].'</td>';
        echo '<td>'.$v["adresse"].'</td>';
        echo '<td>'.$v["cp"].'</td>';
        echo '<td>'.$v["ville"].'</td>';
        echo '<td>'.$v["pays"].'</td>';
        echo '<td>'.$v["tel"].'</td>';
        echo '<td>'.$v["email"].'</td>';
        echo '<td>'.$v["type"].'</td>';
        echo '<td>'.$v["motif"].'</td>';
        echo '<td>'.$v["matos"].'</td>';
        echo '<td>'.$v["repas"].'</td>';
        echo '<td>'.$v["heber"].'</td>';
        echo "<td><a href=\"index.php?page=delete&id={$v["id"]}&cat=colloque\">Supprimer cette colloque</a></td></tr>";
    }
    ?>
    
</table>

<?php    
    include'footer.php';
?>