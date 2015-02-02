<?php
/* 
nom VARCHAR,
prenom VARCHAR,
classe VARCHAR

*/
class Eleve
{
    //attribut de la classe eleve
    private $nom;
    private $prenom;
    private $classe;
    private $idEleve;
    
    //constructeur 
        public function __construct($nom,$prenom,$classe)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->classe=$classe;
        $idEleve=0;
    }
        //GETTER
            public function get_nom()
    {
            return($this->nom);
    }
            public function get_prenom()
    {
            return($this->prenom);
    }
            public function get_classe()
    {
            return($this->classe);
    }
            public function get_idEleve()
    {
            return $this->idEleve;    
    }
    
    //SETTER
    
            public function set_nom($nom)
    {
        $this->nom=$nom;
    }
        
            public function set_prenom($prenom)
    {
        $this->prenom=$prenom;
    }
        
            public function set_classe($classe)
    {
        $this->classe=$classe;
    }
            public function set_idEleve($idEleve)
    {
        $this->idEleve=$idEleve;    
    }
        
}


?>