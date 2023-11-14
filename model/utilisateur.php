<?php
namespace model;

/**
 * Classe représentant un utilisateur
 */
class Utilisateur
{
    private $identifiant;
    private $mot_de_passe;

    /**
     * Constructeur de la classe profil
     *
     * @param string $identifiant // L'identifiant de l'utilisateur
     * @param string $mot_de_passe // Le mot de passe de l'utilisateur
     */
    public function __construct(string $identifiant, string $mot_de_passe)
    {
        $this->identifiant = $identifiant;
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * Cette fonction renvoie l'identifiant de l'utilisateur
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * Cette fonction renvoie l'historique de recherche
     * @return string
     */
    public function getMotDePasse(): string
    {
        return $this->mot_de_passe;
    }

}


