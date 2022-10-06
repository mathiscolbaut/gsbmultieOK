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



    <form style="background: white;width: 30%;text-align: center;margin-left: 35%;border-radius: 10px;"  method="post"  action="index.php?uc=modification&action=valider">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input style="width: 50%;margin-left: 25%" type="text" placeholder="" name="nom" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="<?php echo $_SESSION['leBonNom'];?>">

            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input style="width: 50%;margin-left: 25%" type="text" placeholder="" name="prenom" value="<?php echo $_SESSION['leBonPrenom'];?>" class="form-control"
                   id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input style="width: 50%;margin-left: 25%" type="password" placeholder="" name="mdp" value="<?php echo $_SESSION['leBonMdp'];?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Recopier Password</label>
            <input style="width: 50%;margin-left: 25%" type="password" placeholder="" name="mdpverif" value="<?php echo $_SESSION['mdp2'];?>" class="form-control" id="exampleInputPassword1">
        </div>
        <br>
        <button type="submit" name="button" class="btn btn-primary">Submit</button>
    </form>


<div class="page-content">
    <div class="row">

        <?php include('v_footer.php'); ?>

        <?php };?>
