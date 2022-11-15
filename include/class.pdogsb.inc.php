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
    $monObjPdoStatement=$pdo->prepare("SELECT id, nom, prenom,mail,idRole FROM medecin WHERE mail= :login");
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
public function tailleChampsPrenom()
{
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'medecin' AND
COLUMN_NAME = 'prenom'");
    $execution = $pdoStatement->execute();
    $leResultat = $pdoStatement->fetch();
    return $leResultat[0];
}
//La fonction envoieOtp va permettre
//d'envoyer un code de verification par mail aux utilisateurs
//pour pouvoir confirmer leur connection (double authentification)

public function envoieOtp($mail){

    $codeRandom = rand(100000,999999);
    $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE medecin set otp = :code, tempOTP = now() WHERE mail = :mail ");
    $bv1 = $pdoStatement->bindValue(':code', $codeRandom);

    $bv2 = $pdoStatement->bindValue(':mail', $mail);
    $execution = $pdoStatement->execute();

    $to = $mail;
    $subject = 'GSB - CODE OTP 1 minutes';
    $message = 'Bonjour voici votre code OTP : ' . $codeRandom;
    $headers = 'From: verif@gsb.fr' . "\r\n" .
        'Reply-To: verif@gsb.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    return $execution;
}


    /**
     * ZONE TOKEN VALIDATION EMAIL
     * @author chloé
     */

public function envoieToken($mail){

    $codeRandom = $this->generateRandomString(20);
    $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE medecin set token = :code, tokenDate = now() WHERE mail = :mail ");
    $bv1 = $pdoStatement->bindValue(':code', $codeRandom);

    $bv2 = $pdoStatement->bindValue(':mail', $mail);
    $execution = $pdoStatement->execute();

    $to = $mail;
    $subject = 'GSB - Confirmer votre compte';
    $message = 'Bonjour veuillez confirmer votre compte ici : http://localhost:8888/Quesque/GSBMulti/index.php?uc=creation&action=valideToken&mail='.$mail.'&token=' . $codeRandom."\n\nVous pouvez aussi confirmer votre compte via le code: ".$codeRandom;
    $headers = 'From: verif@gsb.fr' . "\r\n" .
        'Reply-To: verif@gsb.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    return $execution;
}

function verifierSiValider($mail) {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT token,tokenDate FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    return $resultatRequete['token'] == null;
}

function verifToken($mail, $token) {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT token,tokenDate FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    if(!$execution) {
        echo "<h1 style='color: red'>Erreur dans la requête</h1>";
        return false;
    }
    if($resultatRequete['token'] == null) {
        echo "<h1 style='color: red'>Votre compte à déjà verifié</h1>";
        return false;
    }


    $d1 = strtotime("now");
    $d2 = (strtotime($resultatRequete['tokenDate']));



    //La date du token est trop vieux, on en renvoie un
    //24 heures en secondes *24
    if(($d1-$d2) >(3600*24))
    {
        $this->envoieToken($mail);
        echo "<h1 style='color: red'>Code trop vieux, vous allez recevoir un nouveau code'</h1>";

    } else {
        if($resultatRequete['token']==$token) {
            $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE medecin set token = NULL WHERE mail = :mail ");
            $bv2 = $pdoStatement->bindValue(':mail', $mail);
            $execution = $pdoStatement->execute();
            return true;
        } else {
            echo "<h1 style='color: red'>Erreur le token est incorrect</h1>";
        }
    }
    return false;
}

    /**
     * FIN ZONE EMAIL
     *
     */

    /**
     * ZONE VALIDATEUR
     */
public function verifierMedecinAupresValidateur($mailMedecin) {

    $pdo = PdoGsb::$monPdo;
    $monObjPdoStatement=$pdo->prepare("SELECT mail FROM medecin WHERE idRole=3");

    if ($monObjPdoStatement->execute()) {


        //Envoyer à tout les validateurs
        foreach ($monObjPdoStatement->fetch() as $validateur) {
            $this->envoieValidation($mailMedecin, $validateur);
        }

    }
    else
        throw new Exception("erreur");
}

public function envoieValidation($mailMedecin, $mailValidateur){

        //Evite les doubles envoies
        if($this->verifierSiMedecinValiderTokenExistant($mailMedecin)) {

            $codeRandom = $this->generateRandomString(20);
            $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE medecin set tokenValidationMedecin = :code WHERE mail = :mail ");
            $bv1 = $pdoStatement->bindValue(':code', $codeRandom);

            $bv2 = $pdoStatement->bindValue(':mail', $mailMedecin);
            $execution = $pdoStatement->execute();

            $to = $mailMedecin;
            $subject = 'GSB Validateur - Demande de validation Dr '.$this->donneLeMedecinByMail($mailMedecin)[1].' '.$this->donneLeMedecinByMail($mailMedecin)[2];
            $message = 'Bonjour veuillez confirmer le compte du Dr '.$this->donneLeMedecinByMail($mailMedecin)[1].' '.$this->donneLeMedecinByMail($mailMedecin)[2].' ici : http://localhost:8888/Quesque/GSBMulti/index.php?uc=validationMedecin&action=validationMedecin&mail=' . $mailMedecin . '&token=' . $codeRandom . "\n\nVous pouvez aussi confirmer votre compte via le code: " . $codeRandom;
            $headers = 'From: verifValidateur@gsb.fr' . "\r\n" .
                'Reply-To: verifValidateur@gsb.fr' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            //Mail crypté
            mb_send_mail($to, $subject, $message, $headers);
            return $execution;
        } else{
            return false;
        }
 }


