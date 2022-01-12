<?php

namespace App\Table;

use PDO;

class ArticleTable
{
    protected PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchMany(int $limit = 25): array
    {
        $requete = $this->connection->query("SELECT * FROM articles LIMIT $limit");

        return $requete->fetchAll();
    }

    public function fetchOne(int $id): array
    {
        $requete = $this->connection->query("SELECT * FROM articles WHERE id = $id");

        return $requete->fetch();
    }
}
