<?php

namespace App\Table;

use PDO;

/**
 * Représente une table de notre base de données. Possède
 * les opérations les plus élémentaires sur une table de
 * la base de données.
 */
class Table
{
    /**
     * Contient la connexion à la base de données
     */
    protected PDO $connection;

    /**
     * Contient le nom de table ciblé
     */
    protected string $name;

    public function __construct(PDO $connection, string $name)
    {
        $this->connection = $connection;
        $this->name = $name;
    }

    /**
     * Récupére plusieurs lignes de la table concerné. Vous
     * pouvez spécifier en premier la limite.
     * Retourne les lignes sous forme de tableaux de tableaux.
     */
    public function fetchMany(int $limit = 25): array
    {
        return $this
            ->connection
            ->query("SELECT * FROM $this->name LIMIT $limit")
            ->fetchAll();
    }

    /**
     * Récupére une seule ligne de la table concernée. Retourne
     * un tableaux associatif avec le nom des colones en clefs
     * et le contenue de la colone en valeur.
     */
    public function fetchOne(int $id): array
    {
        return $this
            ->connection
            ->query("SELECT * FROM $this->name WHERE id=$id")
            ->fetch();
    }
}
