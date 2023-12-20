<?php

namespace model\dao\requests;

use model\dao\Database;
use model\Historique;
use PDO;

class HistoriqueRequest
{
    private PDO $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    /**
     * Retourne l'historique de recherche d'un profil
     * @param $id_profil
     * @return array
     */
    public function getHistoriqueRecherchesByProfil($id_profil): array
    {
        $sql = "SELECT * FROM historique_recherche WHERE profile_id = :id_profil";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id_profil' => $id_profil));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        $historiques = array();
        foreach ($data as $row) {
            $historiques[] = new Historique($row['profile_id'], $row['terme_recherche'], $row['date_recherche']);
        }
        return $historiques;
    }

    /**
     * Ajoute une recherche dans l'historique
     * @param $id_profil
     * @param $terme_recherche
     * @return bool
     */
    public function insertHistoriqueRecherche($id_profil, $terme_recherche): bool
    {
        $sql = "INSERT INTO historique_recherche (profile_id, terme_recherche, date_recherche) VALUES (:id_profil, :terme_recherche, NOW())";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(':id_profil' => $id_profil, ':terme_recherche' => $terme_recherche));
    }

    /**
     * Supprime l'historique de recherche d'un profil
     * @param $id_profil
     * @return bool
     */
    public function deleteHistoriqueRecherche($id_profil): bool
    {
        $sql = "DELETE FROM historique_recherche WHERE profile_id = :id_profil";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(':id_profil' => $id_profil));
    }

    public function hasHistorique($id_profil): bool
    {
        $sql = "SELECT * FROM historique_recherche WHERE profile_id = :id_profil";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id_profil' => $id_profil));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            return false;
        }
        return true;
    }

}
