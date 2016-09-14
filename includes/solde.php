<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


<p>Pour mettre à jour le solde du compte du client tapez le nouveau solde et valider </p>
            <form action ="index.php?pg=solde" method ="POST" >
                <fieldset><legend>MISE A JOUR DU SOLDE</legend>
                <table>
                 <tr><td>Numero de compte:</td>   <td><input type ="number" name = "numerocompte" required /> </td></tr>
                <tr><td>Nouveau solde: </td><td><input type ="number" name = "solde" required /> </td></tr>
              <tr>
                    <td>Date:</td>
                     <td><select name ="jour"> <?php  for ($i=01; $i<32 ; $i++) { ?> <option value= "<?php echo $i;  ?>" > <?php echo $i ; }?></option>
                     
                        </select> 
                     <select name="mois"> <?php $jours = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre' ); 
                     for ($i=0; $i<12 ; $i++) { ?> <option value= "<?php echo $i + 1 ;  ?>" > <?php echo $jours[$i] ; }?></option>
                       
                     </select> 
                     <select name ="annee"> <?php  for ($i=2016; $i>1969 ; $i--) { ?> <option value= "<?php echo $i;  ?>" > <?php echo $i ; }?></option>
                     
                        </select> </td>
                </tr>
                
            </table>
                <p><input type = "submit" value="Mettre à jour"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if (isset($_POST['numerocompte']) AND isset($_POST['solde']) AND isset($_POST['annee']) AND isset($_POST['mois']) AND isset($_POST['jour']))
{
     $_POST['dateupdate']= $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];

    $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    $requ = $bdd->query('SELECT numerocompte FROM compte') or
    die(print_r($bdd->errorInfo()));//on va récupérer tous les numeros de compte existants
        
        $trouve = false;
                 While ($donnee= $requ->fetch() AND !$trouve)//tant qu'il n'a pas trouvé le numero de compte ou qu'il n'a pas fini de tester tous les numeros de compte la boucle continue
        {
            if ($_POST['numerocompte']==$donnee['numerocompte'] )//on compare le numero de compte entré à tous ceux qui existent
            {
                $trouve = true;
            }
        }

        if (!$trouve)//si il ne trouve pas le numero de compte il dis à l'utiisateur que ce numero de compte n'existe pas
        {
            echo  "Ce numéro de compte n'existe pas";
        }
        else 
        {

            $req = $bdd->prepare('UPDATE compte SET solde=:solde,dateupdate=:dateupdate WHERE numerocompte=:numerocompte');
            $req->execute(array(
                'solde' =>  $_POST['solde'],
                'dateupdate' => $_POST['dateupdate'], 
                 'numerocompte' => $_POST['numerocompte']
                ));


         
                   $req2=$bdd->prepare('SELECT solde FROM compte WHERE numerocompte = :numerocompte');
            $req2->execute(array('numerocompte' => $_POST['numerocompte'] ));
            $sold = $req2->fetch();


            echo "Transaction éffectuée avec succès!!! </br> Le nouveau solde est  ". $sold['solde'];

        }



   
   
/*else
{
    echo "echec de l'enregistrement </br> Réessayez";
    ?>

    <?php
}*/

}
?>

        