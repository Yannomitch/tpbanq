<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
$req = $bdd->query('SELECT iduser,nomuser,prenomuser,type FROM user ORDER BY nomuser ASC ') or
die(print_r($bdd->errorInfo()));;
?>
<p>LISTE DES UTILISATEURS</p>
<table border="1px black solid inset"  >
	<tr><th>Numero</th> <th>Nom</th><th>Prenom</th><th>type</th></tr>
	
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['iduser']) . '</td><td>  '. htmlspecialchars($donnees['nomuser']). ' </td><td> '.htmlspecialchars($donnees['prenomuser']) .' </td><td> '. htmlspecialchars($donnees['type']) .' </td></tr>';
}
?>
</table>
<?php
$req->closeCursor() ;
?> 