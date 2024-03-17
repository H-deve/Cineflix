<?php

require_once("./modele/DbConnect.php");

class AchatBD extends DbConnect{
    private static $table = "achat";
    public static function getAchats() : array {
        $db = self::connexion();
        $result = [];

        try {
            $query = $db->query("SELECT * FROM " . self::$table);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching achat: " . $e->getMessage());
        }

        $db = null;
        return $result;
    }

    public static function addAchats($id_billet, $horaire_date, $date_d’achat , $nb_places_achetees,$id_adherent,$id_seance) : bool {
        $db = self::connexion();

        try {
            $query = $db->prepare("INSERT INTO " . self::$table . " (id_billet, horaire_date, date_d’achat , nb_places_achetees,id_adherent,id_seance) 
                VALUES (?, ?, ?, ?,?,?)");
            $query->execute([$id_billet, $horaire_date, $date_d’achat , $nb_places_achetees,$id_adherent,$id_seance]);
            return true;
        } catch (PDOException $e) {
            die("Error adding stream: " . $e->getMessage());
            return false;
        }
    }

    public static function deleteAchats($id_billet) : bool {
        $db = self::connexion();

        try {
            $query = $db->prepare("DELETE FROM " . self::$table . " WHERE id_billet = ?");
            $query->execute([$id_billet]);
            return true;
        } catch (PDOException $e) {
            die("Error deleting stream: " . $e->getMessage());
            return false;
        }
    }

   
}