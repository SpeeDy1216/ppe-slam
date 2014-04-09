<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="res/css/style.css" />
<link rel="stylesheet" href="../res/css/style.css" />
</head>
<body>
    <div id="body">
        <div id="wrapper">
            <div id="logo">
                <h1 id="titre">Site du Jura</h1>
            </div>
            <div id="menu">
                <div class="cleaner"></div>
                <ul id="nav">
                    <li id="ac"><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?> ../index.php<?php else:?>index.php<?php endif;?>" class="current"><span></span>Accueil</a></li>
                    <li id="res"><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?> ../reservation.php<?php else:?>reservation.php<?php endif;?>"><span></span>Réservation</a></li>
                    <li id="con"><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?> ../contact.php<?php else:?>contact.php<?php endif;?>"><span></span>Contact</a></li>
                    <li id="pro"><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?> ../profil.php<?php else:?>profil.php<?php endif;?>"><span></span>Profil</a></li>
                    <li><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?>index.php?page=formColloc<?php else:?>Collocation/index.php?page=formColloc<?php endif;?>">Collocation</a></li>
                    <li><a href="<?php if($_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=formColloc' || $_SERVER['REQUEST_URI'] == '/cvven2/Collocation/index.php?page=depot'):?>index.php?page=depot<?php else:?>Collocation/index.php?page=depot<?php endif;?>">Depot</a></li>
                </ul>

                <?php 
                    if(isset($_GET['d'])){
                        require_once 'user.php';
                        $a = new user();
                        $a->deco();
                    }
                ?>
                
                <?php if(isset($_SESSION["log"])) { ?>
                    <div id="deconnexion">
                      <a href="index.php?d=deco">Déconnexion</a>
                    </div>
                    <?php } else { ?>
                    <div id="connexion">
                        Déjà inscrit ? <a href="connexion.php" class="signup">Connexion</a> | <a href="inscription.php" class="inscrip">Inscription</a>
                    </div>
                <?php } ?>
                    
            </div>
            <div id="main">
