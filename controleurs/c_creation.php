<?php


if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeCreation';
}
$action = $_GET['action'];
switch($action){
	
	case 'demandeCreation':{
		include("vues/v_creation.php");
		break;
	}
	case 'valideCreation':{
		           
		$leLogin = htmlspecialchars($_POST['login']);
        $lePassword = htmlspecialchars($_POST['mdp']);
        $lePrenom = htmlspecialchars($_POST['prenom']);
        $leNom = htmlspecialchars($_POST['nom']);
        
        if ($leLogin == $_POST['login'])
        {
             $loginOk = true;
             $passwordOk = true;
             $nomOk = true;
             $prenomOk = true;
        }
        else{
            echo 'tentative d\'injection javascript - login refusé';
             $loginOk = false;
             $passwordOk=false;
             $nomOk = false;
             $prenomOk = false;
        }
        //test récup données
        //echo $leLogin.' '.$lePassword;
        $rempli=false;
        if ($loginOk && $passwordOk && $nomOk && $prenomOk){
        //obliger l'utilisateur à saisir login/mdp + le nom et le prénom
        $rempli=true; 
        if (empty($leLogin)==true) {
            echo 'Le login n\'a pas été saisi<br/>';
            $rempli=false;
        }
        if (empty($lePrenom)==true){
            echo 'Le prénom n\'a pas été saisi<br/>';
            $rempli=false;
        }
        if (empty($leNom)==true){
            echo 'Le nom n\'a pas été saisi<br/>';
            $rempli=false;
        }
        if (empty($lePassword)==true){
            echo 'Le mot de passe n\'a pas été saisi<br/>';
            $rempli=false; 
        }
        //si le login et le mdp contiennent quelque chose
        // on continue les vérifications
        if ($rempli){
            //supprimer les espaces avant/après saisie
            $leLogin = trim($leLogin);
            $lePassword = trim($lePassword);
            $lePrenom = trim($lePrenom);
            $leNom = trim($leNom);
            //vérification de la taille des champs de prénom, nom et mail
            
            $nbCarMaxLogin = $pdo->tailleChampsMail();
            if(strlen($leLogin)>$nbCarMaxLogin){
                 echo 'Le login ne peut contenir plus de '.$nbCarMaxLogin.'<br/>';
                $loginOk=false;
            }
            
            //vérification du format du login
           if (!filter_var($leLogin, FILTER_VALIDATE_EMAIL)) {
                echo 'Le mail n\'a pas un format correct<br/>';
                $loginOk=false;
            }

            $nbCarMaxPrenom = $pdo->tailleChampsPrenom();
            if(strlen($lePrenom)>$nbCarMaxPrenom){
                echo 'Le prénom ne peut contenir plus de '.$nbCarMaxPrenom.'<br/>';
                $prenomOk = false;
            }
            
            $nbCarMaxNom = $pdo->tailleChampsNom();
            if(strlen($leNom)>$nbCarMaxNom){
                echo 'Le nom ne peut contenir plus de '.$nbCarMaxNom.'<br/>';
                $nomOk = false;
            }
            //vérification du format du mot de passe
            $patternPassword='#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W){12,}#';
            if (preg_match($patternPassword, $lePassword)==false){
                echo 'Le mot de passe doit contenir au moins 12 caractères, une majuscule,'
                . ' une minuscule et un caractère spécial<br/>';
                $passwordOk=false;
            }
        }
        }
        if($rempli && $loginOk && $passwordOk && $nomOk && $prenomOk){
                echo 'tout est ok, nous allons pouvoir créer votre compte...<br/>';
                $executionOK = $pdo->creeMedecin($leLogin,$leNom,$lePrenom,password_hash($lePassword, PASSWORD_DEFAULT));
                $executionOK = $pdo->creeMedecin($leLogin,$leNom,$lePrenom,$lePassword);
                $executionOK = $pdo->creeMedecin($leLogin,$lePassword);

                $pdo->connexionInitiale($leLogin);



                if ($executionOK==true){
                    echo "c'est bon, votre compte a bien été créé ;-)";
                    $pdo->connexionInitiale($leLogin);
                }   
                else
                     echo "ce login existe déjà, veuillez en choisir un autre";
            }

			
        
        break;	
}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>