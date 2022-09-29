<?php


if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
switch($action){
	
	case 'demandeConnexion':{
		include("vues/v_connexion.php");

		break;
	}
	case 'valideConnexion':{
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$connexionOk = $pdo->checkUser($login,$mdp);

		if(!$connexionOk){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else {
            $infosMedecin = $pdo->donneLeMedecinByMail($login);
            $id = $infosMedecin['id'];
            $nom = $infosMedecin['nom'];
            $prenom = $infosMedecin['prenom'];
            connecter($id, $nom, $prenom);
            $_SESSION["id"]=$id;
            $_SESSION["id"]=$id;

            $datenow =
            $pdo->ajouteConnexionInitiale($id);




            $page = isset($_GET["page"]) ? $_GET["page"] : "";

            switch ($page) {
                case "modif":

                    break;
                default:
                   // include("vues/v_sommaire.php");
                    break;
            }
        }}
    case 'accueil':{
        include "vues/v_sommaire.php";

        break;
    }
    case 'deco':{
        session_destroy();
        ajouterDeconnection($_SESSION["id"],$_SESSION["dateDebut"]);

        echo "Vous êtes déco";
        include "vues/v_connexion.php";

        break;
    }


       
        
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>