<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
$req = $bdd->query('SELECT * FROM client WHERE actif = 1 ORDER BY nomclient ASC ') or
die(print_r($bdd->errorInfo()));;

?>
<p>LISTE DES CLIENTS ACTIFS</p>
<table border="1px black solid inset"  >
	<tr><th>Numero</th> <th>Nom</th><th>Prenom</th><th>Sexe</th><th>Profession</th><th>Date_creation</th></tr>
	
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['idclient']) . '</td><td>  '. htmlspecialchars($donnees['nomclient']). ' </td><td> '.htmlspecialchars($donnees['prenomclient']) .' </td><td> '. htmlspecialchars($donnees['sexe']) .' </td><td> '. htmlspecialchars($donnees['profession']) . ' </td><td> '. htmlspecialchars($donnees['datecreation']) . ' </td></tr>';
}
?>
</table>
<?php
$req->closeCursor() ;
?> 