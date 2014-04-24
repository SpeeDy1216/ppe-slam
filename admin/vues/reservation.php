<?php 
    include'header.php';
?>
    
<table>
    <tr>
        <th>ID</th>
        <th>Utilisateur</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>type</th>
        <th>Forfait</th>
    </tr>
    
    <?php 
    foreach ($tab as $v) {
        echo '<tr><td>'.$v["id_reserv"].'</td>';
        echo '<td>'.$v["nom_user"].'</td>';
        echo '<td>'.$v["dateDeDebut"].'</td>';
        echo '<td>'.$v["DateDeFin"].'</td>';
        echo '<td>'.$v["id_type"].'</td>';
        echo '<td>'.$v["Forfait"].'</td>';
        echo "<td><a href=\"index.php?page=delete&id={$v["id_reserv"]}&cat=reservation\">Supprimer cette resrevation</a></td></tr>";
    }
    ?>
    
</table>

<?php    
    include'footer.php';
?>