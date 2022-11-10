<?php

include_once "include/fct.inc.php";
include_once "include/class.pdogsb.inc.php";

$lePdo = PdoGsb::getPdoGsb();

$estConnecte = estConnecte();

if($estConnecte){
    if(!isset($_GET['action'])){
        $_GET['action'] = 'changeinformation';
    }
    $action = $_GET['action'];

    switch($action) {
        case 'changeinformation':
        {
            if (isset($_SESSION['id'])) {



                $lemedecin = $lePdo->donneinfosmedecin($_SESSION['id']);

                $_SESSION['leBonNom'] = $lemedecin['nom'];
                $_SESSION['leBonPrenom'] = $lemedecin['prenom'];
                $_SESSION['leBonMdp'] = $lemedecin['motDePasse'];
                $_SESSION['mdp2'] = $lemedecin['motDePasse'];
                include("vues/v_modification.php");


            } else {
                echo "Je ne te connais pas...";
            }
            break;
        }
        case 'valider':
        {

            $id = $_SESSION['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pass = $_POST['mdp'];
            $passVerif = $_POST['mdpverif'];

            if(strlen($pass > 0)) {

                if ($pass != $passVerif) {
                    echo "Les mots de passe ne corresponde pas!";
                    return;
                }
            }

            $lePdo->changeinfosmedecin($id, $nom, $prenom, strlen($pass > 0) ? password_hash($pass, PASSWORD_DEFAULT) : "");

            echo "Les modifications on bien été prise en compte";
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            include "vues/v_sommaire.php";



            break;
        }

    }


}




?>