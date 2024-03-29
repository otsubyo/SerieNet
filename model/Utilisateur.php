<?php
namespace model;

/**
 * Classe représentant un utilisateur
 */
class Utilisateur
{
    private string $identifiant;
    private string $mot_de_passe;

    /**
     * Constructeur de la classe utilisateur
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
     * Renvoie l'identifiant de l'utilisateur
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * Renvoie l'historique de recherche
     * @return string
     */
    public function getMotDePasse(): string
    {
        return $this->mot_de_passe;
    }

}


