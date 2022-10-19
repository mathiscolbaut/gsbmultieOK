﻿<?php


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


        if($pdo->verifierSiValider($login)) {
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp;

            $pdo->envoieOtp($login);

            include_once "vues/v_codeVerif.php";
        } else {
            echo "Veuillez valider votre compte avant de pouvoir accéder au site.";
        }



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
                include("vues/v_sommaire.php");
                include("vues/v_connexion.php");
            }
            else {
                $infosMedecin = $pdo->donneLeMedecinByMail($login);
                $id = $infosMedecin['id'];
                $nom = $infosMedecin['nom'];
                $prenom = $infosMedecin['prenom'];
                $idRole = $infosMedecin['idRole'];
                connecter($id, $nom, $prenom, $idRole);

                $datenow = $pdo->ajouteConnexionInitiale($id);

                include_once "vues/v_sommaire.php";
            }
            
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