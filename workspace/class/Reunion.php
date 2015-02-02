<?php
/*
classe VARCHAR,
parents VARCHAR,
professeurs VARCHAR,
heureDeFin TIME,
heureDeDebut TIME,
date date,
etat BOOLEAN,
idReunion VARCHAR
*/
class Reunion
{
  //ATTTRIBUTS 
        private $classe;
        private $parents;
        private $professeurs;
        private $heureDeDebut;
        private $heureDeFin;
        private $dates;
        private $etat;
        private $idReunion; // identifiant de la réunion
        private $idAdmin; //Pointe vers un administrateur
        
        // Constructeur de réunion
        public function __construct($classe,$parents,$professeurs,$heureDeDebut,$heureDeFin,$dates)
        {
            $this->classe=$classe;
            $this->parents=$parents;
            $this->professeurs=$professeurs;
            $this->heureDeDebut=$heureDeDebut;
            $this->heureDeFin=$heureDeFin;
            $this->dates=$date;
            $this->etat=false; // la réunion n'est pas active
           /* $this->idReunion;*/// COMMENT GÉNÉRER AUTOMATIQUEMENT !!!!!!!!!????
            
        }
        
        //TOUT LES GETTERS
    /*    public function get_idReunion()
        {
            return ($this->idReunion);
        }*/
        public function get_classe()
        {
          return ($this->classe);
        }
        public function get_parents()
        {
          return ($this->parents);
        }
        public function get_professeurs()
        { 
          return ($this->professeurs);
        }
        public function get_heureDeDebut()
        {
            return ($this->heureDeDebut);
        }
        public function get_heureDeFin()
        {
          return ($this->heureDeFin);
        }
        public function get_dates()
        {
          return ($this->dates);
        }
        public function get_etat()
        {
          return ($this->etat);
        }
  
  //TOUT LES SETTERS
  
      public function set_classe($classe)
      {
        $this->classe= $classe;
      }
      public function set_parents($parents)
      {
       $this->parents= $parents; 
      }
      public function set_professeurs($professeurs)
      {
       $this->professeurs= $professeurs; 
      }
      public function set_heurDeDebut($heurDeDebut)
      {
        $this->heureDeDebut = $heureDeDebut;
      }
      public function set_heureDeFin($heureDeFin)
      {
       $this->heureDeFin = $heureDeFin; 
      }
      public function set_date($date)
      {
        $this->Date = $Date;
      }
 
}
?>