<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
require_once("include/Upload.php");
session_start();



date_default_timezone_set('Europe/Paris');



$pdo = PdoGsb::getPdoGsb();
$upload = new Upload(array('png', 'jpeg', 'jpg', 'gif'), 'assets/img/uploads', 500000);
$estConnecte = estConnecte();
if(!isset($_GET['uc'])){
     $_GET['uc'] = 'connexion';
}
else {
    if($_GET['uc']=="connexion" && !estConnecte()){
        $_GET['uc'] = 'connexion';
    }
        
}

$uc = $_GET['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'validationMedecin':{
		include("controleurs/c_validationMedecin.php");break;
	}
	case 'creation':{
		include("controleurs/c_creation.php");break;
	}
	case 'visioconferences':{
		include("controleurs/c_visio.php");break;
	}
	case 'modification':{
		include("controleurs/c_modifications.php");break;
	}
	case 'admin':{
		include("controleurs/c_admin.php");break;
	}

	case 'notfound':{
		include("controleurs/c_notfound.php");break;
	}

	case 'produit':{
		include("controleurs/c_produit.php");break;
	}

	
	}




?>







