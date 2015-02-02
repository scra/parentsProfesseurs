 <?php
 class ParentManager
 {
    private $_db;

     public function  __construct($db)
    {
        $this->setDb($db);
    }
   
    public function setDb(PDO $db){
        $this->_db = $db;
    }
	  
	    public function add(Parent $parent){
            
            $q = $this->_db->prepare('INSERT INTO Parent(identifiant,motDePasse,nom) VALUES (:identifiant,:motDePasse,:nom)');
            
            $q->bindValue(':identifiant', $parent->get_identifiant());
            
            $q->bindValue(':motDePasse', $parent->get_motDePasse());
            
            $q->bindValue(':nom', $parent->get_nom());
    
            $q->execute();
		}
		
		// Un parent veut participer à une réunion
        public function participerReunion($identifiantReunion, $identifiantParent){
            
            // on sélectionne la liste des parents participant
            $q = $this->_db->prepare('SELECT listeParents FROM Reunion WHERE idReunion = :identifiantReunion');
            
            $q->bindValue(':identifiantReunion',$identifiantReunion,PDO::PARAM_INT);
            
            $q->execute();
            
            // on la modifie en ajoutant l'identifiant du parents dans la liste
                //on copie la liste
                $donnees = $q->fetch();
                $liste = $donnees['listeParents'];
                
                //si ce n'est pas le premier identifiant de la liste
                //'$liste vaut soit 0, vide, ou pas définie du tout';

                if(!empty($liste))
                {
                //on add l'id $a.=$b;
                $liste.= (",".$identifiantParent);
                }
                // si c'est le premier identifiant de la liste
                 //on add l'id $a.=$b;
                else
                {
                 $liste.= $identifiantParent;   
                }
            
            // on insert la liste de la réunion
            
            $q = $this->_db->prepare('UPDATE Reunion SET listeParents = :liste WHERE idReunion = :identifiantReunion');
            
            $q->bindValue(':liste',$liste,PDO::PARAM_STR);

            $q->bindValue(':identifiantReunion',$identifiantReunion,PDO::PARAM_INT);
           
            $q->execute();

            $q->closeCursor();
        }

		
		//Un parent veut se retirer d'une réunion
        public function retirerReunion($identifiantReunion, $identifiantParent){
             // on sélectionne la liste des parents participant
            $q = $this->_db->prepare('SELECT listeParents FROM Reunion WHERE idReunion = :identifiantReunion');
            
            $q->bindValue(':identifiantReunion',$identifiantReunion,PDO::PARAM_INT);
            
            $q->execute();
            
            // on supprime l'identifiant du parents dans la liste
                //on copie la liste
                $donnees = $q->fetch();
                $liste = $donnees['listeParents'];
                //Si la liste est vide 
                if(empty($liste))
                {
                    echo "Liste vide";
                }              
                 // si la liste n'est pas vide
                else
                {   
                 // on explose la liste pour pouvoir trouver l'id
                    $liste = explode(",", $liste);
                    $i=0;
                    //Temps que nous sommes pas à l'identifier chercher avancer dans le tableau
                    foreach ($liste as &$listeCourante)
                    {
                                                // si nous avons trouvé l'id cherché
                        if($listeCourante==$identifiantParent)
                        {
                            // supprimer l'id du tableau
                            unset($liste[$i]);
                        }
                        $i++;
                    }

                    $i=0;// initialiser la variable pour parcourir le tableau
                    // reformer la liste
                    foreach ($liste as &$listeCourante) 
                    {
                        //si on est à la premiere occurence
                        if ($i==0)
                        {
                            $listeReconstitue = $listeCourante;
                        }
                        // sinon on ajoute une virgule avant l'id courant
                        else
                        {
                            $listeReconstitue.= ",".$listeCourante;
                        }
                        $i++;//pour éviter de rentrer dans le if à chaque tour
                    }
                     // on ajoute  la nouvelle  liste de la réunion
            
                    $q = $this->_db->prepare('UPDATE Reunion SET listeParents = :liste WHERE idReunion = :identifiantReunion');
                    
                    $q->bindValue(':liste',$listeReconstitue,PDO::PARAM_STR);

                    $q->bindValue(':identifiantReunion',$identifiantReunion,PDO::PARAM_INT);
                   
                    $q->execute();

                    $q->closeCursor();
                }
            
           
        }


		
		//trouver les enfants  pour un parent passé en paramètre
	public function AfficherEnfants(Parent $parent){
	//  Selectionne idEleve, nom et prenom des enfant correspondant à l'idParent du parent passé en paramètre
	
            $avoirIdEleve=$this->_db->prepare(' SELECT idEleve,nom,prenom FROM eleve WHERE idEleve IN (SELECT idEleve FROM parent_eleve WHERE idParent= :idParent) ');
            $avoirIdEleve->bindValue(':idParent', $parent->get_idParent());
            $avoirIdEleve->execute();
            //Initialise un petit tableau coucou qui va recevoir l'idEleve.le nom. prenom
            $coucou=array();
            //Tant qu'il y a des valeurs de met dans ce tableau coucou l'idEleve.nom.prenom
                while ($donnees = $avoirIdEleve->fetch(PDO::FETCH_ASSOC))
                    {
            
                        array_push ($coucou,($donnees['idEleve'].'.'.$donnees['nom'].'.'.$donnees['prenom'].'<BR>'));
            
                    }
            //Maintenant l'attribut  eleve Correspondant du Parent va prendre les valeurs de l'eleve trouvé
            $parent->set_eleveCorrespondant($coucou);
		
		
		}
		
		
		//Depend de comment sera coder le formulaire. Quelles seront les valeurs qui seront données
		public function voeuxReunion(){
		   
		}
		
		//Ajoute dans la BD l'heure d'arrive prevu du parent qui sera saisi dans le formulaire hiha 
		public function HeureArriverReunion(Parents $parent, $heure){
		    $mettreAJourHeure=$this->_db->prepare('UPDATE Parent SET HeureArrivee = :heure  where idParent = :idParent');
            $mettreAJourHeure->bindValue(':heure',$heure);
            $mettreAJourHeure->bindValue(':idParent',$parent->get_idParent());
            $mettreAJourHeure->execute();
		}
		
	
		
		
		
}