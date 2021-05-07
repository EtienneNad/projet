<?php

namespace App\Domain\User\Repository\livres;

use PDO;

/**
 * Repository.
 */
class ModifierLivreRepository
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
    public function ModificationLivre(array $livre): array
    {
        $row = [
            'id' => $livre ['id'],
            'genreid' => $livre['genreid'],
            'titre' => $livre['titre'],
            'isbn' => $livre['isbn'],

        ];

        $sql = "UPDATE livres SET genreid=:genreid, titre=:titre, isbn=:isbn WHERE id=:id;";

        $this->connection->prepare($sql)->execute($row);
        return $row;
    }
}

