<?php
namespace model\dao\requests;

require_once(__DIR__ . "/../../dao/Database.php");
require_once(__DIR__ . "/SerieRequest.php");

use PDO;
use model\dao\Database;

class FavorisRequest
{
    private PDO $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }


    /**
     * Récupère les séries de la liste de l'utilisateur
     * @param $id
     * @return array
     */
    public function getFavoris($id): array
    {
        $sql = "SELECT id_serie from serie_favori WHERE id_profil = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            exit("ERROR 404 : Données introuvable !");
        }
        $series = array();
        $serieRequest = new SerieRequest();

        foreach ($data as $serie) {
            $series[] = $serieRequest->getSerie($serie['id_serie']);
        }
        return $series;
    }

    /**
     * Ajoute une série à la liste de l'utilisateur
     * @param $id_profil
     * @param $id_serie
     * @return bool
     */
    public function addFavoris($id_profil, $id_serie): bool
    {
        $sql = "INSERT INTO serie_favori (id_profil, id_serie) VALUES (:id, :id_serie)";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(':id' => $id_profil, ':id_serie' => $id_serie));
    }

    /**
     * Supprime une série de la liste de l'utilisateur
     * @param $id_profil
     * @param $id_serie
     * @return bool
     */
    public function deleteFavoris($id_profil, $id_serie): bool
    {
        $sql = "DELETE FROM serie_favori WHERE id_profil = :id AND id_serie = :id_serie";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(':id' => $id_profil, ':id_serie' => $id_serie));
    }

    /**
     * Vérifie si une série est dans la liste de l'utilisateur
     * @param $id_profil
     * @param $id_serie
     * @return bool
     */
    public function isFavoris($id_profil, $id_serie): bool
    {
        $sql = "SELECT id_serie from serie_favori WHERE id_profil = :id AND id_serie = :id_serie";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id_profil, ':id_serie' => $id_serie));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            return false;
        }
        return true;
    }

    /**
     * Vérifie si l'utilisateur a une liste de favoris
     * @param $id_profil
     * @return bool
     */
    public function hasFavoris($id_profil): bool
    {
        $sql = "SELECT id_serie from serie_favori WHERE id_profil = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id_profil));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            return false;
        }
        return true;
    }
}