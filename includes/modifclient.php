
<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>

<p>Remplissez ces champs pour modifier les informations d'un client </p>
            <form action ="index.php?pg=modifclientt" method ="POST" >
                <fieldset><legend>CLIENT</legend>
                <table>
                      <?php  $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
              $requ1 = $bdd->query('SELECT * FROM client') or
                     die(print_r($bdd->errorInfo()));?>
                 
                <tr><td>Client:  </td>
                    <td> <select name="numeroclt"> 
                    <?php While ($donnee1= $requ1->fetch()){?>
                     <option value = "<?php echo $donnee1['idclient'];?>"><?php echo $donnee1['nomclient'].'  '. $donnee1['prenomclient'] ;?></option> 
                     <?php } ?>
                 </select> </td></tr>
                <p><input type = "submit" value="Valider"/> <input type="reset" value="Annuler" /></p>
                </table>
                </fieldset>
            </form> 

          

        