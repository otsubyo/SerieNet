<?php
namespace model;

/**
 * Classe représentant un historique
 */
class Historique
{
    private $id_profil;
    private $recherche;

    /**
     * Constructeur de la classe profil
     *
     * @param string $id_profil // L'id du profil
     * @param string $recherche // L'historique de recherche
     */
    public function __construct(string $id_profil, string $recherche)
    {
        $this->id_profil = $id_profil;
        $this->recherche = $recherche;
    }

    /**
     * Cette fonction renvoie l'id du profil
     * @return string
     */
    public function getIdProfil(): string
    {
        return $this->id_profil;
    }

    /**
     * Cette fonction renvoie l'historique de recherche
     * @return string
     */
    public function getRecherche(): string
    {
        return $this->recherche;
    }

}


