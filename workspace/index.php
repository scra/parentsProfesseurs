<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <style type="text/css">
	body{
  background-image:url(images/dark.png);

	}
</style>

    <title>Gestion des réunions parents-professeurs</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <link rel="stylesheet" type="text/css" href="http://cdn.bootstraptheme.com/packages/pro_image/blocks/pro_image/templates/background_img/css/view.css" />
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
 
    <div class="site-wrapper">
   
      <div class="site-wrapper-inner">

        <div class="cover-container">
               
               <!-- MENU ETAIT ICI -->
               <div class="inner">
                <h1>Bienvenue sur l'application de gestion des réunions parents-professeurs</h1>
                </div>
         
          <div class="inner cover">
            
            	<div class="lead">
					
							<center> <div  class = "jumbotron-black"  style="width:60%;" >
							<?php	
								if(isset($_GET["pb"]))
								{
									if(($_GET["pb"]) == "compteInnexistant")
									{ 
							?>
										<div class="alert alert-danger" role="alert">
		 								 
		 								 
		 								 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		 								 <span class="sr-only">Error:</span>
		 									 	<?php
															echo "Le compte n'existe pas.";
												?>
										</div>
									<?php
									}
									
									if(($_GET["pb"]) == "mauvaisMDP")
									{ 
									?>
										<div class="alert alert-danger" role="alert">
		 								 
		 								 
		 								 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		 								 <span class="sr-only">Error:</span>
		 									 	<?php
															echo "Le mot de passe n'est pas correct.";
												?>
										</div>
									<?php
									}
								}
									?>
								
	 							
	 							 <form method='post' action="VerificationConnexion.php">
									<p1 text-align : center>
									<label for="Identifiant"> Identifiant </label> : <br/><input type="text" name="identifiant" id ="identifiant" style="color:black;"/><br/><br/>
									<label for="Mot de passe"> Mot de passe </label> : <br/><input type="password" name="mdp" id ="mdp" style="color:black;" /><br/><br/> 
								
                  <input type="submit" class="btn btn-lg btn-default" name="action" value="Connexion"/>
                                        
									</p1>
								</form>
							</div></center>
				</div>
			</div>
            
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p  font-size="19px"> Pojet n°16 : <strong> Jean Arhancetebehere, Alban  Bertolini, Marion  Mounaix, Coline Oury </strong></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/assets/js/docs.min.js"></script>
  </body>
</html>

		