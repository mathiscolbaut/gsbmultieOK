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
        if ($_SESSION['idRole'] == 1){
      ?>
        <!--li class="active"><a href="index.php?uc=etatFrais&action=selectionnerMois">M'inscrire à une visio</a></li-->
        <li class="active"><a href="#">Voir produits</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Visioconférences
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Voir les visios</a>
            <a class="dropdown-item" href="#">M'inscrire à une visio</a>
          </div>
        </li>
        <li class="active"><a href="#">Laisser un avis</a></li>
        <?php
            };
        ?>
        <?php
            if ($_SESSION['idRole'] == 2){
        ?>
                <li class="active"><a href="#">Vérifier les avis</a></li>

        <?php
            };
        ?>
        <?php    
            if ($_SESSION['idRole'] == 3){
        ?>
        <li class="active"><a href="#">Validation compte médecin</a></li>

        <?php
            };
        ?>
        <?php    
          if ($_SESSION['idRole'] == 4){
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produits
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Voir liste des produits</a>
            <a class="dropdown-item" href="#">Gérer les produits</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Visioconférences
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Voir liste des visios</a>
            <a class="dropdown-item" href="#">Gérer les visioconférences</a>
          </div>
        </li>
        <?php
          };
        ?>
        <?php  
          if ($_SESSION['idRole'] == 5){
        ?>
        <li class="active"><a href="#">Vérifier les avis</a></li>
        <li><a href="#">Validation compte médecin</a></li>
        <li class="active"><a href="#">Maintenance</a></li>
        <li class="active"><a href="index.php?uc=creation&action=creationAdmin">Créer un compte</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Voir logs
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Connexions</a>
            <a class="dropdown-item" href="#">Produits</a>
            <a class="dropdown-item" href="#">Visioconférences</a>
          </div>
        </li>
        <?php
          };
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
                  $roleNom = "Chef de projet";

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