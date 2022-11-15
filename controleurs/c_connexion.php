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

    case 'verifications':{
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        /**
         * 1/ Verfier MDP/Login
         * 2/ D'abord verifier l'email
         * 3/ Et ensuite que le médecin a bien été validé
         */


        if(!$pdo->checkUser($login,$mdp)) {
            echo "Mot de passe ou password incorrects.";
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_connexion.php");
            return;
        }


        if(!$pdo->verifierSiValider($login)) {
            echo "Veuillez valider votre compte avant de pouvoir accéder au site.";
            echo "Nous vous avons envoyer un nouveau code (disponible 24 heures).";
            $pdo->envoieToken($login);
            return;
        }


        if(!$pdo->verifierSiMedecinValider($login)) {
            echo "Votre compte n'a pas été encore validé par un Validateur.";
            echo "Merci de patienter 24 heures.";

            $pdo->verifierMedecinAupresValidateur($login);
            return;
        }


        //Si tout est validé alors ->>>
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


            $infosMedecin = $pdo->donneLeMedecinByMail($login);
            $id = $infosMedecin['id'];
            $nom = $infosMedecin['nom'];
            $prenom = $infosMedecin['prenom'];
            $idRole = $infosMedecin['idRole'];
            connecter($id, $nom, $prenom, $idRole);

            $datenow = $pdo->ajouteConnexionInitiale($id);

            include_once "vues/v_sommaire.php";

            
         }

         else{
                echo "<script>alert(\"Le Code OTP n'est plus valide (plus de 1 minute)\")</script>";
                include("vues/v_connexion.php");

            }




        break;
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