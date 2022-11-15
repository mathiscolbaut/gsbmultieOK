<?php
if (!$_SESSION['id'])
header('Location: ../index.php');
else {
?>
﻿<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <title>GSB -extranet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/profilcss/profil.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body background="assets/img/laboratoire.jpg">

<?php include('v_navbar.php');?>



    <form style="background: white;width: 30%;text-align: center;margin-left: 35%;border-radius: 10px;"  method="post"  action="index.php?uc=admin&action=MiseMaintenance">


        <div class="form-check form-switch">
            <p class="form-check-label" for="flexSwitchCheckChecked">Site en maintenance</p>
            <input class="form-check-input" name="toggle" type="checkbox" id="flexSwitchCheckChecked" <?php echo ($pdo->enMaintenance() == true ? 'checked' : '')?>>
        </div>
        <br/>

        <button type="submit" name="button" class="btn btn-primary">Envoyer</button>
    </form>


<div class="page-content">
    <div class="row">

        <?php include('v_footer.php'); ?>

        <?php };?>
