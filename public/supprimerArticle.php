<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Table\ArticleTable;

// ====== Récupérer l'article que l'on veut modifier ======
// 1. Connexion a la base de données
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
// 2. Créer la table article
$table = new ArticleTable($pdo);
// 3. Récupération de l'article
$article = $table->fetchOne($_GET['id']);

// ====== SUPPRESSION DE l'ARTICLE =====
// Enregistrer le formulaire dans la base données
// grace à notre ArticleTable
$table->deleteOne($_GET['id']);

header('Location: /index.php');
