<?php


if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
switch($action){
	
	case 'demandeConnexion':{
        if($pdo->enMaintenance()) {
            include "vues/v_maintenance.php";
            return;
        }
		include("vues/v_connexion.php");

		break;
	}
    case 'demandeConnexionAdmin':{
        include("vues/v_connexion.php");

        break;
    }

    case 'verifications':{
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        /**
         * 1/ Verfier MDP/Login
         * 2/ Verifier le grade si administateur
         * 3/ D'abord verifier l'email
         * 4/ Et ensuite que le médecin a bien été validé
         */


        if($pdo->enMaintenance()) {
            if($pdo->donneLeMedecinByMail($login)[4]!=5) {
                echo "<h1 style='color: red'>Le site est en maintenance, seul les administateurs sont autorisés à se connecter.</h1>";
                return;
            }
        }

        if(!$pdo->checkUser($login,$mdp)) {
            echo "<h1 style='color: red'>Email ou password incorrects.</h1>";
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_connexion.php");
            return;
        }


        if(!$pdo->verifierSiValider($login)) {
            echo "<h1 style='color: red'>Veuillez valider votre compte avant de pouvoir accéder au site.</h1>";
            echo "<h1 style='color: red'>Nous vous avons envoyer un nouveau code (disponible 24 heures).</h1>";
            $pdo->envoieToken($login);
            return;
        }


        if(!$pdo->verifierSiMedecinValider($login)) {
            echo "<h1 style='color: red'>Votre compte n'a pas été encore validé par un Validateur.</h1>";
            echo "<h1 style='color: red'>Merci de patienter 24 heures.</h1>";

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