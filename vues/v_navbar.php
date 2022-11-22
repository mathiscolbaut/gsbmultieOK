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
      <a class="navbar-brand" href="#">Galaxy Swiss Bourdin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      <?php

      //si l'identifiant du role correspond à 1 (medecin), on affiche des elements de navbar de medecin
      switch ($_SESSION['idRole']) {
          case 1:
              include "vues/navbar/v_navbarMedecin.php";
              break;
          case 2:
              include "vues/navbar/v_navbarModerateurs.php";
              break;
          case 3:
              include "vues/navbar/v_navbarValidateurs.php";
              break;
          case 4:
              include "vues/navbar/v_navbarChefProduit.php";
              break;
          case 5:
              include "vues/navbar/v_navbarAdmin.php";
              break;
      }

      ?>

        <li class=""><a href="index.php?uc=modification&action=changeinformation">Modifier vos informations</a></li>

          <?php
          $roleNom = "Aucun";

          switch ($_SESSION['idRole']) {
              case 1:
                  $roleNom = "Médecin";
                  break;
              case 2:
                  $roleNom = "Modérateur";
                  break;
              case 3:
                  $roleNom = "Validateur";
                  break;
              case 4:
                  $roleNom = "Chef produit";

                  break;
              case 5:
                  $roleNom = "Administrateur";
                  break;
          }

          ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
          <a style="margin-top: 3%" class="btn btn-danger" href="index.php?uc=connexion&action=deco" role="button">Logout</a>

		  <li><a><?php echo $_SESSION['prenom']."  ".$_SESSION['nom']?></a></li>
		  <li><a><?php echo $roleNom; ?></a></li>
       
     </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>