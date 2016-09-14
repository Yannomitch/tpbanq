<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
	header('location:authentification.php');
}
	?>

<h1>Vous êtes sur la plateforme de gestion de la <strong><em> International banque</em></strong></h1>

<h2>Sur cette plateforme vous avez la possibilité d'accéder à la liste des clients de la banque, de gérer les transactions sur ces comptes</h2>
<ul>
	<li>Créditer un compte</li>
	<li>Débiter un compte</li>
	<li>Mettre à jour un compte</li>
	<li>Consulter les soldes des comptes</li>
	<li>Consulter la liste des clients</li>

</ul>

