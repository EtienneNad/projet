<?php

namespace App\Domain\User\Repository\Auteurs;

use PDO;

/**
 * Repository.
 */
class affichageAuteursIDRepository
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
     * @param array $Auteurs The user
     *
     * @return int The new ID
     */
    public function affichageAuteursID($id)
    {
        $sql = "SELECT * from auteurs where id = $id ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

