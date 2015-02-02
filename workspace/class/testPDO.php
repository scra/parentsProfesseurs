<?php

    function chargerClasse($classe)
    {
      require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
    }
    
    spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
   //<--------------------------------------------------------------------------------------->
   require ('ParentManager.php');
   
    $servername = "0.0.0.0";
    $username = "jeanar";
    $password = "";
    $dbname = "c9";

    
    $data= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /*
    $administrateurpetittest=new Administrateur('coco','odj','roi');
    $test = new AdministrateurManager($data);
    echo "test manager <BR>";
    
    
    $test->add($administrateurpetittest);
  
    $admintest=$test->get("coco");
    echo($admintest->get_motDePasse());
    echo("test <BR>");
 
    $test->recupererId2($admintest);
    
    echo "test <BR>";
    
    echo($admintest->get_idAdministrateur());
    echo($admintest->get_niveauDeDroit());
    $test->delete($admintest);*/
    
    //public function participerReunion($identifiantReunion, $identifiantParent)
    participerReunion(1234,456);
    $testParent=new Parent("cfef","test",null,"oury");
    $testParentManager=new ParentManager($data);
    $testParentManager->add($testParent);
    $testParentManager->AfficherEnfants($testParent);
 
?>