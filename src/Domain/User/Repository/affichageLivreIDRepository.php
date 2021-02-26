<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class affichageLivreIDRepository
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
    public function affichageLivreID($id)
    {
        $sql = "SELECT * from livres where id = $id ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

