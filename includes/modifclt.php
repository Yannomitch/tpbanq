
<?php
if (empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['id']) )
{
    
    header('location:authentification.php');
}
   
if (isset($_POST['nom_client']) AND isset($_POST['prenom_client']) AND isset($_POST['sexe']) AND isset($_POST['profession']) 
   AND isset($_POST['mois']) AND isset($_POST['jour']) AND isset($_POST['actif']) AND isset($_GET['numclt']))
{
    
    echo $_GET['numclt'];
    $_POST['date_creation']= $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
    
            $req1 = $bdd->prepare('UPDATE client SET nomclient= :nomclient,, prenomclient=:prenomclient,sexe=:sexe,profession=:profession, datecreation=:datecreation, actif=:actif WHERE idclient = :numeroclt');
            $req1->execute(array(
                'nomclient' =>$_POST['nom_client'],
                'prenomclient' => $_POST['prenom_client'],
                'sexe' => $_POST['sexe'], 
                 'profession' => $_POST['profession'], 
                  'datecreation' =>$_POST['date_creation'], 
                  'actif' => $_POST['actif'],
                 'numeroclt' => $_GET['numclt']
                ));


            echo "Modification enrégistrée avec succès!!!" ;

        }
 else {
     echo 'yes++++++++++++++++++++++++++++++++++++++++++++++++++++++++';
 }

?>

        