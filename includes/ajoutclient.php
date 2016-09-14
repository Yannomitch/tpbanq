
<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>

<p>Pour ajouter un nouveau client de la banque remplissez ces champs </p>
            <form action ="index.php?pg=ajoutclient" method ="POST" >
                <fieldset><legend>CLIENT</legend>
                <table>
              
                <tr><td>Nom:  </td>    <td><input type ="text" name = "nom_client" required /> </td></tr>
                <tr><td>Prenom:</td>   <td><input type ="text" name = "prenom_client" required /> </td></tr>
                <tr><td>Sexe:</td> <td><input type="radio" name ="sexe" value ="masculin"/> <label for="homme">Homme</label></td></tr>
                <tr><td></td> <td > <input type="radio" name ="sexe"value="feminin" /> <label for="femme">femme</label></td></tr>
                  <tr><td>Profession:  </td><td><input type ="text" name = "profession" required /> </td></tr>
                <tr>
                    <td>Date de creation:</td>
                     <td><select name ="jour"> <?php  for ($i=01; $i<32 ; $i++) { ?> <option value= "<?php echo $i;  ?>" > <?php echo $i ; }?></option>
                     
                        </select> 
                     <select name="mois"> <?php $jours = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre' ); 
                     for ($i=0; $i<12 ; $i++) { ?> <option value= "<?php echo $i + 1 ;  ?>" > <?php echo $jours[$i] ; }?></option>
                       
                     </select> 
                     <select name ="annee"> <?php  for ($i=2016; $i>1969 ; $i--) { ?> <option value= "<?php echo $i;  ?>" > <?php echo $i ; }?></option>
                     
                        </select> </td>
                </tr>
              

      
                <tr><td>Actif ? :</td> <td><input type="radio" name ="actif" value ="1"/> <label for="true">Oui</label></td></tr>
                <tr><td></td> <td > <input type="radio" name ="actif"value="0" /> <label for="false">Non</label></td></tr>
            </table>
                <p><input type = "submit" value="Envoyer"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php

if (isset($_POST['nom_client']) AND isset($_POST['prenom_client']) AND isset($_POST['sexe']) AND isset($_POST['profession']) 
    AND isset($_POST['mois']) AND isset($_POST['jour'])AND isset($_POST['adresse']) AND isset($_POST['actif']))
{
    $_POST['date_creation']= $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
    $bdd = new PDO ('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    /*$requ = $bdd->query('SELECT numerocompte FROM compte') or
    die(print_r($bdd->errorInfo()));//on va récupérer tous les numeros de compte existants
        
        $trouve = false;
        if (strlen($_POST['numerocompte']) < 11) { //on vérifie que le numero compte soit au moins de 11 chiffres
           echo 'Numero de compte trop court!!! </br> Vous avez entrez un numero de  '. strlen($_POST['numerocompte']) . ' chiffres au lieu de 11 chiffres au moins';
        }
        else
        {
                 While ($donnee= $requ->fetch() AND !$trouve)//tant qu'il n'a pas trouvé le numero de compte ou qu'il n'a pas fini de tester tous les numeros de compte la boucle continue
        {
            if ($_POST['numerocompte']==$donnee['numerocompte'] )//on compare le numero de compte entré à tous ceux qui existent
            {
                $trouve = true;
            }
        }

        if ($trouve)//si il trouve le numero de compte il invite l'utilisateur à taper un autre numero de compte
        {
            echo 'Désolé ce numéro de compte a déjà été attribué veuillez entrer un autre numero';
        }
        else 
        {*/
                    /* try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=gdbanque', 'root', '');
            }
            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }*/
            $req = $bdd->prepare('INSERT INTO client (nomclient, prenomclient,sexe,profession, datecreation, actif) VALUES(:nomclient, :prenomclient, :sexe, :profession, :datecreation, :actif)');
            $req->execute(array(
                'nomclient' =>$_POST['nom_client'],
                'prenomclient' => $_POST['prenom_client'],
                'sexe' => $_POST['sexe'], 
                 'profession' => $_POST['profession'], 
                  'datecreation' =>$_POST['date_creation'], 
                  'actif' => $_POST['actif']
                ));

            $req1=$bdd->prepare('SELECT idclient FROM client WHERE nomclient = :nomclient AND prenomclient = :prenomclient AND sexe= :sexe AND profession = :profession');
            $req1->execute(array(
                'nomclient' =>$_POST['nom_client'],
                'prenomclient' => $_POST['prenom_client'],
                'sexe' => $_POST['sexe'], 
                 'profession' => $_POST['profession']
                ));
            $idclt = $req1->fetch();
            $initiale = 2016;
            $numerocompte = $initiale.rand(1000000,999999999);


            $req2 = $bdd->prepare('INSERT INTO compte (idclient,numerocompte) VALUES(?,?)');
            $req2->execute(array($idclt['idclient'],$numerocompte));


            echo "Enregistrement éffectué avec succès!!! </br> le numero du compte attribué à ce client est ".$numerocompte;

        }
//}

//}
?>

        