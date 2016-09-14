
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
        $id = $_GET['num'];
 
    
    

    $req1 = $bdd->query("UPDATE client SET nomclient= '$nomclient', prenomclient='$prenomclient',sexe='$sexe',profession='$profession', datecreation='$datecreation', actif='$actif' WHERE idclient = '$id'");
   

   

    if ($req1 == true) {
        echo "Modification enrégistrée avec succès!!!";
       
        exit();
    }

}

?>
