<?php
    extract($_POST);
    $annee = 2014;
    $date_from_user="25/04/2014";
    
    $zoneCommun=array(
        mktime(0, 0, 0, 10, 19, $annee),
        mktime(0, 0, 0, 11, 4, $annee),
    );
    
    $zoneA=array( 
        mktime(0, 0, 0, 3, 1, $annee), 
        mktime(0, 0, 0, 3, 17, $annee),
        mktime(0, 0, 0, 4, 26, $annee),
        mktime(0, 0, 0, 5, 12, $annee)
    );
    
    $zoneB=array(
        mktime(0, 0, 0, 2, 22, $annee),
        mktime(0, 0, 0, 3, 10, $annee),
        mktime(0, 0, 0, 4, 19, $annee),
        mktime(0, 0, 0, 5, 5, $annee),
    );
    
    $zoneC=array(
        mktime(0, 0, 0, 2, 15, $annee),
        mktime(0, 0, 0, 3, 3, $annee),
        mktime(0, 0, 0, 4, 12, $annee),
        mktime(0, 0, 0, 4, 28, $annee),
    );

    function geraTimestamp($data)
    {
        $partes = explode('/', $data); 
        return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
    }
    
    function ajoutUneSemaine($data){
        $part=explode('/', $data);
        $mois = $part[1];
        $jour = $part[0]+7;
        $year = $part[2];
        
        if($mois == 01 || $mois == 02 || $mois == 05 || $mois == 07 || $mois == 08 || $mois == 10 || $mois == 12 &&
                $jour > 31){
            $temp = 31;
            $jour = $jour - $temp;
            $mois++;
            if($mois == 13){
                $mois=01;
            }
            return mktime(0, 0, 0, $mois, $jour, $year);
        }else if($mois == 04 || $mois == 06 || $mois == 09 || $mois == 11 && $jour>30){
            $temp=30;
            $jour=$jour-$temp;
            $mois++;
            return mktime(0, 0, 0, $mois, $jour, $year);
        }else if($mois == 02 && $jour > 29){
            $temp=29;
            $jour=$jour-$temp;
            $mois++;
            return mktime(0, 0, 0, $mois, $jour, $year);
        }else{
            return mktime(0, 0, 0, $mois, $jour, $year);
        }
    }
    
    $usrDatedt = geraTimestamp($date_from_user);
    
    $usrDatefn = ajoutUneSemaine($date_from_user);

    if (($usrDatedt >= $zoneA[0]) && ($usrDatedt <= $zoneA[1]) ||
        ($usrDatedt >= $zoneA[2]) && ($usrDatedt <= $zoneA[3]) ||
        ($usrDatedt >= $zoneB[0]) && ($usrDatedt <= $zoneB[1]) ||
        ($usrDatedt >= $zoneB[2]) && ($usrDatedt <= $zoneB[3]) ||
        ($usrDatedt >= $zoneC[0]) && ($usrDatedt <= $zoneC[1]) ||
        ($usrDatedt >= $zoneC[2]) && ($usrDatedt <= $zoneC[3]) ||
        ($usrDatedt >= $zoneCommun[0]) && ($usrDatedt <= $zoneCommun[1]))
    { 
        if (($usrDatefn >= $zoneA[0]) && ($usrDatefn <= $zoneA[1]) ||
            ($usrDatefn >= $zoneA[2]) && ($usrDatefn <= $zoneA[3]) ||
            ($usrDatefn >= $zoneB[0]) && ($usrDatefn <= $zoneB[1]) ||
            ($usrDatefn >= $zoneB[2]) && ($usrDatefn <= $zoneB[3]) ||
            ($usrDatefn >= $zoneC[0]) && ($usrDatefn <= $zoneC[1]) ||
            ($usrDatefn >= $zoneC[2]) && ($usrDatefn <= $zoneC[3]) ||
            ($usrDatefn >= $zoneCommun[0]) && ($usrDatefn <= $zoneCommun[1]))
        {
            echo "ok";
        }else{
            echo "Saisissez une date dans la premiere semaine des vancances(cela doit faire une semaine sans dépasser les limites des vacances)";
        }
    }    
    else{
        echo "Saisissez une date dans les vacances scolaires";
    }
    
?>
