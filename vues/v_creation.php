<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GSB -extranet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

<div class="page-content container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-wrapper">
				<div class="box">
						
                                    <div class="content-wrap">
						<legend>je suis médecin, je souhaite créer un compte</legend>
							<form method="post" action="index.php?uc=creation&action=valideCreation">
                                <input name="login" class="form-control" type="email" placeholder="mail"/>
							    <input name="mdp" class="form-control" type="password" placeholder="password"/>
                                <input name="prénom" class="form-control" type="text" placeholder="prénom"/>
                                <input name="nom" class="form-control" type="text" placeholder="nom"/>
								<br>
                                <input type="checkbox" class="form-control" required="required" style="height: 30px;width: 30px;margin-left: 45%;">
                                <p>J'atteste avoir lu et accepte notre</p>
                                <a href="http://localhost/gsb/vues/v_politiqueprotectiondonnees.php" target="_blank" >politique de protection des données</a>
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

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
<?php include('v_footer.php'); ?>
</html>