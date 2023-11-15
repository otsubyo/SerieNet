<?php
namespace model;

/**
 * Classe représentant une Serie
 */
class Serie
{
    private $id;
    private $nom;
    private $genre;
    private $etoiles;
    private $synopsis;

    /**
     * Constructeur de la classe Serie
     * @param string $id L'id de la série
     * @param string $nom Le nom de la série
     * @param string $genre Le genre de la série
     * @param string $etoiles Le nombre d'étoiles de la série
     * @param string $synopsis Le synopsis de la série
     */
    public function __construct(string $id, string $nom, array $genre, string $etoiles, string $synopsis)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->genre = $genre;
        $this->etoiles = $etoiles;
        $this->synopsis = $synopsis;
    }

    /**
     * Renvoie l'identifiant de la série
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->id;
    }

    /**
     * Renvoie le nom de la série
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Renvoie le genre de la série
     * @return string
     */
    public function getGenre(): array
    {
        return $this->genre;
    }

    /**
     * Renvoie le nombre d'étoiles de la série
     * @return int
     */
    public function getEtoiles(): int
    {
        return $this->etoiles;
    }

    /**
     * Renvoie le synopsis de la série
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

}


