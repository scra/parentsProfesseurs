<?php

/*
identifiant VARCHAR,
motDePassse VARCHAR,
etat VARCHAR
nom VARCHAR
*/
class Parent
{
    //ATTRIBUT DE PARENT
       private $idParent;
      private $identifiant;
      private $motDePasse;
      private $etat;
      private $nom;
      private $eleveCorrespondant=array(); //POUR AIDER A PRENDRE l'ID ,  LE NOM ET LE PRENOM
      
      //CONSTUCTEUR DE PARENT
    
        public function __construct($identifiant,$motDePasse,$etat,$nom)
      {
          $this->identifiant=$identifiant;
          $this->motDePasse=$motDePasse;
          $this->etat=$etat;
          $this->nom=$nom;
          //J'initialise le tableau a sero
	      $this->eleveCorresponant=array();
	      
      }
      //GETTER
      
         public function get_identifiant()
        {
             return($this->identifiant);
         }
         public function get_motDePasse()
         {
                 return($this->motDePasse);
         }
         public function get_etat()
         {
             return($this->etat);
         }
         public function get_nom()
         {
             return($this->nom);
         }
         public function get_eleveCorrespondant()
	   {
	       //Tableau qui va permettre de convertir le type array en string pour permettre de l'inserer dans du HTML plus facilement
            $tableauConversion=array();
            //Je met dans ce tabeau conversion le tableau de eleveCorrespondant
                 foreach ($this->eleveCorrespondant as $recherche)
                    {
                        array_push($tableauConversion, $recherche);
                     }
           //Je fais la conversion en string du tableau
           $ConversionStringDesEleveCorrespondant=implode ($tableauConversion);
              //Je retourne cette nouvelle chaine de caractere      
            return ($ConversionStringDesEleveCorrespondant);
	   
       }
         //SETTER
         public function set_identifiant($identifiant)
        {
             $this->identifiant=$identifiant;
         }
         public function set_motDePasse($motDePasse)
         {
            $this->motDePassse=$motDePasse,     
         }
         public function set_etat($etat)
         {
             $this->etat=$etat;
         }
         public function set_nom($nom)
         {
            $this->nom=$nom;
         }
         public function set_eleveCorrespondant($eleveCorrespondant=array())
         {
             //Petit tableau qui va permettre de stocker l'eleveCorrespondant passé en parametre
                $petitTableau=array();
                //Mettre dans le petit tableau, l'eleveCorrespondant
                    foreach ($eleveCorrespondant as $recherche)
                        {
                            array_push ($petitTableau,$recherche);
                        }
                 //Je met dans la variable de ce parent son eleveCorrespondant
                    foreach ($petitTableau as $test)
                        {
                            array_push($this->eleveCorrespondant,$test);
                        }   
            
               
          }
         
}

?>