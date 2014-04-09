<?php
    include 'modeles/user.php';
    
    
    $u = new User();
    $tab=$u->getAllUser();
    
    

    
    include 'vues/user.php';
?>

