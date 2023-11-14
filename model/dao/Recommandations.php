<?php

namespace model\dao;
use model\dao\requests\GenreRequest;
use model\dao\requests\HistoriqueRechercheRequest;
use model\dao\requests\ProfilRequest;
use model\dao\requests\UserRequest;

class Recommandations
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    public function getRecommandationsSeries(int $id_profil)
    {
        $historique = new HistoriqueRechercheRequest();
        $profil = new ProfilRequest();
        $serie = new SerieRequest();
        $genre = new GenreRequest();

        $historique = $historique->getHistoriqueRecherchesByProfil($id_profil);



    }


}
