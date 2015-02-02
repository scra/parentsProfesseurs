 <?php
 class EleveManager 
 {
    private $_db;
    
    public function  __construct($db)
    {
        $this->setDb($db);
    }
	  
    public function add(Eleve $eleve){
	    
        $recherche = $this->_db->prepare('INSERT INTO Eleve SET nom = :nom, prenom = :prenom, classe = :classe');
        
        $recherche->bindValue(':nom', $eleve->get_nom(),PDO::PARAM_STR);
        
        $recherche->bindValue(':prenom', $eleve->get_prenom(),PDO::PARAM_STR);
        
        $recherche->bindValue(':classe', $eleve->get_classe(),PDO::PARAM_STR);
        
        $recherche->execute();
	}
	
	

	
	
	
	
     // Supprimer un élève
    public function delete(Eleve $eleve)
    {   
        $q = $this->_db->prepare('DELETE FROM Eleve WHERE idEleve =:id');
        
        $q->bindValue(':id', $eleve->get_idEleve());
        
        $q->execute();

        //nombre de ligne affecté par le delete
        $error=$q->rowCount();
                
        // si Admin a été supprimé
        if($error == 1)
        {
           echo "<br>L'élève ".$eleve->get_idEleve()." a bien été supprimé"; 

        }
        // si erreur de suppression
        else
        {
           echo"<br>L'élève n'a pas été  supprimé l'id n'est pas existant";
        }
    }
    
}
?>