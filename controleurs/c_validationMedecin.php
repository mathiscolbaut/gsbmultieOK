<?php


if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
switch($action){

    case  "validationMedecin":{
        $token = $_GET['token'];
        $mail = $_GET['mail'];

        if($_SESSION['idRole'] == 3 or $_SESSION['idRole'] == 5) {


            if ($pdo->verifierTokenMedecinValider($mail, $token)) {
                echo "Le compte " . $mail . " a été validé avec succès !";
                include "vues/v_gohome.php";
            }
        } else {
            echo "Vous n'êtes pas autoriser à effectuer cette action.";
        }
    break;
    }

    case 'accueil':{
        include "vues/v_sommaire.php";

        break;

    }


       
        
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>