<?php

namespace App\Domain\User\Repository\Livres;

use PDO;

/**
 * Repository.
 */
class affichageLivreRepository
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
    public function affichageLivre()
    {

        $sql = "SELECT * from livres ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

