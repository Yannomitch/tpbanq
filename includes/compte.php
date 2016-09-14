<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
  header('location:authentification.php');
}
  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head >
     
       <meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
        <title>Compte</title>
        
    </head>
        <body>
           <p>Cette page vous permet de gérer les comptes des clients ainsi que les transactions éffectuées par ces derniers</p> 
           <ul>

            	  <li> <a href="index.php? pg=clientcompte"><h3>Situation des clients de la banque</h3></a></li>
                <li> <a href="index.php? pg=debiter"><h3>Débiter le compte du client</h3></a></li>
                <li> <a href="index.php? pg=crediter"><h3>Créditer le compte du client</h3></a></li>
                <li> <a href="index.php? pg=solde"><h3>Mettre à jour le solde du client</h3></a></li>
                  <li> <a href="index.php? pg=suprcompte"><h3>Supprimer un compte</h3></a></li>
                   <li> <a href="index.php? pg=ajoutcompte"><h3>Ajouter un compte</h3></a></li>
            
        	</ul>

    	</body>
</html>