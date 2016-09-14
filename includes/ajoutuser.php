<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


<p>Pour ajouter un nouvel utilisateur remplissez ces champs </p>
        	<form action ="index.php?pg=ajoutuser" method ="POST" >
        		<fieldset><legend>USER</legend>
        		<table>
        		<tr><td>Nom:  </td>    <td><input type ="text" name = "nom_user" required /> </td></tr>
                <tr><td>Prenom:</td>   <td><input type ="text" name = "prenom_user" required /> </td></tr>
        		<tr><td>Type:</td> <td><input type="radio" name ="type_user" value ="user"/> <label for="user">User</label></td></tr>
                <tr><td></td> <td > <input type="radio" name ="type_user"value="admin" /> <label for="admin">Administrateur</label></td></tr>
                <tr><td> Tapez le mot de passe: </td><td><input type ="password" name="pass" required></td></tr>
                 <tr><td> Retapez le mot de passe: </td><td><input type ="password" name="pass1" required></td></tr>
            </table>
        		<p><input type = "submit" value="Envoyer"/> <input type="reset" value="Annuler" /></p>
        		</fieldset>
        	</form>	

            <?php
if (isset($_POST['nom_user']) AND isset($_POST['prenom_user']) AND isset($_POST['type_user']) AND isset($_POST['pass']) AND isset($_POST['pass1']))
{
    if ($_POST['pass'] == $_POST['pass1'])
    {
        $pass_hache = sha1($_POST['pass']);
    
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=gdbanque', 'root', '');
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }
    $req = $bdd->prepare('INSERT INTO user (nomuser, prenomuser, type, pass) VALUES(:nomuser, :prenomuser, :type, :pass)');
    $req->execute(array(
        'nomuser' =>$_POST['nom_user'],
        'prenomuser' => $_POST['prenom_user'],
         'type' => $_POST['type_user'], 
          'pass' =>$pass_hache, 
        ));

    echo "Enregistrement éffectué avec succès!!!";

}
    else 
    {
        echo "Les mots de passe ne correspondent pas...veuillez réessayer </br>"
        ?>
        <h4>Réessayer</h4>
        <?php
    }
}
/*else
{
    echo "echec de l'enregistrement </br>";
    ?>

   <a href="index.php? pg=ajoutuser" >Réessayer</a>
    <?php
}*/


?>
    