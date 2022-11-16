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

<?php if($_SESSION['idRole'] == 5){?>
<div style="background: white;width: 40%;text-align: center;margin-left: 30%;border-radius: 10px; padding-bottom: 0.5%; padding-top: 1%;">
    <form method="post"  style="align-content: center" action="index.php?uc=visioconferences&action=demandeCreation"><button type="submit" name="button" class="btn btn-success">Créer un évenement</form>
</div>
<br>
<?php }  ?>

<div style="background: white;width: 80%;text-align: center;margin-left: 10%;border-radius: 10px;" >


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Objectif</th>
            <th scope="col">Date</th>
            <th scope="col">URL</th>
            <th scope="col">S'inscrire</th>
            <th scope="col">Avis</th>
            <?php


            switch ($_SESSION['idRole']) {
                case 5: //Admin
                    echo '<th scope="col">Gestion</th>';
                    echo '<th scope="col">Gestion</th>';
                    break;
            }


            ?>
        </tr>
        </thead>
        <tbody>




    <?php

    $nbVisio =0;
    $visioIDS = $pdo->recupererVisioIds();
    for ($i = 0; $i < count($visioIDS); $i++) {
        echo "<tr>";
        if($visioIDS[$i][0] != null) {
            $nbVisio++;
            $visioId = $visioIDS[$i][0];

            $visioInfo = $pdo->recupererVisioInfo($visioId);

                $nom = $visioInfo[1];
                $objectiff = $visioInfo[2];
                $url = $visioInfo[3];
                $dateVisio = $visioInfo[4];
                $estInscrit =  $pdo->estInscriVisio($visioId, $_SESSION['id']);
                $date=date_create($dateVisio);

        }




        ?>
    <tr>
            <th scope="row"><?php echo $nbVisio ?></th>
            <td><?php echo $nom ?></td>
            <td><?php echo $objectiff ?></td>
            <td><?php echo date_format($date,"D M Y"); ?></td>

            <?php

            $d1 = strtotime("now");

            if(strtotime($dateVisio) > $d1)
            {
                echo '<td><button type="button" name="button" class="btn btn-primary" onclick="location.href">Rejoindre la visioconférence</button></td>';

                if($estInscrit) {
                    echo '<td><form method="post"  action="index.php?uc=visioconferences&action=desinscription&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-danger">Se désinscrire</form></td>';
                } else {
                    echo '<td><form method="post"  action="index.php?uc=visioconferences&action=inscription&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-primary">S\'inscrire</form></td>';
                }
            } else {
                echo '<td><button type="button" name="button" class="btn btn-primary disabled" onclick=">">Conférence terminée</button></td>';
                if($estInscrit) {
                    if($pdo->aDejaPosteAvis($visioId,$_SESSION['id'])) {
                        if($pdo->aDejaPosteAvis($visioId,$_SESSION['id'])[1] != null) {
                            echo '<td><form method="post"  action=""><button type="submit" name="button" class="btn btn-success disabled">Votre avis est en attende de modération</form></td>';
                        } else {
                            echo '<td><form method="post"  action=""><button type="submit" name="button" class="btn btn-success disabled">Votre avis été publié</form></td>';
                        }
                    } else {
                        echo '<td><form method="post"  action="index.php?uc=visioconferences&action=demandeAjoutAvis&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-success">Laisser un avis!</form></td>';
                    }
                } else {
                    echo '<td><form method="post"  action="index.php?uc=visioconferences&action=inscription&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-primary disabled">Conférence passée</form></td>';
                }
            }
            echo '<td><form method="post"  action="index.php?uc=visioconferences&action=avisListe&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-primary">Voir les avis</form></td>';
            ?>


            <?php


            switch ($_SESSION['idRole']) {
                case 5: //Admin
                        echo '<td><form method="post"  action="index.php?uc=visioconferences&action=demandeModification&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-warning">Modifier</form></td>';
                        echo '<td><form method="post"  action="index.php?uc=visioconferences&action=supprimer&idVisio='.$visioId.'"><button type="submit" name="button" class="btn btn-danger">Supprimer</form></td>';
                    break;
                }
            }
            echo "</tr>";

            ?>

        </tbody>
    </table>
</div>

<div  style="margin-right: 20%" class="page-content">
    <div class="row">


<?php include('v_footer.php'); ?>

<?php };?>
