<?php
namespace model;

/**
 * Classe représentant un historique
 */
class Historique
{
    private string $id;
    private string $id_profil;
    private string $terme_recherche;
    private string $date_recherche;

    /**
     * Constructeur de la classe historique
     *
     * @param string $id_profil L'id du profil
     * @param string $recherche L'historique de recherche
     * @param string $date_recherche La date de la recherche
     */
    public function __construct(string $id_profil, string $recherche, string $date_recherche)
    {
        $this->id = $id_profil;
        $this->id_profil = $id_profil;
        $this->terme_recherche = $recherche;
        $this->date_recherche = $date_recherche;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of id_profile
     */
    public function getIdProfil(): string
    {
        return $this->id_profil;
    }

    /**
     * Get the value of terme_recherche
     */
    public function getTermeRecherche(): string
    {
        return $this->terme_recherche;
    }

    /**
     * Get the value of date_recherche
     */
    public function getDateRecherche(): string
    {
        return $this->date_recherche;
    }
}
