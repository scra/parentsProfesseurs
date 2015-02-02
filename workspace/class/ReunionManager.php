<?php

class ReunionManager{
    
    private $_db;
    
    public function  __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Reunion $reunion){
	    
        $recherche = $this->_db->prepare('INSERT INTO Reunion SET nom = :nom, heureDeDebut = :heureDeDebut, heureDeFin = :heureDeFin, date = :date');
        
        /*$recherche->bindValue(':idReunion',$reunion->get_idReunion(),PDO::PARAM_INT);*/
        
        $recherche->bindValue(':nom', $reunion->get_nom(),PDO::PARAM_STR);
        
        $recherche->bindValue(':heureDeDebut', $reunion->get_heureDeDebut(),PDO::PARAM_STR);
        
        $recherche->bindValue(':heureDeFin', $reunion->get_heureDeFin(),PDO::PARAM_STR);
 
        $recherche->bindValue(':date', $reunion->get_date(),PDO::PARAM_STR);
       
       
        
        $recherche->execute();
	}
	
	//Recupérer de l'id de la réunion
    public function recupererId(Reunion $reunion)
    {
        $recherche = $this->_db->query('SELECT idReunion FROM Reunion WHERE  nom = :nom, heureDeDebut = :heureDeDebut, heureDeFin = :heureDeFin, date = :date, idAdministrateur = :idAdministrateur');
               /*$recherche->bindValue(':idReunion',$reunion->get_idReunion(),PDO::PARAM_INT);*/
        
        $recherche->bindValue(':nom', $reunion->get_nom(),PDO::PARAM_STR);
        
        $recherche->bindValue(':heureDeDebut', $reunion->get_heureDeDebut(),PDO::PARAM_STR);
        
        $recherche->bindValue(':heureDeFin', $reunion->get_heureDeFin(),PDO::PARAM_STR);
 
        $recherche->bindValue(':date', $reunion->get_date(),PDO::PARAM_STR);
       
        $recherche->bindValue(':idAdministrateur', $reunion->get_idAdministrateur(),PDO::PARAM_STR);
        
        $idReunion=$recherche->execute();
        
        return $idReunion;
}
 public function delete(Reunion $reunion)
    {
        $this->_db->exec('DELETE FROM Reunion WHERE idReunion = '.$reunion->get_idReunion());
    }
    
    
    public function modifierReunion(Reunion $reunion)
    {
        $id = $reunion->get_idReunion();
        if(isset($id))
        {
            $q = $this->_db->prepare('UPDATE Reunion SET idReunion = :idReunion, nom = :nom, heureDeDebut = :heureDeDebut, heureDeFin = :heureDeDebut,professeurs =:professeurs,parents:=parents  WHERE idReunion = :idReunion');
            $q->bindValue('id', $user->get_idReunion());
            $q->bindValue('nom', $user->get_nom());
            $q->bindValue('prenom', $user->get_heureDeDebut());
            $q->bindValue('pseudo', $user->get_heureDeFin());
            $q->execute();
            
            echo "Réunion modifier";
        }
        else
        {
            echo "Impossible de modifier la réunion ";
        }
        
    }
    
    public function afficherParticipantParentReunion(Reunion $reunion)
    {
        $id = $reunion->get_idReunion; // identifiant de la réunion
        
        if(isset($id))
        {
            if (isset($reunion->get_parents()))
            {
                $parents = $reunion->get_parent();
                $parents = explode(",", $parents);// le caractère déliméteur est la ",". Exemple : Monsieur jean, Monsieur richard ... 
                $i = 0; // initialisation de la variable pour parcourir le tableau
                $taille = count($parents);// taille du tableau               
                while($taille!=$i)//tant que je ne suis pas arrivé à la fin du tableau je boucle
                {
                    echo $parent[$i];
                    $i = $i + 1;
                }
            }
            else
            {
                echo " Il n'y a pas de parents inscrit à cette réunion";
            }
            //Affichage des profs
            if (isset($reunion->get_professeurs()))
            {
              $professeurs = $reunion->get_professeurs();
                $professeurs = explode(",", $professeurs);// le caractère déliméteur est la ",". Exemple : Monsieur jean, Monsieur richard ... 
                $i = 0; // initialisation de la variable pour parcourir le tableau
                $taille = count($professeurs);// taille du tableau               
                while($taille!=$i)//tant que je ne suis pas arrivé à la fin du tableau je boucle
                {
                    echo $professeurs[$i]"<br>";
                    $i = $i + 1;
                }  
            }
            else
            {
                 echo " Il n'y a pas de professeurs inscrit à cette réunion";
            }
        }
        
        //modifier une réunion
    public function modifierReunion(Reunion $reunion)
    {
       
        $q = $this->_db->prepare('UPDATE TABLE Administrateur SET (identifiant,motDePasse,niveauDeDroit) Values (:identifiant,:motDePasse,:niveauDeDroit) WHERE idAdministrateur = ?');
        
        $q->bindValue(':identifiant', $admin->get_identifiant());
        
        $q->bindValue(':motDePasse', $admin->get_motDePasse());
        
        $q->bindValue(':niveauDeDroit', $admin->get_niveauDeDroit());
        
        $q->bindValue(':idAdministrateur', $admin->get_idAdministrateur());

        $q->execute();
   }
   
   	
      
}
?>