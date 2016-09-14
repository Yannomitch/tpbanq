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
        <title>User</title>
        
    </head>
        <body>
          <?php
           if ( $_SESSION['type']=='user') 
           {
           echo "Vous êtes utilisateurs ...vous n'avez pas la possibilité de gérer les users";
           }
           else
           {
          ?>
           <p>Vous êtes administrateurs.....vous avez donc la possibilité </p> 
           <ul>

            	<li> <a href="index.php? pg=ajoutuser" ><h3>d'Ajouter un nouveau User</h3></a></li>
                <li> <a href="index.php? pg=listeusers" ><h3>de Consulter la liste des users</h3></a></li>
        	</ul>


    	</body>
</html>
<?php
}
?>