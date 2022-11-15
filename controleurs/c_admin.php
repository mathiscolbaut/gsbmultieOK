<?php


if(!isset($_GET['action'])){
    include("vues/v_navbar.php");

}
$action = $_GET['action'];
switch($action){
	
	case 'maintenance':{
		include("vues/v_miseEnMaintenance.php");
		break;
	}
    case 'MiseMaintenance':{
        $pdo->miseenMaintenance($_POST['toggle']);
        ajouterErreur("Le site est maintenance en maintenance");
        include 'vues/v_sommaire.php';
        break;
	}

	default :{
		include("vues/v_navbar.php");
		break;
	}
}
?>