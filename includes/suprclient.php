<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


        <?php  $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $requete = $bdd->query('SELECT * FROM client') or
        die(print_r($bdd->errorInfo()));?>
<p>Pour supprimer un client remplissez ces champs </p>
            <form action ="index.php?pg=suprclient" method ="POST" >
                <fieldset><legend>SUPPRESSION CLIENT</legend>
                <table>
                <tr><td>Client:  </td>
                    <td> <select name="numeroclt"> 
                    <?php While ($ans= $requete->fetch()){?>
                     <option value = "<?php echo $ans['idclient'];?>"><?php echo $ans['nomclient'].'  '. $ans['prenomclient'] ;?></option> 
                     <?php } ?>
                 </select> </td></tr>
            </table>
                <p><input type = "submit" value="Supprimer"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if (isset($_POST['numeroclt']))
{
       
        
            $req = $bdd->prepare('DELETE FROM client WHERE idclient = :numeroclt');
            $req->execute(array('numeroclt' => $_POST['numeroclt'] ));

            $req1=$bdd->prepare('DELETE FROM compte WHERE idclient = :numeroclt');
             $req1->execute(array('numeroclt' => $_POST['numeroclt'] ));

            



            echo "Suppression éffectué avec succès!!!";

        }


?>

        