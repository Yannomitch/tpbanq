<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
	header('location:authentification.php');
}
	?>
<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
$req = $bdd->query('SELECT Co.idclient,nomclient, prenomclient, actif,numerocompte,solde,dateupdate FROM client C, compte Co WHERE Co.idclient = C.idclient ORDER BY nomclient ASC ') or
die(print_r($bdd->errorInfo()));;
function transform ($nbre)
{
	if ($nbre==0)
	{
		return 'Non';
	}
	else
	{
		return 'Oui';
	}
}
?>
<p>LISTE DES CLIENTS ET LEURS SITUATIONS</p>
<table border="1px black solid inset"  >
	<tr><th>Numero</th> <th>Nom</th><th>Prenom</th><th>Actif ?</th><th>Numero de compte</th><th>Solde</th><th>Date de la dernière transaction</th></tr>
	
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['idclient']) . '</td><td>  '. htmlspecialchars($donnees['nomclient']). ' </td><td> '.htmlspecialchars($donnees['prenomclient']) . ' </td><td> '. transform( htmlspecialchars($donnees['actif'])) .' </td><td> '. htmlspecialchars($donnees['numerocompte']) .' </td><td> '. htmlspecialchars($donnees['solde']). ' </td><td> '. htmlspecialchars($donnees['dateupdate']).' </td></tr>';
}
?>
</table>
<?php
$req->closeCursor() ;
?> 