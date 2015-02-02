<style type="text/css">
	body{
  background-image:url(images/ecole.jpg);
  background-repeat: no-repeat;
  opacity: 1;
   margin:0;
  padding:0;
  -webkit-background-size: cover; /* pour anciens Chrome et Safari */
  background-size: cover; /* version standardisée */
	}
</style>

<!DOCTYPE html>
<html>
<head>
<?php
	include'includes/Entete.html';
?>
	<title>	Gestion de réunion parents-professeurs</title>
	
</head>
	
<body>
		<section>
				
			<div class="container">
				<header>
					<div class="row">
 						 <div class="col-md-12">
        						  <b><h1>Gestion de réunion parents-professeurs</h1></b><br/><br/><br/>
  						</div>
					</div>
				</header>
				<div class="row">
					
							<center> <div  class = "jumbotron" style="width:60%;" >
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
								
	 							 <h2> Connexion </h2> 
	 							 <form method='post' action="VerificationConnexion.php">
									<p1 text-align : center>
									<label for="Identifiant"> Identifiant </label> : <br/><input type="text" name="identifiant" id ="identifiant" /><br/><br/>
									<label for="Mot de passe"> Mot de passe </label> : <br/><input type="password" name="mdp" id ="mdp" /><br/><br/> 
									<input type="submit" class="btn btn-warning" name="action" value="Connexion"/>
									</p1>
								</form>
							</div></center>
				</div>
			</div>
		</section>
	</body>
<footer>

	<!-- Pied de page -->
	
</footer>
				

</html>