<?php

require_once("./modele/FilmBD.php");
require_once("./modele/StreamBD.php");
// require_once("./modele/Dbconnect");
// require_once("./modele/AchatBD.php");

class CreateCtrl
{
    function CreateFilm($titre, $desc, $duree, $etat, $id_affiche, $date_sortie, $date_expiration)
    {

        try {
            // Connect to the database using your database class (replace 'YourDatabaseClass' with the actual class name)
            $db = DbConnect::connexion();

            // Prepare the SQL statement
            $query = $db->prepare("INSERT INTO film (titre, description, duree, etat, id_affiche, date_sortie, date_expiration)
                                       VALUES (:titre, :desc, :duree, :etat, :id_affiche, :date_sortie, :date_expiration)");

            // Bind values to parameters
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':desc', $desc, PDO::PARAM_STR);
            $query->bindValue(':duree', $duree, PDO::PARAM_INT);
            $query->bindValue(':etat', $etat, PDO::PARAM_STR);
            $query->bindValue(':id_affiche', $id_affiche, PDO::PARAM_INT);
            $query->bindValue(':date_sortie', $date_sortie, PDO::PARAM_STR);
            $query->bindValue(':date_expiration', $date_expiration, PDO::PARAM_STR);

            // Execute the query
            $query->execute();

            // Close the cursor
            $query->closeCursor();
        } catch (PDOException $e) {
            // Handle any exceptions or errors
            die("Error: " . $e->getMessage());
        }
    }
    function CreateStream($date_expiration, $date_achat, $id_film, $id_adherent)
    {

        try {

            $query = StreamBD::addStream($date_expiration, $date_achat, $id_film, $id_adherent);
        } catch (PDOException $e) {
            die("Error : ") . $e->getMessage();
        }
    }
}
include("vue/admin/Create_vue.php");
