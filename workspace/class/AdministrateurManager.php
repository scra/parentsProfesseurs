<?php

class AdministrateurManager
{
    // attribut de la classe administrateurManager
    protected $_db;

    // constructeur
    public function  __construct($db)
    {
        $this->setDb($db);
    }
   
   
    public function setDb(PDO $db){
        $this->_db = $db;
    }

    // Ajouter un administrateur
    public function add(Administrateur $admin)
    {
        $q = $this->_db->prepare('INSERT INTO Administrateur(identifiant,motDePasse,niveauDeDroit) Values (:identifiant,:motDePasse,:niveauDeDroit)');
        
        $q->bindValue(':identifiant', $admin->get_identifiant());
        
        $q->bindValue(':motDePasse', $admin->get_motDePasse());
        
        $q->bindValue(':niveauDeDroit', $admin->get_niveauDeDroit());
        
        $q->execute();
       
    }
    
    //NE PAS OUBLIER QUE l'ID EST INCREMENTE AUTOMATIQUEMENT
    
    // Fonction pour retourne l'ID d'un administrateur avec en paramètre son identifiant( l'identifiant est le nom de l'admin exemple : toto)
    public function recupererId($identifiant) 
    {
        $q = $this->_db->prepare('SELECT idAdministrateur FROM Administrateur WHERE identifiant =:identifiant');
        
        $q->bindValue(':identifiant', $identifiant);
        
        $q->execute();
        while ($donnees = $q->fetch())
            {
                //On retourne l'id de l'admi
                return $donnees['idAdministrateur'];
            }
    }
    
    //Fonction qui retourne L'id d'un administrateur avec en paramètre son objet
    public function recupererId2(Administrateur $admin)
    {
        $q=$this->_db->prepare('SELECT idAdministrateur FROM Administrateur WHERE identifiant = :identifiant');
        
        $q->bindValue(':identifiant',$admin->get_identifiant());
        
        $q-> execute();
        
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        $tst=$donnees['idAdministrateur'];
        return $admin->set_idAdministrateur($tst);
    }
    
    //Nous permet de renvoyer un objet administrateur qui correspondant dans la BDD a l'identifiant passé en paramètre
      public function get($identifiant)
  {
    //<-------------------------------Premier SELECT------------------------------------------------------->
    $qIdidentifiant = $this->_db->prepare('SELECT identifiant FROM Administrateur WHERE identifiant = :identifiant');
    
    $qIdidentifiant->bindValue(':identifiant', $identifiant);

    $qIdidentifiant->execute();
    
    $donneesIdentifiant=$qIdidentifiant->fetch(PDO::FETCH_ASSOC);
    
    $testIdentifiant=$donneesIdentifiant['identifiant'];
    
    //<-------------------------------Second SELECT------------------------------------------------------->
   
    $qMotDePasse = $this->_db->prepare('SELECT motDePasse FROM Administrateur WHERE identifiant = :identifiant');

    $qMotDePasse->bindValue(':identifiant', $identifiant);
    
    $qMotDePasse->execute();
    
    $donneesMotDePasse = $qMotDePasse->fetch(PDO::FETCH_ASSOC);
    
    $testMotDePasse=$donneesMotDePasse['motDePasse'];
    //<-------------------------------Troisieme SELECT------------------------------------------------------->
    $qniveauDeDroit = $this->_db->prepare('SELECT niveauDeDroit FROM Administrateur WHERE identifiant = :identifiant');
    
    $qniveauDeDroit->bindValue(':identifiant', $identifiant);
    
    $qniveauDeDroit->execute();
    
    $donnesNiveauDeDroit =$qniveauDeDroit->fetch(PDO::FETCH_ASSOC);
    
    $testNiveauDeDroit = $donnesNiveauDeDroit['niveauDeDroit'];
    //<------------------------------Retourne l'instance de l'Admin-------------------------------------------------->
    return (new Administrateur($testIdentifiant,$testMotDePasse,$testNiveauDeDroit));

  }
  
     // Supprimer un Administrateur
    public function delete(Administrateur $admin)
    {   
        $q = $this->_db->prepare('DELETE FROM Administrateur WHERE idAdministrateur =:id');
        
        $q->bindValue(':id', $admin->get_idAdministrateur());
        
        $q->execute();

        //nombre de ligne affecté par le delete
        $error=$q->rowCount();
                
        // si Admin a été supprimé
        if($error == 1)
        {
           echo "<br>L'admin ".$admin->get_idAdministrateur()." a bien été supprimé"; 

        }
        // si erreur de suppression
        else
        {
           echo"<br>L'admin n'a pas été  supprimé l'id n'est pas existant";
        }
    }
    
    
}
?>  