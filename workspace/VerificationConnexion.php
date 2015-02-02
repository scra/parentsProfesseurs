<?php

	$identifiant=$_POST['identifiant'];
	$motDePasse=$_POST['mdp'];


	try
	{
		$bdd = new PDO('mysql:host=0.0.0.0;dbname=c9', "jeanar", "");
	}

	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

	
	//Requete vers la BDD parent
	$reponse = $bdd->query('SELECT * FROM Parent WHERE identifiant="'.$identifiant.'"');
	//Epuration des résultats
	$donnees = $reponse->fetch();
	//Fermeture connexion à BDD
	$reponse->closeCursor();
	
	//Vérification si le compte existe
	if($donnees['identifiant'] == $identifiant)
	{
		//Identifiant existe
		
			//Vérification du mot de passe
			if($donnees['motDePasse'] == $motDePasse)
			{
				//Tout est bon !
				$_SESSION['nom']=$donnees['nom'];
				$_SESSION['identifiant']=$donnees['identifiant'];
				$_SESSION['etat']=$donnees['etat'];
				
				//Tout est ok, on renvoi sur l'accueil du parent
				header('Location: AccueilParent.php'); 
			}
			else
			{   //Mot de passe incorrect
				header('Location: index.php?pb=mauvaisMDP');
			}
	}
	
	else
	{ 
		//Requete vers la BDD professeur
		$reponse = $bdd->query('SELECT * FROM Professeur WHERE identifiant="'.$identifiant.'"');
		//Epuration des résultats
		$donnees = $reponse->fetch();
		//Fermeture connexion à BDD
		$reponse->closeCursor();
		
		//Vérification si le compte existe
		if($donnees['identifiant'] == $identifiant)
		{
			//Identifiant existe
			
				//Vérification du mot de passe
				if($donnees['motDePasse'] == $motDePasse)
				{
					//Tout est bon !
					$_SESSION['nom']=$donnees['nom'];
					$_SESSION['identifiant']=$donnees['identifiant'];
					$_SESSION['etat']=$donnees['etat'];
					$_SESSION['classe']=$donnees['classe'];
					
					//Tout est ok, on renvoi sur l'accueil du parent
					header('Location: AccueilProfesseur.php'); 
				}
				
				else
				{   //Mot de passe incorrect
					header('Location: index.php?pb=mauvaisMDP');
				}
		}
			
		else
		{ 
					//Requete vers la BDD administrateur
					$reponse = $bdd->query('SELECT * FROM Administrateur WHERE identifiant="'.$identifiant.'"');
					//Epuration des résultats
					$donnees = $reponse->fetch();
					//Fermeture connexion à BDD
					$reponse->closeCursor();
					
					//Vérification si le compte existe
					if($donnees['identifiant'] == $identifiant)
					{
						//Identifiant existe
						
						//Vérification du mot de passe
						if($donnees['motDePasse'] == $motDePasse)
						{
							//Tout est bon !
							$_SESSION['identifiant']=$donnees['identifiant'];
							$_SESSION['niveauDeDroit']=$donnees['niveauDeDroit'];
								
							//Tout est ok, on renvoi sur l'accueil du parent
							header('Location: AccueilAdministrateur.php'); 
						}
						
						else
						{   	
							//Mot de passe incorrect
							header('Location: index.php?pb=mauvaisMDP');
						}
					}
					
					else
					{ 
						//Compte n'existe pas
				  	 	header('Location: index.php?pb=compteInnexistant'); 
					}
		}


	}
	
?>