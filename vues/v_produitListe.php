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
    <title>GSB - Gestion produit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/profilcss/profil.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body background="assets/img/laboratoire.jpg">

<br>

<?php include('v_navbar.php');?>

<div style="background: white;width: 80%;text-align: center;margin-left: 10%;border-radius: 10px;" >


<table class="table">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Objectif</th>
        <th scope="col">Informations</th>
        <th scope="col">Effets indésirables</th>
        <th scope="col">Modification</th>
        <th scope="col">Suppression</th>
    </tr>
    </thead>
    <tbody>




<?php
$produits = $pdo->voirProduit();
for ($i = 0; $i < count($produits); $i++) {
 if ($produits[$i][0] != null) {

     echo '<tr>';
     echo '<th scope="row">'.$produits[$i][1].'</th>';
     echo '<td>'.$produits[$i][2].'</td>';
     echo '<td>'.$produits[$i][3].'</td>';
     echo '<td>'.$produits[$i][4].'</td>';
     echo '<td><a href="index.php?page=produit&id='.$produits[$i][0].'">Modifier le produit</a></td>';
     echo '<td><a href="index.php?uc=produit&action=suppression&id='.$produits[$i][0].'">Supprimer le produit</a></td>';
     echo '</tr>';
 }
}
    ?>

    </tbody>
</table>
</div>
<div class="page-content">
    <div class="row">

        <?php include('v_footer.php'); ?>

        <?php };?>
