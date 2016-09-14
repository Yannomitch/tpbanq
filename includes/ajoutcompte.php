<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    header('location:authentification.php');
}
    ?>


<p>Pour ajouter un nouveau compte à un client remplissez ce champ </p>
            <form action ="index.php?pg=ajoutcompte" method ="POST" >
                <fieldset><legend>NOUVEAU COMPTE</legend>
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
    
              
            </table>
                <p><input type = "submit" value="Ajouter"/> <input type="reset" value="Annuler" /></p>
                </fieldset>
            </form> 

            <?php
if( isset($_POST['numeroclt']))
{

   
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
                 $initiale = 2016;
            $numerocompte = $initiale.rand(1000000,999999999);

                $req = $bdd->prepare('INSERT INTO compte (idclient,numerocompte) VALUES(?,?)');
                $req->execute(array($_POST['numeroclt'] ,$numerocompte));


               echo "Ajout éffectué avec succès!!! </br> le numero du compte attribué à ce client est ".$numerocompte;

        //}
    // }

   
}
?>

        