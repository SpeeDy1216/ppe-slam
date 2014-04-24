<?php 
    include'header.php';
?>
    
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th></th>
    </tr>
    
    <?php 
    foreach ($tab as $v) {
        echo '<tr><td>'.$v["id_type"].'</td>';
        echo '<td>'.$v["name"].'</td>';
        echo "<td><a href=\"index.php?page=delete&id={$v["id_type"]}&cat=type\">Supprimer ce type</a></td></tr>";
    }
    ?>
    
</table>

<?php    
    include'footer.php';
?>