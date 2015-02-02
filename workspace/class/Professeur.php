
<?php
    class Professeur {
        
        // DECLARATION DES VARIABLES
         private $identifiant; // login du professeur
         private $motDePasse; // mot de passe du professeur
         private $classes; // les classes que s'occupe le professeur
         private $etat; // etat disponible ou indisponible pour une réunion (A DISCUTER)
        //FIN DES VARIABLES
        
        //DECLARATION DU CONSTRUCTEUR
        
        public function __construct($id,$mdp,$classes,$etat)
        {
            $this->identifiant = $id;
            $this->motDePasse = $mdp;
            $this->classes = $classes;
            $this->etat=$etat;
        }
        
        //FIN DECLARATION CONSTRUCTEUR
        
        // DECLARATION DES SET ET DES GET
        
        public function set_identifiant($id){
            $this->identifiant = $id;
        }
        
        public function set_motDePasse($mdp){
            $this->motDePasse = $mdp;
        }
        
        public function set_classes($classes){
            $this->classes = $classes;
        }
        
        public function set_etat($etat){
            $this->etat = $etat;
        }
        
        public function get_identifiant(){
            return $this->identifiant;
        }
        
        public function get_motDePasse(){
            return $this->motDePasse;
        }
        
        public function get_classe(){
            return $this->classes;
        }
        
        public function get_etat(){
            return $this->etat;
        }
        
    }

?>