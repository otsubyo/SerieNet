<?php
namespace model;
require_once __DIR__ . "/Genre.php";

use model\Genre;

/**
 * Classe représentant une Serie
 */
class Serie
{
    private string $id;
    private string $nom;
    private array $genres;
    private string $etoiles;
    private string $synopsis;
    private string $image;

    /**
     * Constructeur de la classe Serie
     * @param string $id L'id de la série
     * @param string $nom Le nom de la série
     * @param array $genres Le genre de la série
     * @param string $etoiles Le nombre d'étoiles de la série
     * @param string $synopsis Le synopsis de la série
     * @param string $image L'image de la série
     */
    public function __construct(string $id, string $nom, array $genres, string $etoiles, string $synopsis, string $image)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->genres = $genres;
        $this->etoiles = $etoiles;
        $this->synopsis = $synopsis;
        $this->image = $image;
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
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * Renvoie le genre de la série au format String
     * @return string
     */
    public function getGenresString(): string
    {
        $genres = "";
        foreach ($this->genres as $genre) {
            $genres .= $genre->getNom() . ",";
        }
        return substr($genres, 0, -1);
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

    /**
     * Renvoie l'image de la série
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Renvoie la série au format String
     * @return string
     */
    public function toString(): string
    {
        $genres = "[";
        foreach ($this->genres as $genre) {
            $genres .= $genre->getNom() . ",";
        }
        $genres = substr($genres, 0, -1);
        $genres .= "]";
        return "Serie{" .
            "id='" . $this->id . '\'' .
            ", nom='" . $this->nom . '\'' .
            ", genres='" . $genres . '\'' .
            ", etoiles='" . $this->etoiles . '\'' .
            ", synopsis='" . $this->synopsis . '\'' .
            '}';
    }

    /**
     * Renvoie la série au format JSON
     * @return array
     */
    public function toArray(): array
    {
        $genres = "[";
        foreach ($this->genres as $genre) {
            $genres .= $genre->getNom() . ",";
        }
        $genres = substr($genres, 0, -1);
        $genres .= "]";
        return array(
            "id" => $this->id,
            "nom" => $this->nom,
            "genres" => $genres,
            "etoiles" => $this->etoiles,
            "synopsis" => $this->synopsis,
            "image" => $this->image
        );
    }
}
