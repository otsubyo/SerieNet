<?php

namespace model\dao\requests;

use model\dao\Database;
use model\Historique;
use PDO;

class HistoriqueRechercheRequest
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

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

    public function insertHistoriqueRecherche(Historique $historique)
    {
        $sql = "INSERT INTO historique_recherche (profile_id, terme_recherche, date_recherche) VALUES (:id_profil, :terme_recherche, :date_recherche)";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id_profil' => $historique->getIdProfil(), ':terme_recherche' => $historique->getTermeRecherche(), ':date_recherche' => $historique->getDateRecherche()));
    }

    public function deleteHistoriqueRecherche($id_profil)
    {
        $sql = "DELETE FROM historique_recherche WHERE profile_id = :id_profil";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id_profil' => $id_profil));
    }

}
