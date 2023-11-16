<?php

namespace model\dao;
use model\dao\requests\GenreRequest;
use model\dao\requests\HistoriqueRechercheRequest;
use model\dao\requests\ProfilRequest;
use model\dao\requests\SerieRequest;
use model\Historique;

class Recommandations
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    /**
     * Renvoie les recommandations de films pour un profil donné
     * @param int $id_profil L'id du profil
     * @return array
     */
    public function getRecommandationsSeries(int $id_profil): array
    {
        $historiqueRequest = new HistoriqueRechercheRequest();
        $serieRequest = new SerieRequest();
        $historique = $historiqueRequest->getHistoriqueRecherchesByProfil($id_profil);

        $genresREC = array();
        foreach ($historique as $h) {
            $search = $h->getTermeRecherche();
            $series = $serieRequest->getSeriesSearch($search);
            foreach ($series as $s) {
                $genres = $serieRequest->getGenresSerie($s->getIdentifiant());
                foreach ($genres as $g) {
                    $genresREC[] = $g->getGenre()['genre_name'];
                }
            }
        }
        $genresREC = array_unique($genresREC);
        $seriesREC = array();
        foreach ($genresREC as $g) {
            $seriesREC[] = $serieRequest->getSeriesByGenre($g);
        }
        return $seriesREC;
    }
}
