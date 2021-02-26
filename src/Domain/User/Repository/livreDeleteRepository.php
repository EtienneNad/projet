<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class livreDeleteRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $livre The user
     *
     * @return int The new ID
     */
    public function DeleteLivre($id)
    {
        $sqlLivreAuteur = "delete from livreauteur where livreId = $id ;";
        if ($this->connection->query($sqlLivreAuteur)== true) {
            $sqlLivre = "delete from livres where id = $id ;";
            if ($this->connection->query($sqlLivre) == false) {

                $reponse = "le livre n'a pas été supprimer";
            } else {
                $reponse = "le livre a été supprimer avec succès";
            }
            return $reponse;
        }
    }
}

