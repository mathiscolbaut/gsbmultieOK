<?php


if(!isset($_GET['action'])){
	$_GET['action'] = 'validationMedecin';
}
$action = $_GET['action'];
switch($action){

    case  "validationMedecin":{
        $token = $_GET['token'];
        $mail = $_GET['mail'];

        if($_SESSION['idRole'] == 3 or $_SESSION['idRole'] == 5) {


            if ($pdo->verifierTokenMedecinValider($mail, $token)) {
                echo "<h1 style='color: green'>Le compte ". $mail." a été validé avec succès !</h1>";
                include("vues/v_connexion.php");
            }
        } else {
            echo "Vous n'êtes pas autoriser à effectuer cette action.";
        }
    break;
    }



       
        
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>