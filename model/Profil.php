<?php
namespace model;

/**
 * Classe représentant un profil
 */
class Profil
{
    private $nom;
    private $id_profil;
    private $id_user;

    /**
     * Constructeur de la classe profil
     *
     * @param string $nom Le nom du profil
     * @param string $id_profil L'id du profil
     * @param string $id_user L'id de l'utilisateur
     */
    public function __construct(string $id_profil, string $id_user,string $nom)
    {
        $this->nom = $nom;
        $this->id_profil = $id_profil;
        $this->id_user = $id_user;

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

    /**
     * Cette fonction renvoie l'id de l'utilisateur à qui appartient le profil
     * @return string
     */
    public function getIdUser(): string
    {
        return $this->id_user;
    }

}


