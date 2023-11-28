<?php
namespace model\dao\requests;
use model\dao\Database;
use model\Profil;
use PDO;

class ProfilRequest
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    public function getProfil($id_profil, $id_user): Profil
    {
        $sql = "SELECT * FROM profil WHERE id_profil = :id AND id_user = :id_user";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id_profil, ':id_user' => $id_user));
        (array) $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        return new Profil($data['id_profil'], $data['id_user'], $data['nom']);
    }

    public function getProfils($id_user): array
    {
        $sql = "SELECT * FROM profil WHERE id_user = :id_user";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id_user' => $id_user));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        $profils = array();
        foreach ($data as $row) {
            $profils[] = new Profil($row['id_profil'], $row['id_user'], $row['nom']);
        }
        return $profils;
    }


}
