<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
     $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $requete = $bdd->query('SELECT * FROM client') or
        die(print_r($bdd->errorInfo()));?>
<p>Pour l'historique d'un client choisissez un client et validez </p>
            <form action ="index.php?pg=history" method ="POST" >
                <fieldset><legend>HISTORIQUE CLIENT</legend>
            <table>
                <tr><td>Client:  </td>
                    <td> <select name="numeroclt"> 
                    <?php While ($ans= $requete->fetch()){?>
                     <option value = "<?php echo $ans['idclient'];?>"><?php echo $ans['nomclient'].'  '. $ans['prenomclient'] ;?></option> 
                     <?php } ?>
                 </select> </td></tr>
            </table>
                <p><input type = "submit" value="Historique"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if (isset($_POST['numeroclt']))
{
       
            $requ =$bdd->prepare('SELECT nomclient,prenomclient FROM client WHERE idclient = ?');
            $requ->execute(array($_POST['numeroclt']));
            $donnee = $requ->fetch();
            $req = $bdd->prepare('SELECT * FROM historique WHERE idclient = :numeroclt ORDER BY date ASC');
            $req->execute(array('numeroclt' => $_POST['numeroclt'] ));
            echo 'HISTORIQUE de '. $donnee['nomclient'].'  '.$donnee['prenomclient'];
            ?>
            
<table border="1px black solid inset"  >
    <tr><th>Numero de transaction</th><th>Numero du client</th> <th>Numero de compte</th> <th>Transaction</th><th>Date</th><th>Montant</th><th>Solde</th></tr>
    
<?php
While ($donnees= $req->fetch())
{
  echo '<tr><td>'.htmlspecialchars($donnees['id_transaction']) . '</td><td>  '. htmlspecialchars($donnees['idclient']). ' </td><td> '. htmlspecialchars($donnees['numerocompte']). ' </td><td> '.htmlspecialchars($donnees['transaction']) .' </td><td> '. htmlspecialchars($donnees['date']) .' </td><td> '. htmlspecialchars($donnees['montant']) . ' </td><td> '. htmlspecialchars($donnees['solde']).' </td></tr>';
}
?>
</table>



            



        <?php

        }


?>

        