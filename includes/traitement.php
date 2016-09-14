<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
	header('location:authentification.php');
}
	?>
<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
$req = $bdd->prepare('SELECT * FROM client C, compte Co WHERE C.idclient = Co.idclient AND nomclient = ? OR prenomclient = ? ORDER BY nomclient ASC ') or
die(print_r($bdd->errorInfo()));;
$req->execute(array($_POST['searchZ'],$_POST['searchZ'] ) );
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
<p>RESULTAT DE LA RECHERCHE</p>
<table border="1px black solid inset"  >
	<tr><th>Numero</th> <th>Nom</th><th>Prenom</th><th>Sexe</th><th>Profession</th><th>Date_creation</th><th>Actif?</th><th>Numero compte</th><th>solde</th><th>Date_update</th></tr>
	
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['idclient']) . '</td><td>  '. htmlspecialchars($donnees['nomclient']). ' </td><td> '.htmlspecialchars($donnees['prenomclient']) .' </td><td> '. htmlspecialchars($donnees['sexe']) .' </td><td> '. htmlspecialchars($donnees['profession']) . ' </td><td> '. htmlspecialchars($donnees['datecreation']) . ' </td><td> '. transform( htmlspecialchars($donnees['actif'])) . ' </td><td> '. htmlspecialchars($donnees['numerocompte']) . ' </td><td> '. htmlspecialchars($donnees['solde']) . ' </td><td> '.  htmlspecialchars($donnees['dateupdate']) .' </td></tr>';
}

?>

</table>
<?php
$req->closeCursor() ;
?> 