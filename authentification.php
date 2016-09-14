<?php
session_start()
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head >
     <link rel="stylesheet" type="text/css" href="style.css">
       <meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
        <title>Gestbanq</title>
    <div  id="bloc_page">    
	    </head>
	        <body>
	        	<div id='conteneur'>
		<header id='entete'>
			</form>
			<figure >
				<img class ="log" src='log.png' alt='Logo banquegest'>
			</figure>
		</header>
		<nav id='navig'>
			
		</nav>
		<section id='content'>
			<h1>AUTHENTIFICATION</h1>
				<form method ="POST" >
        		<fieldset><legend>Authentifiez vous</legend>
        		<table>
        		<tr><td>Nom:  </td>    <td><input type ="text" name = "nom_user" required /> </td></tr>
                <tr><td>Prenom:</td>   <td><input type ="text" name = "prenom_user" required /> </td></tr>
        		<!--tr><td>Type:</td> <td><input type="radio" name ="type_user" value ="user"/> <label for="user">User</label></td></tr>
                <tr><td></td> <td > <input type="radio" name ="type_user"value="admin" /> <label for="admin">Administrateur</label></td></tr-->
                <tr><td> Tapez le mot de passe: </td><td><input type ="password" name="pass" required></td></tr>
            </table>
        		<p><input type = "submit" value="Envoyer" name ="submit"/> <input type="reset" value="Annuler" /></p>
        		</fieldset>
        	</form>	
        	           <?php
        	   
if (isset($_POST['submit'])) {
   $nom=$_POST['nom_user'];
   $prenom=$_POST['prenom_user'];
   $pass=$_POST['pass'];
   $pass = sha1($_POST['pass']);
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=gdbanque', 'root', '');
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }
    $req = $bdd->query("SELECT * FROM user WHERE nomuser = '$nom'AND  prenomuser = '$prenom' AND pass = '$pass'");//on va chercher tous les enregistrements de la table user dans la base de donnée
  // $req->execute(array($nom, $prenom, $pass ));
   While($donnee = $req->fetch())
   {
    if ($donnee['type'] == 'user') {
        $_SESSION['nom']=$nom;
         $_SESSION['prenom']=$prenom;
          $_SESSION['id']=$donnee[0];
            $_SESSION['type']=$donnee['type'];



      header('location:index1.php');
    }
    else
    {
         $_SESSION['nom']=$nom;
         $_SESSION['prenom']=$prenom;
          $_SESSION['id']=$donnee[0];
            $_SESSION['type']=$donnee['type'];
         header('location:index.php');
    }
    
   }
  

}

?>


			<p>Si vous êtes un personnel de la banque et avez l'accréditation nécessaire authentifiez vous!!!</p>
		</section>
		<footer>
			
                <div id="reseau">
					<a href="#">Langues</a></br>
					<a href="#">NewsLetters</a>

                    
                </div>
				
                <div id="realisation">
                	<p>Ce site n'est accessible qu'au personnel accrédité de la banque!!!</p>
                    <h1 >COPYRIGHT Yann M.</h1>
                    <p>POWERED BY Yann</p>
                </div>
				
                <div id="lang">
					<a href="https://www.FaceBook.com">
						<img src="images/fb.png" alt="FaceBook" title="Cliquez pour allez sur FaceBook" class="res"/>
					</a>
					
					<a href="https://www.Twitter.com">
						<img src="images/tw.png" alt="Twiter" title="Cliquez pour allez sur Twitter" class="res"/>
					</a>
									
					<a href="https://www.linkedin.com">
						<img src="images/in.png" alt="linkedin" title="Cliquez pour allez sur Linkedin" class="res"/>
					</a>					
		
					<a href="https://www.Gmail.com" >
						<img src="images/mail.png" alt="Gmail" title="Cliquez pour allez sur Gmail" class="res"/>
					</a>
                </div>
            </footer>
	</div>
	        	
	      
    	</body>
</html>