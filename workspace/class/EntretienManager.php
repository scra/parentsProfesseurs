 <?php
 class EntretienManager
 {
    private $_db;

    public function  __construct($db)
	  {
	    $this->setDb($db);
	  }
	  
 public function add(Entretien $entretien){
	    
    $recherche = $this->_db->prepare('INSERT INTO Entretien SET nom = :nom, prenom = :prenom, classe = :classe');
    
    $recherche->bindValue(':nom', $parent->get_nom(),PDO::PARAM_STR);
    
    $recherche->bindValue(':prenom', $parent->get_prenom(),PDO::PARAM_STR);
    
    $recherche->bindValue(':classe', $parent->get_classe(),PDO::PARAM_STR);
    
    $recherche->execute();
	}
}
?>