<?php

namespace App\Table;

use PDO;

/**
 * Représente la table des articles dans le base de données.
 */
class ArticleTable extends Table
{
    public function __construct(PDO $connection)
    {
        parent::__construct($connection, 'articles');
    }

    public function insertOne(string $title, string $description, string $content): void
    {
        $this->connection->exec("INSERT INTO articles (title, description, content) VALUES ('$title', '$description', '$content')");
    }

    public function updateOne(
        int $id,
        string $title,
        string $description,
        string $content,
    ): void {
        $this
            ->connection
            ->prepare(<<<SQL
                UPDATE articles
                SET
                    title = ?,
                    description = ?,
                    content = ?
                WHERE
                    id = ?
            SQL)
            ->execute([
                $title,
                $description,
                $content,
                $id,
            ]);
    }

    public function deleteOne(int $id): void
    {
        $this
            ->connection
            ->prepare(<<<SQL
                DELETE FROM articles WHERE id = ?
            SQL)
            ->execute([$id]);
    }
}
