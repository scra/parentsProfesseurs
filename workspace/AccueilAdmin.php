<!-----------------------------Page Accueil Admin---------------------------->

<html>
    <head>
        <style type="text/css">
            body{
            background-image:url('images/dark.png');
            }
        </style>
        <?php
        
        // inclusion des steel BOOTSTRAP
            include 'includes/Entete.html';
        ?>
        <title> Gestion des reunions parents-professeurs | Administrateur</title>
    </head>
    
    <!---------------Debut du body------------------------>
    <body>
        <!---------------Debut du header------------------>
        <header>
            <?php
            // inclusion du menu Admin
                include 'includes/menuAdmin.php';
            ?>
            <div class="containe">
                <div class="row">
                    <div class="col-sm-4">
                       <h2>Gestion des Réunions</h2>
                    </div>
                </div>
            </div>
            
        </header>
        <!---------------Fin du header------------------->
        <div class ="container">
            <div class ="row">
                <div class ="col-sm-12">
                    <div class="col-sm-4">
                        <div class="jumbotron">
                            <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#">Création réunion</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        
                    </div>
                </div>
            </div>
        </div>
            
        <!--------------Debut des formulaires----------->
        <?php
        // inclusion des foromulaire
            
        ?>
        <!--------------Fin des formulaires----------->
    </body>
    <!---------------Fin du body------------------------>
    <footer>
        <?php
        // inclusion du footer
            include 'includes/###.html';
        ?>
    </footer>
</html>
