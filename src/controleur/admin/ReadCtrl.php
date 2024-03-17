<?php

require_once("./modele/FilmBD.php");
require_once("./modele/StreamBD.php");
require_once("./modele/AchatBD.php");
// require_once("./modele/AdherentBD.php");
// require_once("./modele/SalleBD.php");
// require_once("./modele/SeanceBD.php");
// require_once("./modele/TarifBD.php");
// require_once("./modele/VilleBD.php");


class ReadCtrl
{
    public function getFilm()
    {
        return FilmBD::getFilms('film');
    }

    public function getStream()
    {
        return StreamBD::getStreams('stream');
    }
    public function getAchat()
    {
        return AchatBD::getAchats('achat');
    }
    public function getAdherent()
    {
        return AdherentBD::getAdherents('adherent');
    }
    
}

$read = new ReadCtrl();


$table = isset($_GET['table']) ? $_GET['table'] : 'admin';


// Load the data based on the selected table
switch ($table) {
    case 'stream':
        $data = $read->getStream();
        break;
    case 'achat':
        $data = $read->getAchat();
        break;
    case 'adherent':
        $data = $read->getAdherent();
        break;
    default:
        $data = $read->getFilm();
        break;
}


include("vue/admin/Crud_vue.php");