public function verifierSiMedecinValider($mail) {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT valide, idRole FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    //Les utilisateurs non médecin ne doivent pas le confirmer
    if($resultatRequete['idRole']!=1) {
        return true;
    }

    return $resultatRequete['valide'] == 1;
}

private function verifierSiMedecinValiderTokenExistant($mail) {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT tokenValidationMedecin FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    return $resultatRequete['tokenValidationMedecin'] == null;
}

public function verifierTokenMedecinValider($mail, $token) {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT tokenValidationMedecin FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    if(!$execution) {
        echo "<h1 style='color: red'>Erreur dans la requête</h1>";
        return false;
    }
    if($resultatRequete['tokenValidationMedecin'] == null) {
        echo "<h1 style='color: red'>Le médecin a déjà été validé</h1>";
        return false;
    }

    if($resultatRequete['tokenValidationMedecin']==$token) {
        $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE medecin set tokenValidationMedecin = NULL,  valide = 1 WHERE mail = :mail ");
        $bv2 = $pdoStatement->bindValue(':mail', $mail);
        $execution = $pdoStatement->execute();


        //Envoie email au médecin pour le prévenir qu'il est validé
        $to = $mail;
        $subject = 'GSB Validateur - Dr '.$this->donneLeMedecinByMail($to)[1].' '.$this->donneLeMedecinByMail($to)[2].' vous êtes validé(e)!';
        $message = 'Bonjour Dr '.$this->donneLeMedecinByMail($to)[1].' '.$this->donneLeMedecinByMail($to)[2].' Vous avez été validé par noss Validateurs, félicitations et bienvenue sur GSB !';
        $headers = 'From: verifValidateur@gsb.fr' . "\r\n" .
            'Reply-To: verifValidateur@gsb.fr' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        echo "<h1 style='color: lawngreen'>Le médecin a été validé</h1>";

        return true;
    } else {
        echo 'Erreur, le token de validation indiqué est incorrect';
    }


    return false;
}

    /**
     * MAINTENANCE
     *
     */

public function enMaintenance() {
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT valeur FROM etatSite WHERE infoSite = 'maintenance'");
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();

    return $resultatRequete['valeur'] == 1;
}
public function miseenMaintenance($bool) {
    $enMaintenance = boolval($bool=="on") ? "1" : "0";

        $pdoStatement = PdoGsb::$monPdo->prepare("UPDATE etatSite SET valeur = ".$enMaintenance." WHERE infoSite = 'maintenance'");
        $execution = $pdoStatement->execute();

        if($enMaintenance=="1") {
            echo "<h1 style='color: lawngreen'>Le site est en maintenance !</h1>";
        } else if($enMaintenance=="0") {
            echo "<h1 style='color: lawngreen'>Le site n'est plus en maintenance !</h1>";
        }

        return $execution;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function verifOpt($mail ,$codeOtp){

   // $codeBon=false;
    $pdoStatement = PdoGsb::$monPdo->prepare("SELECT otp,tempOTP FROM medecin WHERE mail = :leMail");
    $bv1 = $pdoStatement->bindValue(':leMail', $mail);
    $execution = $pdoStatement->execute();


    $resultatRequete = $pdoStatement->fetch();

  
    

    $datetime = new DateTime($resultatRequete['tempOTP']);
    $datetime->modify('+1 minute');
    
    $dateNow = new DateTime(date("Y-m-d H:i:s"));
  
    if($dateNow < $datetime)
    {
        if ($resultatRequete['otp']==$codeOtp)
        $codeBon = true;
        else
            $codeBon=false;

    }
    else{
       
        $codeBon = false;
    }

    return $codeBon;

}


public function creeMedecin($email, $nom, $prenom, $mdp, $idRole)
{
    $pdoStatement = PdoGsb::$monPdo->prepare("INSERT INTO medecin(id,mail,nom,prenom, motDePasse,dateCreation,dateConsentement,idRole) "
            . "VALUES (null, :leMail, :leNom, :lePrenom, :leMdp, now(),now(),:lIdRole)");
    $bv1 = $pdoStatement->bindValue(':leMail', $email);
    $bv2 = $pdoStatement->bindValue(':leNom', $nom);
    $bv3 = $pdoStatement->bindValue(':lePrenom', $prenom);
    $bv4 = $pdoStatement->bindValue(':leMdp', $mdp);
    $bv5 = $pdoStatement->bindValue(':lIdRole',$idRole);

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
            . "VALUES (:leMedecin, now(), NULL)");
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

    //permet de modifier les infos sans re-hash un nouveau mot de passe
    if(strlen($password) == 0){
        $sql = "UPDATE medecin SET nom=?, prenom=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $id]);
        echo '2';
    } else { //Dans ce cas le mot de passe est demandé modifié via $password, on le modifie
        $sql = "UPDATE medecin SET nom=?, prenom=?, motDePasse=? WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $password, $id]);
        echo '3';
    }




}


}
?>