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


<div style="background: white;width: 40%;text-align: center;margin-left: 30%;border-radius: 10px; padding-bottom: 0.5%; padding-top: 1%;">
    <h3>Avis pour  la visioconférence: </h3>
</div>
<br>

<div style="background: white;width: 80%;text-align: center;margin-left: 10%;border-radius: 10px;" >


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom visioconférence</th>
            <th scope="col">Prénom/Nom</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Approuver</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>




    <?php

    $nbCom = 0;

    foreach ($pdo->recupererAvisModeration() as $item) {
        $nbCom++;
//idVisio, idMedecin, avis,token


        echo '<tr>';
        echo '<th scope="row">'.$nbCom.'</th>';
        echo '<td>'.$pdo->recupererVisioInfo($item[0])[1].'</td>';
        echo '<td>'.$pdo->donneinfosmedecin($item[1])[2].' '.$pdo->donneinfosmedecin($item[1])[1].'</td>';
        echo '<td>'.$item[2].'</td>';
        echo '<td><form method="post"  action="index.php?uc=visioconferences&action=validationAvis&token='.$item[3].'&idUser='.$item[1].'&idVisio='.$item[0].'"><button type="submit" name="button" class="btn btn-success">Approuver</form></td>';
        echo '<td><form method="post"  action="index.php?uc=visioconferences&action=deleteAvis&idUser='.$item[1].'&idVisio='.$item[0].'"><button type="submit" name="button" class="btn btn-danger">Supprimer</form></td>';

        echo '</tr>';
    }


    ?>

        </tbody>
    </table>
</div>

<div  style="margin-right: 20%" class="page-content">
    <div class="row">


<?php include('v_footer.php'); ?>

<?php };?>
