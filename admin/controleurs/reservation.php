<?php 

    include 'modeles/reservation.php';
    
    
    $u = new Reservation();
    $tab=$u->getAllReservation();
    
    include 'vues/reservation.php';
  ?>

