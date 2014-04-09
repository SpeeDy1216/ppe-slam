<?php

    require 'modeles/form.php';
    
    $formcolloc = new Form('form_colloc');
    $formcolloc->method('POST');
    
    //Ajouts des champs
    $formcolloc->add('Select', 'Type_reservation')
               ->label('Type de réservation')
               ->choices(array(
                   'Collocation' => 'Collocation',
                   'Congrè' => 'Congrè',
                   'Séminaire' => 'Séminaire',
                   'Groupe' => 'Groupe'
               ));
    
    $formcolloc->add('Text','nom')
               ->label('Nom');
    $formcolloc->add('Text','prenom')
               ->label('Prénom');
    $formcolloc->add('Text','adr')
               ->label('Adresse');
    $formcolloc->add('Text','ville')
               ->label('Ville');
    $formcolloc->add('Text','pays')
               ->label('Pays');
    $formcolloc->add('Text','cp')
               ->label('Code Postal');
    $formcolloc->add('Text','tel')
               ->label('Téléphone');
    $formcolloc->add('Email','mail')
               ->label('Email');
    $formcolloc->add('Textarea','motif')
               ->label('Motif')
               ->rows(8)
               ->cols(50);
    $formcolloc->add('Textarea','matos')
               ->label('Demande de matériel')
               ->rows(8)
               ->cols(50);
    $formcolloc->add('Radio','repas')
               ->label('Repas')
               ->choices(array(
                    'oui'=>'oui',
                    'non'=>'non'
                ));
    $formcolloc->add('Radio','heber')
               ->label('Hebergement pour participant')
               ->choices(array(
                    'oui'=>'oui',
                    'non'=>'non'
                ));
    
    $formcolloc->add('Submit', 'envoyer')
               ->value("Valider");
    
    $formcolloc->bound($_POST);
  
?>

