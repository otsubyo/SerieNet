<?php

namespace model\dao;

require_once __DIR__ . "/../../model/dao/Database.php";
require_once __DIR__ . "/../../model/dao/requests/GenreRequest.php";
require_once __DIR__ . "/../../model/dao/requests/HistoriqueRequest.php";
require_once __DIR__ . "/../../model/dao/requests/ProfilRequest.php";
require_once __DIR__ . "/../../model/dao/requests/SerieRequest.php";
require_once __DIR__ . "/../../model/dao/requests/FavorisRequest.php";
require_once __DIR__ . "/../../model/Historique.php";

use model\dao\requests\GenreRequest;
use model\dao\requests\HistoriqueRequest;
use model\dao\requests\ProfilRequest;
use model\dao\requests\SerieRequest;
use model\dao\requests\FavorisRequest;
use model\Historique;
use model\Serie;
use PDO;

class Recommandations
{

    public function __construct(){}

    /**
     * Renvoie les séries recommandées pour un profil
     * @param int $id_profil L'id du profil
     * @return array
     */
    public function getRecommandationsSeries(int $id_profil): array {
        $historiqueRequest = new HistoriqueRequest();
        $favorisRequest = new FavorisRequest();

        if ($favorisRequest->hasFavoris($id_profil) && $historiqueRequest->hasHistorique($id_profil)) {
            return array_merge($this->getRecommandationByFavoris($id_profil), $this->getRecommandationByHistorique($id_profil));
        } else if ($favorisRequest->hasFavoris($id_profil)) {
            return $this->getRecommandationByFavoris($id_profil);
        } else if ($historiqueRequest->hasHistorique($id_profil)) {
            return $this->getRecommandationByHistorique($id_profil);
        } else {
            return array();
        }
    }

    /**
     * Renvoie les séries recommandées pour un profil en fonction des favoris
     * @param int $id_profil L'id du profil
     * @return array
     */
    public function getRecommandationByFavoris(int $id_profil): array
    {
        $favorisRequest = new FavorisRequest();
        $serieRequest = new SerieRequest();

        $seriesFavorites = $favorisRequest->getFavoris($id_profil);
        $seriesRecommandees = array();
        $listeGenres = array();

        foreach ($seriesFavorites as $serie) {
            $genres = $serie->getGenres();
            shuffle($genres); // On mélange les genres pour avoir un ordre aléatoire
            $listeGenres[] = $genres[0]->getNom();
        }

        $listeGenres = array_unique($listeGenres);

        foreach ($listeGenres as $genre) {
            $tempList = $serieRequest->getSeriesByGenre($genre, false);
            shuffle($tempList);
            for ($i = 0; $i < count($tempList); $i++) {
                $seriesRecommandees[] = $tempList[$i];
                if ($i == 3) {
                    break;
                }
            }
        }
        shuffle($seriesRecommandees);
        return $seriesRecommandees;
    }

    /**
     * Renvoie les séries recommandées pour un profil en fonction de l'historique
     * @param int $id_profil L'id du profil
     * @return array
     */
    public function getRecommandationByHistorique(int $id_profil): array
    {
        $historiqueRequest = new HistoriqueRequest();
        $serieRequest = new SerieRequest();
        $historiques = $historiqueRequest->getHistoriqueRecherchesByProfil($id_profil);
        $seriesRecommandees = array();

        foreach ($historiques as $historique) {
            $tempList = $serieRequest->getSeriesSearch($historique->getTermeRecherche(), "VF", false);
            shuffle($tempList);
            for ($i = 0; $i < count($tempList); $i++) {
                $seriesRecommandees[] = $tempList[$i];
                if ($i == 3) {
                    break;
                }
            }
        }
        shuffle($seriesRecommandees);
        return $seriesRecommandees;
    }

}
