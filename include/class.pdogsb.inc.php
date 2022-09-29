<?php

class PdoGsb{   		
    private static $serveur='mysql:host=remi-becquaert.fr';
    private static $bdd='dbname=gsbextranetgroupe';
    private static $user='gsb2';
    private static $mdp='gsb2';
	private static $monPdo;
	private static $monPdoGsb=null;
		
/**
 * Constructeur privÃ©, crÃ©e l'instance de PDO qui sera sollicitÃ©e
 * pour toutes les mÃ©thodes de la classe
 */				
	private function __construct(){
          
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crÃ©e l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * vÃ©rifie si le login et le mot de passe sont corrects
 * renvoie true si les 2 sont corrects
 * @param type $lePDO
 * @param type $login
 * @param type $pwd
 * @return bool
 * @throws Exception
 */
function checkUser($login,$pwd):bool {
    //AJOUTER TEST SUR TOKEN POUR ACTIVATION DU COMPTE
    $user=false;
    $pdo = PdoGsb::$monPdo;
    $monObjPdoStatement=$pdo->prepare("SELECT motDePasse FROM medecin WHERE mail= :login AND token IS NULL");
    $bvc1=$monObjPdoStatement->bindValue(':login',$login,PDO::PARAM_STR);
    
    if ($monObjPdoStatement->execute()) {
        $unUser=$monObjPdoStatement->fetch();
        if (is_array($unUser)){
           if (password_verify($pwd, $unUser['motDePasse'])){
            $user=true;
           }
        }
    }
    else
        throw new Exception("erreur dans la requÃªte");
return $user;   
}


	

function donneLeMedecinByMail($login) {
    
    $pdo = PdoGsb::$monPdo;
    $monObjPdoStatement=$pdo->prepare("SELECT id, nom, prenom,mail FROM medecin WHERE mail= :login");
    $bvc1=$monObjPdoStatement->bindValue(':login',$login,PDO::PARAM_STR);
    if ($monObjPdoStatement->execute()) {
        $unUser=$monObjPdoStatement->fetch();
       
    }
    else
        throw new Exception("erreur dans la requÃªte");
return $unUser;   
}


public function tailleChampsMail(){
    
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS
    WHERE table_name = 'medecin' AND COLUMN_NAME = 'mail'");
    $execution = $pdoStatement->execute();
    $leResultat = $pdoStatement->fetch();  
    return $leResultat[0];
}

public function tailleChampsNom(){
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'medecin' AND
    COLUMN_NAME = 'nom'");
    $execution = $pdoStatement->execute();
    $leResultat = $pdoStatement->fetch();  
    return $leResultat[0];
}

public function tailleChampsPrenom(){
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'medecin' AND
    COLUMN_NAME = 'prenom'");
    $execution = $pdoStatement->execute();
    $leResultat = $pdoStatement->fetch();  
    return $leResultat[0];
}


public function creeMedecin($email, $nom, $prenom, $mdp)
{
    $pdoStatement = PdoGsb::$monPdo->prepare("INSERT INTO medecin(id,mail,nom,prenom, motDePasse,dateCreation,dateConsentement) "
            . "VALUES (null, :leMail, :leNom, :lePrenom, :leMdp, now(),now())");
    $bv1 = $pdoStatement->bindValue(':leMail', $email);
    $bv2 = $pdoStatement->bindValue(':leNom', $nom);
    $bv3 = $pdoStatement->bindValue(':lePrenom', $prenom);
    $bv4 = $pdoStatement->bindValue(':leMdp', $mdp);
    $execution = $pdoStatement->execute();
    return $execution;
    
}


function testMail($email){
    $pdo = PdoGsb::$monPdo;
    $pdoStatement = $pdo->prepare("SELECT count(*) as nbMail FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $email);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    if ($resultatRequete['nbMail']==0)
        $mailTrouve = false;
    else
        $mailTrouve=true;
    
    return $mailTrouve;
}




function connexionInitiale($mail){
     $pdo = PdoGsb::$monPdo;
    $medecin= $this->donneLeMedecinByMail($mail);
    $id = $medecin['id'];
    $this->ajouteConnexionInitiale($id);
    
}

function ajouteConnexionInitiale($id){
    $pdoStatement = PdoGsb::$monPdo->prepare("INSERT INTO historiqueconnexion "
            . "VALUES (:leMedecin, now(), now())");
    $bv1 = $pdoStatement->bindValue(':leMedecin', $id);
    $execution = $pdoStatement->execute();
    return $execution;
    
}
function ajouterDeconnection($id, $dateDebutLog){
    $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE historiqueconnexion
    SET dateFinLog = now() WHERE idMedecin = :id  and dateDebutLog = :dateDeb");
    $bv1 = $pdoStatement->bindValue(':id', $id);
    $bv1 = $pdoStatement->bindValue(':dateDeb', $dateDebutLog);
    $execution = $pdoStatement->execute();
    return $execution;

}
function donneinfosmedecin($id){
  
    $pdo = PdoGsb::$monPdo;
    $monObjPdoStatement=$pdo->prepare("SELECT id,nom,prenom,motDePasse FROM medecin WHERE id= :lId");
    $bvc1=$monObjPdoStatement->bindValue(':lId',$id,PDO::PARAM_INT);

    if ($monObjPdoStatement->execute()) {
       return $unUser=$monObjPdoStatement->fetch();
   
    }
    else
        throw new Exception("erreur");
           
    
}

function changeinfosmedecin($id,$nom,$prenom,$password){

    $pdo = PdoGsb::$monPdo;
    $sql = "UPDATE medecin SET nom=?, prenom=?, motDePasse=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $password, $id]);



}


}
?>