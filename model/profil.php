<?php
namespace model;

/**
 * Classe représentant un profil
 */
class Profil
{
    private $nom;
    private $id_profil;

    /**
     * Constructeur de la classe profil
     *
     * @param string $nom // Le nom du profil
     * @param string $id_profil // L'id du profil
     */
    public function __construct(string $nom, string $id_profil)
    {
        $this->nom = $nom;
        $this->id_profil = $id_profil;
    }

    /**
     * Cette fonction renvoie le nom du profil
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Cette fonction renvoie l'id du profil
     * @return string
     */
    public function getIdProfil(): string
    {
        return $this->id_profil;
    }

}


