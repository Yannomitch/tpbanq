
<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id'])) {
    header('location:authentification.php');
}
?>

<p>Remplissez ces champs pour modifier les informations d'un client </p>
<?php if(!empty($_POST['numeroclt'])){ $name = $_POST['numeroclt'];}
 else {
    header('location:index.php? pg=listeclients') ;   
}?>
<form  method ="POST" >
    <fieldset><legend>CLIENT</legend>
        <table>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=gdbanque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $requ1 = $bdd->prepare('SELECT * FROM client WHERE idclient = ?') or
                    die(print_r($bdd->errorInfo()));
            $requ1->execute(array($_POST['numeroclt']));
            $donnee1 = $requ1->fetch();
            ?>
            <input name ="id" type="hidden" value ="<?php echo $_POST['numeroclt'] ; ?>" />
            <tr><td>Nom:  </td>    <td><input type ="text" name = "nom_client"value =' <?php echo $donnee1['nomclient']; ?>' required /> </td></tr>
            <tr><td>Prenom:</td>   <td><input type ="text" name = "prenom_client" value =' <?php echo $donnee1['prenomclient']; ?>' required /> </td></tr>
            <tr><td>Sexe:</td> <td><input type="radio" name ="sexe" value ="masculin"/> <label for="homme">Homme</label></td></tr>
            <tr><td></td> <td > <input type="radio" name ="sexe"value="feminin" /> <label for="femme">femme</label></td></tr>
            <tr><td>Profession:  </td><td><input type ="text" name = "profession" value =' <?php echo $donnee1['profession']; ?>' required /> </td></tr>
            <tr>
                <td>Date de creation:</td>
                <td><select name ="jour"> <?php for ($i = 01; $i < 32; $i++) { ?> <option value= "<?php echo $i; ?>" > <?php echo $i;
            } ?></option>

                    </select> 
                    <select name="mois"> <?php $jours = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
            for ($i = 0; $i < 12; $i++) {
                ?> <option value= "<?php echo $i + 1; ?>" > <?php echo $jours[$i];
            } ?></option>

                    </select> 
                    <select name ="annee"> <?php for ($i = 2016; $i > 1969; $i--) { ?> <option value= "<?php echo $i; ?>" > <?php echo $i;
            } ?></option>

                    </select> </td>
            </tr>



            <tr><td>Actif ? :</td> <td><input type="radio" name ="actif" value ="1"/> <label for="true">Oui</label></td></tr>
            <tr><td></td> <td > <input type="radio" name ="actif"value="0" /> <label for="false">Non</label></td></tr>
        </table>
        <p><input type = "submit" value="Mofifier" name ="submit"/> <input type="reset" value="Annuler" /></p>
    </fieldset>
</form> 
﻿
<?php

if(isset($_POST['submit']))
{
    $_POST['date_creation'] = $_POST['annee'] . '-' . $_POST['mois'] . '-' . $_POST['jour'];
     $nomclient = $_POST['nom_client'];
        $prenomclient = $_POST['prenom_client'];
        $sexe= $_POST['sexe'];
        $profession= $_POST['profession'];
        $datecreation = $_POST['date_creation'];
        $actif = $_POST['actif'];
        $id = $_POST['id'];
 
    
    

    $req1 = $bdd->query("UPDATE client SET nomclient= '$nomclient', prenomclient='$prenomclient',sexe='$sexe',profession='$profession', datecreation='$datecreation', actif='$actif' WHERE idclient = '$id'");
   

   

    if ($req1 == true) {
        echo "Modification enrégistrée avec succès!!!";
       
        exit();
    }

}

?>

