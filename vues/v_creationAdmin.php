<?php
if (!$_SESSION['id']){
header('Location: ../index.php');}
if ($_SESSION['idRole'] != 5){

include "vues/v_sommaire.php";
} else{

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <title>GSB - Création Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/profilcss/profil.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body background="assets/img/laboratoire.jpg">

<?php include('v_navbar.php');?>



<div class="page-content">
    <div class="row">
        <div class="page-content container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrapper">
                        <div class="box">	
                            <div class="content-wrap">
                                <legend>Formulaire de création d'administrateur</legend>
                                <form method="post" action="index.php?uc=creation&action=valideCreationAdmin">
                                    <input name="loginAdmin" class="form-control" type="email" placeholder="Mail"/>
                                    <input name="mdpAdmin" class="form-control" type="password" placeholder="Mot de passe"/>
                                    <input name="prenomAdmin" class="form-control" type="text" placeholder="Prénom"/>
                                    <input name="nomAdmin" class="form-control" type="text" placeholder="Nom"/>
                                    <select class="form-control" name="idRole">
                                        <option value=5>Administrateur</option>
                                    </select>                                                
                                    <br>
                                    <input type="submit" class="btn btn-primary signup" value="Créer"/>
                                </form>
                                </br>						
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php include('v_footer.php'); ?>

        <?php };?>
