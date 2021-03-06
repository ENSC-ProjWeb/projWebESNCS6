<?php

/**
 * Valider inscription en attente
 * 
 * Action qui permet de valider une inscription en attente
 * 
 */

// -------------------------------------------------------
// Recuperer les donnees d'entree nécessaires à l'action
// -------------------------------------------------------

include $models["Modele"];
include $models["Adresse"];
include $models["Sport"];
include $models["Organisateur"];
include $models["Participant"];
include $models["Evenement"];

if (isset($_SESSION['login'])) { $login = $_SESSION["login"]; }
$idEvent = $_GET["idEvent"];
$loginUser = $_GET["login"];
$organisateur = new Organisateur();
$evenement = new Evenement();
$sport = new Sport();
// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// On modifie le statut de l'inscription
$evenement->validerInscriptionMembre($idEvent, $loginUser);

// On récupère les informations concernant l'événement
$listeEvenementEnAttente = $organisateur->getListeInscriptionsEnAttente($login);


// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

$_SESSION['state'] = 'connecteOrganisateur_consultationInscriptionsEnAttente';

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Definition des donnees structurelles de la vue
$dataView['title']=TITLE.' - Inscriptions en attente';
$dataView['zoneHaute']=$views['banniere'];
$dataView['zoneRecherche']=$views['recherche'];
$dataView['css']=$css['stylePrincipal'];
$dataView["zoneMenu"] = $views['menuConnecteOrganisateur'];
$dataView["infosOrganisateur"] = $_SESSION["infosOrganisateur"];
$dataView["zoneCentrale"] = $views["listeInscriptionsEnAttente"];
$dataView["eventPending"] = $listeEvenementEnAttente;
$dataView['listeSports'] = $sport->getFiveTopSports();

// Enregistrement des donnees de la vue dans la session
$_SESSION['dataView']=$dataView;

?>  



