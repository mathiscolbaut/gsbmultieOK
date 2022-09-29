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

    case 'verifMail':{
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;

        $pdo->envoieOtp($login);

        include_once "vues/v_codeVerif.php";


        break;
    }

	case 'valideConnexion':{

        $code = $_POST['code'];



        if($pdo->verifOpt($_SESSION['login'],$code) == true){
            $login = $_SESSION['login'];
            $mdp = $_SESSION['mdp'];
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

                $datenow = $pdo->ajouteConnexionInitiale($id);

                include_once "vues/v_sommaire.php";
            }
            break;
        }

        else{
                echo "CODE OPT INCORRECT";

            }





        }
    case 'accueil':{
        include "vues/v_sommaire.php";

        break;
    }
    case 'deco':{


        session_unset();
        session_destroy();





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