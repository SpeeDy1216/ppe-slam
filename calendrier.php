<?php
    include_once 'config.php';
/**
 * Classe gerant les dates
 * 
 * @author Irfann Karimjy
 */
    class calendrier {
        private $_hostname;
        private $_login;
        private $_password;
        private $_db;

        /**
         * Le constructeur
         */
        function __construct() {
            $this->_hostname = DB_HOST;
            $this->_login = DB_LOGIN;
            $this->_password = DB_PASS;
            $this->_db = DB_BDD; 
        }
        
        /**
         * Fonction permettant de mettre une date en timestamp
         * 
         * @param type $data
         * @return type
         */
        public function geraTimestamp($data)
        {
            $partes = explode('/', $data);
            return mktime(0, 0, 0, $partes[0], $partes[1], $partes[2]);
        }
        
        /**
         * Test de la validiter de la semaine
         */
        function valide($jour,$mois,$year){
            if($mois == 01 || $mois == 02 || $mois == 05 || $mois == 07 || $mois == 08 || $mois == 10 || $mois == 12 &&
                    $jour > 31){
                $temp = 31;
                $jour = -$jour + $temp;
                $mois++;
                if($mois == 13){
                    $mois=01;
                    $year++;
                }
                
                return $jour."/".$mois."/".$year;
            }else if($mois == 04 || $mois == 06 || $mois == 09 || $mois == 11 && $jour>30){
                $temp=30;
                $jour=-$jour+$temp;
                $mois++;
                return $jour."/".$mois."/".$year;
            }else if($mois == 02 && $jour > 29){
                $temp=29;
                $jour=-$jour+$temp;
                $mois++;
                return $jour."/".$mois."/".$year;
            }else{
                return $jour."/".$mois."/".$year;
            }
        }
        
        /**
         * Ajout d'une semaine a la date donné
         * 
         * @param type $data
         * @return type
         */
        function ajoutUneSemaine($data){
            $part = explode('/', $data);
            $mois = $part[0];
            $jour = $part[1]+7;
            $year = $part[2];
            
            if($mois == 01 || $mois == 02 || $mois == 05 || $mois == 07 || $mois == 08 || $mois == 10 || $mois == 12 &&
                    $jour > 31){
                $temp = 31;
                $jour = $jour - $temp;
                $mois++;
                if($mois == 13){
                    $mois=01;
                    $year++;
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
        
        /**
         * 
         * Fonction qui vérifie si la date se trouve dans les limite des vacances scolaires
         */
        public function testDeValiditer($usrDate){
            $annee = 2014;
            
            $zoneCommun=array(
                mktime(0, 0, 0, 10, 19, $annee),
                mktime(0, 0, 0, 11, 4, $annee),
                mktime(0, 0, 0, 7, 5, $annee),
                mktime(0, 0, 0, 9, 5, $annee),
                mktime(0, 0, 0, 12, 21, $annee),
                mktime(0, 0, 0, 1, 6, $annee+1),
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
            
            $usrDatedt = $this->geraTimestamp($usrDate);
            $usrDatefn = $this->ajoutUneSemaine($usrDate);

            if (($usrDatedt >= $zoneA[0]) && ($usrDatedt <= $zoneA[1]) ||
                ($usrDatedt >= $zoneA[2]) && ($usrDatedt <= $zoneA[3]) ||
                ($usrDatedt >= $zoneB[0]) && ($usrDatedt <= $zoneB[1]) ||
                ($usrDatedt >= $zoneB[2]) && ($usrDatedt <= $zoneB[3]) ||
                ($usrDatedt >= $zoneC[0]) && ($usrDatedt <= $zoneC[1]) ||
                ($usrDatedt >= $zoneC[2]) && ($usrDatedt <= $zoneC[3]) ||
                ($usrDatedt >= $zoneCommun[0]) && ($usrDatedt <= $zoneCommun[1]) ||
                ($usrDatedt >= $zoneCommun[2]) && ($usrDatedt <= $zoneCommun[3]) ||
                ($usrDatedt >= $zoneCommun[4]) && ($usrDatedt <= $zoneCommun[5]))
            {           
                if (($usrDatefn >= $zoneA[0]) && ($usrDatefn <= $zoneA[1]) ||
                    ($usrDatefn >= $zoneA[2]) && ($usrDatefn <= $zoneA[3]) ||
                    ($usrDatefn >= $zoneB[0]) && ($usrDatefn <= $zoneB[1]) ||
                    ($usrDatefn >= $zoneB[2]) && ($usrDatefn <= $zoneB[3]) ||
                    ($usrDatefn >= $zoneC[0]) && ($usrDatefn <= $zoneC[1]) ||
                    ($usrDatefn >= $zoneC[2]) && ($usrDatefn <= $zoneC[3]) ||
                    ($usrDatefn >= $zoneCommun[0]) && ($usrDatefn <= $zoneCommun[1]) ||
                    ($usrDatefn >= $zoneCommun[2]) && ($usrDatefn <= $zoneCommun[3]) ||
                    ($usrDatefn >= $zoneCommun[4]) && ($usrDatefn <= $zoneCommun[5]))
                {
                    return 1;
                }else{
                    return 2;
                }
            }    
            else{
                return 3;
            }
        }
        
        var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
        var $months = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');

        /**
         * Recuperer toutes les dates de l'année
         * 
         * @param type $year
         * @return type
         */
        function getAll($year){
            $r = array();
            $date = new DateTime($year.'-01-01');

            while($date->format('Y') <= $year){
                $y = $date->format('Y');
                $m = $date->format('n');
                $d = $date->format('j');
                $w = str_replace('0', '7', $date->format('w'));
                $r[$y][$m][$d] = $w;
                $date->add(new DateInterval('P1D'));
            }
            return $r;
        }

        /**
         * recupere les dates de la bdd
         * 
         * @global type $bdd
         * @param type $year
         * @return array
         */
        function getEvents($year){
            global $bdd;
            $sql = 'SELECT dateDebut, DateFin FROM vacances';
            $req = $bdd->query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
            $r = array();

            while($d=$req->fetch(PDO::FETCH_OBJ)){

                $r[strtotime(date('Y-m-j', strtotime($d->dateDebut)))] = strtotime(date('Y-m-j', strtotime($d->DateFin)));
            }

            return $r;
        }
        
        /**
         * Fonction qui ajoute la reservation
         */
        public function ajoutDeLaReservation(){
            extract($_POST);
            $date = $this->ajoutUneSemaine($dateD);
            $dateF = date("Y-m-j",$date);
            $parts = explode("/", $dateD);
            $dateD = date($parts[2]."-".$parts[0]."-".$parts[1]);
            
            $sql = "INSERT INTO reservations(dateDeDebut,DateDeFin,id_type,Forfait,nom_user)
                    VALUES ('$dateD','$dateF','$type','$menage','$nom')";
            $req = $GLOBALS['bdd']->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.  mysql_error());
            
        }
    }

?>
