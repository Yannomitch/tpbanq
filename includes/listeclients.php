<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
$req = $bdd->query('SELECT idclient,nomclient, prenomclient,sexe,profession, datecreation, actif FROM client ORDER BY nomclient ASC ') or
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
<p>LISTE DES CLIENTS</p>
<table border="1px black solid inset"  >
	<tr><th>Numero</th> <th>Nom</th><th>Prenom</th><th>Sexe</th><th>Profession</th><th>Date_creation</th><th>Actif?</th></tr>
	
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['idclient']) . '</td><td>  '. htmlspecialchars($donnees['nomclient']). ' </td><td> '.htmlspecialchars($donnees['prenomclient']) .' </td><td> '. htmlspecialchars($donnees['sexe']) .' </td><td> '. htmlspecialchars($donnees['profession']) . ' </td><td> '. htmlspecialchars($donnees['datecreation']) . ' </td><td> '. transform( htmlspecialchars($donnees['actif'])) .' </td></tr>';
}
?>
</table>
<?php
$req->closeCursor() ;
?> 