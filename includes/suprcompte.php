<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


<p>Pour supprimer un compte remplissez ces champs </p>
            <form action ="index.php?pg=suprcompte" method ="POST" >
                <fieldset><legend>SUPPRESSION COMPTE</legend>
                <table>
                <tr><td>Numero de compte:</td>   <td><input type ="number" name = "numerocmpt" required /> </td></tr>
            </table>
                <p><input type = "submit" value="Supprimer"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if (isset($_POST['numerocmpt']))
{

    $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    $requ = $bdd->query('SELECT numerocompte FROM compte') or
    die(print_r($bdd->errorInfo()));//on va récupérer tous les numeros de compte existants
        
        $trouve = false;
        
                 While ($donnee= $requ->fetch() AND !$trouve)//tant qu'il n'a pas trouvé le numero de compte ou qu'il n'a pas fini de tester tous les numeros de compte la boucle continue
        {
            if ($_POST['numerocmpt']==$donnee['numerocompte'] )//on compare le numero de compte entré à tous ceux qui existent
            {
                $trouve = true;
            }
        }

        if (!$trouve)//si il ne trouve pas le numero de compte il informe l'utilisateur que ce numero n'est attribué a aucun compte
        {
            echo "Désolé ce numéro n'est attribué à aucun compte";
        }
        else 
        {

            $req1=$bdd->prepare('DELETE FROM compte WHERE numerocompte = :numerocmpt');
             $req1->execute(array('numerocmpt' => $_POST['numerocmpt'] ));

            



            echo "Suppression éffectué avec succès!!!";

        }

}
?>

        