<?php
if (!$_SESSION['id'])
header('Location: ../index.php');
else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <title>GSB - Modification du produit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/profilcss/profil.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body background="assets/img/laboratoire.jpg">



<?php include('v_navbar.php');?>

        <div class="container-fluid">
        <form style="background: white;width: 30%;text-align: center;margin-left: 35%;border-radius: 10px;"  method="post"
        action="index.php?uc=produit&action=modification&id=<?php echo $identifiant?>"  enctype="multipart/form-data">

            <label for="nom" class="form-control">Nom du produit : <?php echo $pdo->voirProduitById($identifiant)[1];  ?></label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $pdo->voirProduitById($identifiant)[1];  ?>"/>
        
            <label for="objectif" class="form-control">Objectif visé :</label>
            <input type="text" name="objectif" id="objectif" class="form-control" value="<?php echo $pdo->voirProduitById($identifiant)[2];  ?>"/>

            <label for="infos" class="form-control">Informations relatives au produit :</label>
            <input type="text" name="infos" id="infos" class="form-control" value="<?php echo $pdo->voirProduitById($identifiant)[3];  ?>"/>

            <label for="effetIndesirable" class="form-control">Effets indésirables :</label>
            <input type="text" name="effetIndesirable" id="effetIndesirable" class="form-control" value="<?php echo $pdo->voirProduitById($identifiant)[4];  ?>"/>

            <button type="submit" name="button" class="btn btn-primary">Modifier le produit</button>

            </form>
        </div>

<div class="page-content">
    <div class="row">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <?php include('v_footer.php'); ?>

        <?php };?>
