<?php

  

    // Create connection
    $ip = getenv('IP');
    $user = getenv('C9_USER');
    $bdd=mysqli_connect($ip, $user, "", "c9")or die('Could not connect to mysql');
    
    //$db = new PDO("mysql:host=0.0.0.0;dbname=c9", 'jeanar', '');
    

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTEST
    $query="INSERT INTO Administrateur(identifiant,motDePasse,niveauDeDroit) VALUES ('toto','jean','du')";
    $result= mysqli_query($bdd,$query);
    if (!$result) {
    die('Requête invalide : ' . mysql_error());
    }
    //-----------------------------------------------------
    // function qui permet de de "require" les classe que l'on instance
    function chargerClasse($classe)
    {
      require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
    }
    
    spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
   //<--------------------------------------------------------------------------------------->
   
    //($id,$identifiantLog,$mdp,$droit)
    $admin = new Administrateur(1,'toto','toto','chef');
    echo ($admin->get_idAdministrateur());
    //__construct($classe,$parents,$professeurs,$heureDeDebut,$heureDeFin,$dates)

    /*getMysqlConnexionWithPDO(); 
    getMysqlConnexionWithMySQLi();*/
   // 
    $AdminManager = new AdministrateurManager($dbb);
    //$ReunionManager = new ReunionManaager($db);
    
    $AdminManager->add($admin);
    //$ReunionManager->add($reunion);
    
   // echo($reunion->get_heureDeDebut());
    mysql_close($bdd); // On ferme la connexion à la base de donnée

?>



 



