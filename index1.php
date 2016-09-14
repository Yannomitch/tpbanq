<?php
session_start();
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
	header('location:authentification.php');
}
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
			<form id='search' method="post" action="index.php? pg=recherche">
				<p>

					<input type="search" name="searchZ" id="searchZ" placeholder="Qui recherchez vous" size="20" maxlength="10" />
					<input class ="bouton_rec" type ="submit" value="Rechercher"/>
					
				</p>
			</form>
			<figure >
				<img class ="log" src='log.png' alt='Logo banquegest'>
			</figure>
		</header>
		<nav id='navig'>
			<ul>
	<li><a href="index.php? pg=accueil">Accueil</a></li>
	<li><a href="index.php? pg=clients">Clients</a></li>                                                                                                                                                                                                      
	<li><a href="index.php? pg=compte">Comptes</a></li>
	<li><a href="index.php? pg=deconnexion">Deconnexion</a></li>
			</ul>
		</nav>
		<section id='content'>
			<?php 
			echo 'Bienvenu  <strong> '.$_SESSION['nom'].'  </strong> <strong> '.$_SESSION['prenom'].' </strong> </br>';
			include 'includes/gestionnaire.php';?>
		</section>
		<footer>
                <div id="reseau">
					<a href="#">Langues</a></br>
					<a href="#">NewsLetters</a>

                    
                </div>
				
                <div id="realisation">
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
</html>