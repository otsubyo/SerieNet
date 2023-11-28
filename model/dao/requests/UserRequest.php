<?php
namespace model\dao\requests;

require_once(__DIR__ . "/../../dao/Database.php");
require_once(__DIR__ . "/../../User.php");
use model\dao\Database;
use model\Utilisateur;
use PDO;

/**
 * Une classe représentant une requete sur les utilisateurs
 */
class UserRequest
{
    private PDO $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }
    public function getUser(string $user): Utilisateur
    {
        $sql = "SELECT * FROM utilisateur WHERE identifiant = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $user));
        (array)$data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        return new Utilisateur($data['identifiant'], $data['mot_de_passe']);
    }

    public function insertUser(Utilisateur $user): bool
    {
        $sql = "INSERT INTO utilisateur(identifiant,mot_de_passe)
            VALUES(:username,:password)";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(
            ':username' => $user->getIdentifiant(),
            ':password' => hash('sha256', $user->getMotDePasse())
        ));
    }

    public function deleteUser(string $user): bool
    {
        // Suppression d'un utilisateur
        $sql = "DELETE FROM users WHERE identifiant = :username";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(':username' => $user));
    }

    public function updateUser(array $data): bool
    {
        $sql = "UPDATE users SET";
        if (isset($data['mot_de_passe'])) {
            $sql .= " mot_de_passe = :password,";
        }

        if (!isset($data['mot_de_passe']) && !isset($data['role'])) {
            return false;
        }

        // Suppression de la virgule en trop
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE identifiant = :username";
        $stmt = $this->linkpdo->prepare($sql);
        return $stmt->execute(array(
            ':password' => $data['mot_de_passe']
        ));
    }
}
