<?php
namespace model;

/**
 * Classe représentant un genre de série
 */
class Genre
{
    private string $id;
    private string $nom;

    /**
     * Constructeur de la classe Genre
     * @param string $id L'id du genre
     * @param string $nom Le nom du genre
     */
    public function __construct(string $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

    /**
     * Renvoie l'identifiant du genre
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->id;
    }

    /**
     * Renvoie le nom du genre
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Renvoie une représentation textuelle du genre
     * @return string
     */
    public function toString(): string
    {
        return "Genre : " . $this->nom;
    }

}
