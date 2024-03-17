<?php

function redirect($action)
{

	/* echo $action; */
	switch ($action) {

		case 'signIn':
			$fichier = "inscription.controller.php";
			break;

		case 'page1':
			$fichier = "page1_ctl.php";
			break;
		case 'admin':
			$fichier = "admin/ReadCtrl.php";
			break;
		case 'create':
			$fichier = "admin/CreateCtrl.php";
			break;
		case 'update':
			$fichier = "";
			break;
		case 'delete':
			$fichier = "";
			break;
		default:
			$fichier = "page404_ctl.php";
			break;
	}
	if (!file_exists(RACINE . '/controleur/' . $fichier)) die("Le fichier : " . $fichier . " n'existe pas !");

	return $fichier;
}

function tableRedirect($table)
{
	switch ($table) {
		case 'admin':
		case 'film':
		case 'stream':
		case 'achat':
		case'adherent':
			$fichier = "admin/ReadCtrl.php";
			break;

		default:
			$fichier = "page404_ctl.php";
			break;
	}
	if (!file_exists(RACINE . '/controleur/' . $fichier)) die("Le fichier : " . $fichier . " n'existe pas !");

	return $fichier;
}
