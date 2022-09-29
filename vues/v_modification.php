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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?uc=connexion&action=accueil">Galaxy Swiss Bourdin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="active"><a href="index.php?uc=etatFrais&action=selectionnerMois">M'inscrire à une visio</a></li>
                <li class=""><a href="index.php?uc=modification&action=changeinformation&page=modif">Modifier vos informations</a></li>
                <li class="active"><a href="">LELLELELELEL</a></li>


            </ul>

            <ul class="nav navbar-nav navbar-right">
                <a style="margin-top: 3%" class="btn btn-danger" href="index.php?uc=connexion&action=deco" role="button">Logout</a>
                <li><a><?php echo $_SESSION['prenom']."  ".$_SESSION['nom']?></a></li>
                <li><a>Médecin</a></li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


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
