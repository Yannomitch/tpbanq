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
        <title>Client</title>
        
    </head>
        <body>
           <p>Vous pouvez ajouter des clients de la banque et consulter la liste des clients sur cette page </p> 
           <ul>

            	<li> <a href="index.php? pg=ajoutclient" ><h3>Ajouter un nouveau Client</h3></a></li>
                <li> <a href="index.php? pg=listeclients" ><h3>Consulter la liste des clients</h3></a></li>
                 <li> <a href="index.php? pg=listeclientsac" ><h3>Consulter la liste des clients actifs</h3></a></li>
                 <li> <a href="index.php? pg=listeclientsnac" ><h3>Consulter la liste des clients non actifs</h3></a></li>
                 <li> <a href="index.php? pg=suprclient" ><h3>Supprimer un client</h3></a></li>
                   <li> <a href="index.php? pg=history" ><h3>Historique d'un client</h3></a></li>
                   <li> <a href="index.php? pg=modifclient" ><h3>Modifier les infos d'un client</h3></a></li>
        	</ul>


    	</body>
</html>