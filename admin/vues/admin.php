<?php require 'header.php'; 
       require 'config.php'; 

 ?>      
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page admin</title>
    </head>
    
    <?php
    
    if(isset($_POST['type'])){
        extract($_POST);
        $sql="INSERT INTO type (name) VALUES('$type')";
        $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
    }
    
     echo "Toutes les réservations: ";
     $sql = "SELECT * FROM reservations";
     $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
     
     echo "<table>";
     echo "<tr><th>ID</th>";
     echo "<th>Date de Debut</th>";
     echo "<th>Date de Fin</th>";
     echo "<th>Type</th>";
     echo "<th>Forfait</th>";
     echo "<th>User</th></tr>";
     while($d = $req->fetch()){
         echo "<tr><td>{$d['id_reserv']}</td>";
         echo "<td>{$d['DateDeFin']}</td>";
         echo "<td>{$d['DateDeFin']}</td>";
         $sql = "SELECT name FROM type WHERE id_type={$d["id_type"]}";
         $req2 = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
         while($dd=$req2->fetch()){
         echo "<td>{$dd['name']}</td>";}
         echo "<td>{$d['Forfait']}</td>";
         echo "<td>{$d['nom_user']}</td></tr>";
     }
     echo "</table>";
    ?>
    <br/><br/>
    <form method="post" action="admin.php">
        Nom du type de logement:<input type="text" name="type" id="type"/>
        <input type="submit" name="ajout" value="Ajouter">
    </form>


