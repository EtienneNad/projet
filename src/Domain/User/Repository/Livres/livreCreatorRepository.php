<?php

namespace App\Domain\User\Repository\Livres;

use PDO;

/**
 * Repository.
 */
class livreCreatorRepository
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
    public function insertLivre(array $livre): int
    {
        $row = [
            'genreid' => $livre['genreid'],
            'titre' => $livre['titre'],
            'isbn' => $livre['isbn'],

        ];

        $sql = "INSERT INTO livres SET 
                genreid=:genreid, 
                titre=:titre, 
                isbn=:isbn; 
                ";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}

