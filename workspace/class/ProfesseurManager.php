 <?php
 class ProfesseurManager
 {
    private $_db;

    public function  __construct($db)
	  {
	    $this->setDb($db);
	  }
	  
	    public function add(Professeur $professeur){
            
            $q = $this->_db->prepare('INSERT INTO Professeur SET identifiant = :identifiant, motDePasse = :motDePasse, classe = :classe');
            
            $q->bindValue(':identifiant', $professeur->get_identifiant(),PDO::PARAM_STR);
            
            $q->bindValue(':motDePasse', $professeur->get_motDePasse(),PDO::PARAM_STR);
            
            $q->bindValue(':nom', $professeur->get_nom(),PDO::PARAM_STR);
            
            $q->bindValue(':classe', $professeur->get_classe(),PDO::PARAM_STR);
    
            $q->execute();
		}
}
?>