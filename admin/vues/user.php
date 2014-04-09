<?php 
    include'header.php';
?>
    
<table>
    <tr>
        <th>User</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Cp</th>
        <th>Ville</th>
        <th>Pays</th>
        <th>Tel</th>
        <th>Mobile</th>
        <th>Email</th>
    </tr>
    
    <?php 
    foreach ($tab as $v) {
        echo '<tr><td>'.$v["user"].'</td>';
        echo '<td>'.$v["nom"].'</td>';
        echo '<td>'.$v["prenom"].'</td>';
        echo '<td>'.$v["adresse"].'</td>';
        echo '<td>'.$v["cp"].'</td>';
        echo '<td>'.$v["ville"].'</td>';
        echo '<td>'.$v["pays"].'</td>';
        echo '<td>'.$v["tel"].'</td>';
        echo '<td>'.$v["mobile"].'</td>';
        echo '<td>'.$v["email"].'</td></tr>';
    }
    ?>
    
</table>

<?php    
    include'footer.php';
?>