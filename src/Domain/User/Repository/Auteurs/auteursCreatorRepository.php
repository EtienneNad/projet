<?php

namespace App\Domain\User\Repository\Auteurs;

use PDO;

/**
 * Repository.
 */
class auteursCreatorRepository
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
     * @param array $auteurs The user
     *
     * @return int The new ID
     */
    public function insertAuteurs(array $auteurs): int
    {
        $row = [
            'nom' => $auteurs['nom'],
            'prenom' => $auteurs['prenom'],
        ];

        $sql = "INSERT INTO auteurs SET 
                nom=:nom, 
                prenom=:prenom;
                ";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}

