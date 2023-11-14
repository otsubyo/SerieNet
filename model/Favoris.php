<?php
namespace model;

/**
 * Classe représentant un favoris d'un profil
 */

class Favoris
{
    private $id_profil;
    private $id_serie;

    /**
     * Constructeur de la classe favoris
     *
     * @param string $id_profil // L'id du profil
     * @param string $id_serie // L'id de la série
     */
    public function __construct(string $id_profil, string $id_serie)
    {
        $this->id_profil = $id_profil;
        $this->id_serie = $id_serie;
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
     * Cette fonction renvoie l'id de la série
     * @return string
     */
    public function getIdSerie(): string
    {
        return $this->id_serie;
    }

}
