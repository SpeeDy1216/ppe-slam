<?php 

    include 'modeles/colloque.php';
    
    
    $u = new colloque();
    $tab=$u->getAllColloque();
    
    

    
    include 'vues/colloque.php';
  ?>



