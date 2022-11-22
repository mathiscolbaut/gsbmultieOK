<?php


if(!isset($_GET['action'])){
    include("vues/v_navbar.php");

}
$action = $_GET['action'];
switch($action){
	
	case 'demandeAjout':{
		include("vues/v_produitAjout.php");
		break;
    }

    case 'ajouter':{

        $photo = null;
        $leNom = htmlspecialchars($_POST['nom']);
        $lObjectif = htmlspecialchars($_POST['objectif']);
        $lesInfos = htmlspecialchars($_POST['infos']);
        $lesEffets = htmlspecialchars($_POST['effetIndesirable']);

        $photo = $upload->enregistrer('photo');

        $nomOk = true;
        $objectifOk = true;
        $infosOk = true;
        $effetsOk = true;

        $rempli = false;

        if ($nomOk && $objectifOk && $infosOk && $effetsOk){
            $rempli=true; 
            if (empty($leNom)==true) {
                echo 'Le nom du produit n\'a pas été saisi<br/>';
                $rempli=false;
            }
            if (empty($lObjectif)==true){
                echo 'L\'objectif du produit n\'a pas été saisi<br/>';
                $rempli=false;
            }
            if (empty($lesInfos)==true){
                echo 'Les infos du produit n\'ont pas été saisis<br/>';
                $rempli=false;
            }
            if (empty($lesEffets)==true){
                echo 'Les effets secondaires du produit n\'ont pas été saisis<br/>';
                $rempli=false; 
            }
        }
        if($rempli && $nomOk && $objectifOk && $infosOk && $effetsOk){
            echo 'Création du produit en cours<br/>';
            $executionOK = $pdo->creeProduit($leNom, $lObjectif, $lesInfos, $lesEffets, $photo['nom']);
            if ($executionOK==true){
                echo "Produit ajouté dans la base de données !";
            }   
            else
                 echo "Erreur dans l\'ajout du produit";

        }    
		include("vues/v_produitAjout.php");
        break;
    }

    case 'modification':{
        if (!empty($_GET['id'])){
            $identifiant =  $_GET['id'];
        } else{
            echo "Erreur Id produit";
            return;
        }
        $photo = null;
        $leNom = htmlspecialchars($_POST['nom']);
        $lObjectif = htmlspecialchars($_POST['objectif']);
        $lesInfos = htmlspecialchars($_POST['infos']);
        $lesEffets = htmlspecialchars($_POST['effetIndesirable']);


        $photo = $upload->enregistrer('photo');

        $nomOk = true;
        $objectifOk = true;
        $infosOk = true;
        $effetsOk = true;

        $rempli = false;

        if ($nomOk && $objectifOk && $infosOk && $effetsOk){
            $rempli=true;
            if (empty($leNom)==true) {
                echo 'Le nom du produit n\'a pas été saisi<br/>';
                $rempli=false;
            }
            if (empty($lObjectif)==true){
                echo 'L\'objectif du produit n\'a pas été saisi<br/>';
                $rempli=false;
            }
            if (empty($lesInfos)==true){
                echo 'Les infos du produit n\'ont pas été saisis<br/>';
                $rempli=false;
            }
            if (empty($lesEffets)==true){
                echo 'Les effets secondaires du produit n\'ont pas été saisis<br/>';
                $rempli=false;
            }
        }
        if($rempli && $nomOk && $objectifOk && $infosOk && $effetsOk){
            $executionOK = $pdo->updateProduit($identifiant, $leNom, $lObjectif, $lesInfos, $lesEffets, $photo['nom']);
            if ($executionOK==true){
                echo "<h1>Produit modifié dans la base de données !</h1>";
            }
            else
                echo "<h1>Erreur dans l\'ajout du produit</h1>";

        }
        include("vues/v_produitListe.php");
        break;
    }

    case 'voirProduit':{
		include("vues/v_produitListe.php");
        break;
    }
    case 'voirProduitModifications':{
        if (!empty($_GET['id'])){
            $identifiant = $_GET['id'];
        }
		include("vues/v_produitListeActions.php");
        break;
    }

    case 'demandeModif':{
        $identifiant = $_GET['id'];
        include("vues/v_produitModif.php");
        break;
    }

    case 'suppression':{
        if (isset($_GET['id'])){
            $identifiant = $_GET['id'];
            $executionOK = $pdo->deleteProduit($identifiant);
            if ($executionOK==true){
                echo "<h1>Produit supprimé !</H2>";
            }   
            else{
                echo "Erreur dans la suppression du produit";

            }
            include("vues/v_produitListe.php");
        }
        else{
            echo "Produit inexistant !";
        }    
        break;
    }

	default :{
		include("vues/v_navbar.php");
		break;
	}
}

?>