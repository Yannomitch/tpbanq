<?php
	if(isset($_REQUEST['pg']))
		{
		switch($_REQUEST['pg'])
			{
				//on gère toutes les possibilités de redirection en fonction de la variable pg contenu dans le $_request
				case'accueil':include ('includes/accueil.php');
			break;
			case'user':include ('includes/user.php');
			break;
			case'clients':include ('includes/clients.php');
			break;
			case'compte':include ('includes/compte.php');
			break;
			case'authentification':include ('includes/authentification.php');
			break;
			case'deconnexion':include ('includes/deconnexion.php');
			break;
			case'listeusers':include ("includes/listeusers.php");
			break;
			case'ajoutuser':include ("includes/ajoutuser.php");
			break;
			case'listeclients':include ("includes/listeclients.php");
			break;
			case'listeclientsac':include ("includes/listeclientsac.php");
			break;
			case'listeclientsnac':include ("includes/listeclientsnac.php");
			break;
			case'ajoutclient':include ("includes/ajoutclient.php");
			break;
			case'clientcompte':include ("includes/clientcompte.php");
			break;
			case'debiter':include ("includes/debiter.php");
			break;
			case'crediter':include ("includes/crediter.php");
			break;
			case'solde':include ("includes/solde.php");
			break;
			case'recherche':include ("includes/traitement.php");
			break;
			case'suprcompte':include ("includes/suprcompte.php");
			break;
			case'suprclient':include ("includes/suprclient.php");
			break;
			case'ajoutcompte':include ("includes/ajoutcompte.php");
			break;
			case'history':include ("includes/history.php");
			break;	
                    case'modifclient':include ("includes/modifclient.php");
			break;
                     case'modifclientt':include ("includes/modifclientt.php");
			break;
                      case'modifclt':include ("includes/modifclt.php");
			break;
                    default : include 'includes/accueil.php';//par défaut l'utilisateur sera dirigé vers l'accueil
			}
		}
		else
		{
			include 'includes/accueil.php';// dès que l'utilisateur est sur la page et qu'il n'a pas encore choisi de menu il sera sur la page accueil
		}
?>
