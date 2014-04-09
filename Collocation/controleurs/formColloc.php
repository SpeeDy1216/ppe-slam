<?php
    /**
     * Controleur du fichier formColloc.php
     */

    //On inclut le modele
    include('/../modeles/formColloc.php');
    include ('/../vues/formColloc.php');
 
   
    //On effectue diverses actions
    //Vérification des erreurs
    $r=$formcolloc->is_valid($_POST);
    $erreurs_reservation = array();
    
    if($r){
        //On vérifie les données
        if(strlen($formcolloc->get_cleaned_data('cp')) != 5 || ctype_digit($formcolloc->get_cleaned_data('cp')) == FALSE){ $erreurs_reservation[] = "Veuillez compléter le champs CODE POSTAL."; }
        if(strlen($formcolloc->get_cleaned_data('tel')) != 10 || ctype_digit($formcolloc->get_cleaned_data('tel')) == FALSE){ $erreurs_reservation[] = "Veuillez compléter le champs TELEPHONE."; }
        
        //S'il y pas d'erreurs, on envoie un mail
        if(empty($erreurs_reservation)){
            //ajouter();
            $message_mail = '<html><head></head><body>
                <p>Merci d\'avoir réserver chez nous !</p>
                </body></html>';
            
            $message_mail_admin = '<html><head></head><body>
                <p>Réservation de </p>'.$formcolloc->get_cleaned_data('nom').' '.$formcolloc->get_cleaned_data('prenom').' effectuer.
                '.$formcolloc->get_cleaned_data('mail').'</body></html>';
            
            $headers_mail = 'MINE-Version: 1.0'                             ."\r\n";
            $headers_mail .= 'Content-type: text/html; charset=utf-8'       ."\r\n";
            $headers_mail .= 'From: "Site du JURA" <contact@jura.com>'      ."\r\n";
            
            $headers_mail_admin = 'MINE-Version: 1.0'                             ."\r\n";
            $headers_mail_admin .= 'Content-type: text/html; charset=utf-8'       ."\r\n";
            $headers_mail_admin .= 'From: "Site du JURA" <admin@jura.com>'      ."\r\n";

            //Envoie du mail
            mail($formcolloc->get_cleaned_data('mail'), 'Demande de réservation sur le site de JURA', $message_mail, $headers_mail);
            mail($formcolloc->get_cleaned_data('mail'), 'Demande de réservation sur le site de JURA', $message_mail_admin, $headers_mail_admin);
            
            include('/../vues/colloc_effectuee.php');
        }else{
            foreach ($erreurs_reservation as $value) {
                echo $value;
            }
            include('/../vues/formulaire.php');
        }
    }else{
        include('/../vues/formulaire.php');
    }
    
    
?>
