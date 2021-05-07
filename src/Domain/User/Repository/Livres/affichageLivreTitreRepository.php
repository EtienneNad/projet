<?php

namespace App\Domain\User\Repository\Livres;

use PDO;

/**
 * Repository.
 */
class affichageLivreTitreRepository
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
     * @return array The new ID
     */
    public function affichageLivreTitre($titre)
    {

        $sql = "SELECT * from livres where titre like '{$titre}%';";



        return $this->connection->query($sql)->fetchAll();
    }
}

