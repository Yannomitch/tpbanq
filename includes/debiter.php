<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


<p>Pour débiter le compte du client tapez le montant et valider </p>
            <form action ="index.php?pg=debiter" method ="POST" >
                <fieldset><legend>DEBITER COMPTE</legend>
                <table>
                 <tr><td>Numero de compte:</td>   <td><input type ="number" name = "numerocompte" required /> </td></tr>
                <tr><td>Montant: </td><td><input type ="number" name = "montant" required /> </td></tr>
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
                <p><input type = "submit" value="Debiter"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if (isset($_POST['numerocompte']) AND isset($_POST['montant']) AND isset($_POST['annee']) AND isset($_POST['mois']) AND isset($_POST['jour']))
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
                 $req1=$bdd->prepare('SELECT solde FROM compte WHERE numerocompte = :numerocompte');
            $req1->execute(array('numerocompte' => $_POST['numerocompte'] ));
            $solde = $req1->fetch();

            if ($solde['solde'] > $_POST['montant']) 
            {
              
            


            $req = $bdd->prepare('UPDATE compte SET montdebiter=:montant,solde=:solde,dateupdate=:dateupdate WHERE numerocompte=:numerocompte');
            $req->execute(array(
                'montant' =>$_POST['montant'],
                'solde' => $solde['solde'] - $_POST['montant'],
                'dateupdate' => $_POST['dateupdate'], 
                 'numerocompte' => $_POST['numerocompte']
                ));
            $req3 =$bdd->prepare('SELECT idclient FROM compte WHERE numerocompte = ?');
            $req3->execute(array($_POST['numerocompte']));
            $rep=$req3->fetch();
            $numclt = $rep['idclient'];
            $req2 =$bdd->prepare('INSERT INTO historique(idclient,transaction,date,montant,solde,numerocompte)  VALUES(:numeroclt, :transaction, :date, :montant,:solde,:numerocompte )');
            $req2->execute(array(
                 'numerocompte' => $_POST['numerocompte'],
                 'numeroclt' => $numclt,
                'transaction' => 'debit',
                'date' => $_POST['dateupdate'],
                'montant' =>$_POST['montant'],
                'solde' => $solde['solde'] + $_POST['montant']
                ));


         
                   $req2=$bdd->prepare('SELECT solde FROM compte WHERE numerocompte = :numerocompte');
            $req2->execute(array('numerocompte' => $_POST['numerocompte'] ));
            $sold = $req2->fetch();


            echo "Transaction éffectuée avec succès!!! </br> Le nouveau solde est  ". $sold['solde'];
        }
        else
        {
            echo "Désolé Vous n'avez pas les fonds nécéssaires pour ce transfert!!! </br> Vous n'avez que ". $solde['solde']. " francs CFA";
        }
    }





}
?>

        