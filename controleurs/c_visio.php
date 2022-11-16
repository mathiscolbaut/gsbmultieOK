<?php


if(!isset($_GET['action'])){
    include("vues/v_navbar.php");

}
$action = $_GET['action'];
switch($action){
	
	case 'demandeCreation':{
		include("vues/v_visioCreer.php");
		break;
	}
    case 'demandeModification':{
        $idVisio = $_GET['idVisio'];
        $nom = $pdo->recupererVisioInfo($idVisio)[1];
        $objectif = $pdo->recupererVisioInfo($idVisio)[2];
        $url = $pdo->recupererVisioInfo($idVisio)[3];
        $date = $pdo->recupererVisioInfo($idVisio)[4];

        include("vues/v_visioModifier.php");
		break;
	}
    case 'liste':{

        include("vues/v_visioListe.php");
        break;
    }
    case 'creer':{

        if(verifierLesChamps()) {
            $visioNom = $_POST['visioNom'];
            $visioObjectif = $_POST['visioObjectif'];
            $visioURL = $_POST['visioURL'];
            $visioDate = $_POST['visioDate'];

            if (!$pdo->creerVisio($visioNom, $visioObjectif, $visioURL, $visioDate)) {
                echo "ERREUR, verifiez que  votre URL et nom fassent moins de 100 caractères ";
            }
            include("vues/v_visioListe.php");
        }


        break;
	}
    case 'modifier':{
        $idVisio = $_GET['idVisio'];
        if(verifierLesChamps()) {
            $visioNom = $_POST['visioNom'];
            $visioObjectif = $_POST['visioObjectif'];
            $visioURL = $_POST['visioURL'];
            $visioDate = $_POST['visioDate'];

            if (!$pdo->modifierVisio($idVisio, $visioNom, $visioObjectif, $visioURL, $visioDate)) {
                echo "ERREUR, verifiez que  votre URL et nom fassent moins de 100 caractères ";

            }
            include("vues/v_visioListe.php");
        }


        break;
    }
    case 'supprimer':{
        $idVisio = $_GET['idVisio'];
        if (!$pdo->supprimerVisio($idVisio)) {
            echo "ERREUR";
        }
        include("vues/v_visioListe.php");

        break;
    }
    case 'inscription':{
        $idVisio = $_GET['idVisio'];
        if (!$pdo->inscriptionVisio($idVisio, $_SESSION['id'])) {
            echo "ERREUR, impossible de vous inscrire";

        }
        include("vues/v_visioListe.php");


        break;
    }
    case 'desinscription':{
        $idVisio = $_GET['idVisio'];
        if (!$pdo->deleteInscriptionVisio($idVisio, $_SESSION['id'])) {
            echo "ERREUR, impossible de vous désinscrire";

        }
        include("vues/v_visioListe.php");


        break;
    }

	default :{
		include("vues/v_navbar.php");
		break;
	}
}

    function verifierLesChamps() {
        if(empty($_POST['visioNom'])) {
            echo 'Veuillez indiquer le nom de la visioconférence';
            return false;
        }

        if(empty($_POST['visioObjectif'])) {
            echo 'Veuillez indiquer lobjectif de la visioconférence';
            return false;
        }

        if(empty( $_POST['visioURL'])) {
            echo 'Veuillez indiquer lURL de la visioconférence';
            return false;
        }

        if(empty( $_POST['visioDate'])) {
            echo 'Veuillez indiquer la date de la visioconférence';
            return false;
        }
        return true;

}

?>