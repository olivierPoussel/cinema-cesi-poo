<?php

namespace App\Repository;

use App\DataProvider\Database;
use App\Entity\Acteur;
use PDO;

class ActeurRepository
{
    /** @var PDO */
    private $connexion;

    public function __construct()
    {
        $this->connexion = Database::getConnection();
    }

    /**
     * créer un acteur
     *
     * @param string $nom
     * @param string $prenom
     * @return integer
     */
    public function createActeur(string $nom, string $prenom): int
    {
        $sqlInsert = "INSERT INTO acteur(nom, prenom) VALUES(:nom,:prenom)";
        $statement = $this->connexion->prepare($sqlInsert);
        $statement->execute(['nom' => $nom, 'prenom' => $prenom]);
        $id = (int) $this->connexion->lastInsertId();

        return $id;
    }

    /**
     * modifier un acteur
     *
     * @param integer $id
     * @param string $nom
     * @param string $prenom
     * @return void
     */
    public function updateActeur(int $id, string $nom, string $prenom)
    {
        $sqlUpdate = 'UPDATE acteur SET nom = :nom, prenom = :prenom WHERE id = :id';
        $statement = $this->connexion->prepare($sqlUpdate);
        $statement->execute(['id' => $id, 'nom' => $nom, 'prenom' => $prenom]);
    }


    /**
     * supprimer un acteur
     *
     * @param integer $id
     * @return void
     */
    public function deleteActeur(int $id)
    {
        $sqlDelete = 'DELETE FROM acteur where id = :id';
        $statement = $this->connexion->prepare($sqlDelete);
        $statement->execute(['id' => $id]);
    }

    /**
     * récupére tous les acteurs
     *
     * @return Acteur[] tableau d'acteur
     */
    public function findAll(): array
    {
        //requete et affichage des Acteurs
        $sql = 'SELECT * FROM acteur';
        $statement = $this->connexion->query($sql);
        $statement->execute();
        $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

        $acteurTab = [];
        foreach ($resultat as $acteurArray) {
            $acteur = new Acteur($acteurArray['id'], $acteurArray['nom'], $acteurArray['prenom']);
            $acteurTab[] = $acteur;
        }

        return $acteurTab;
    }

    /**
     * trouver un acteur particulier
     *
     * @param integer $id
     * @return array
     */
    public function findById(int $id): array|Acteur
    {
        $sql = 'SELECT * FROM acteur where id = :id';
        $statement = $this->connexion->prepare($sql);
        $statement->execute(['id' => $id]);
        $resultat = $statement->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            $acteur = new Acteur($resultat['id'], $resultat['nom'], $resultat['prenom']);

            return $acteur;
        }

        return $resultat;
    }
}
