<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * 1. Exercice - Créer une page "index.php" qui affiche les 25 derniers
 *    articles en HTML. Vous pouvez rajouter du css, du javascript
 * 
 * 2. Exercice - Créer une page qui affiche un seul article ! Créer
 *    un lien sur la page index.php qui redirige vers la page article
 *    lorsque l'on clique sur un article
 * 
 * 3. Exercice - Réutiliser du html. Vous pouvez créer des fichier
 *    php dans un répertoire "templates" vous pouvez inclure ces fichiers
 *    grace à la commande "include" (include __DIR__ . '/../templates/start.php')
 * 
 * 4. Exercice - Créer une class (dans le répertoire src), avec le namespace
 *    suivant 'App\Table\ArticleTable'. Cette class à pour role de récupérer
 *    un ou plusieurs article(s).
 *    - Ajouter un constructeur qui accèpte un paramètre : une instance de
 *      le class PDO.
 *    - Ajouter une méthode "fetchMany" qui accépte une limite (int) et qui
 *      vas chercher le nombre spécifier en paramètre.
 *    - Ajouter une méthode "fetchOne" qui accépte un paramètre $id (int)
 *      et ça retourne l'article avec l'identifiant spécifié en paramètre
 *    - Utiliser cette class App\Table\ArticleTable dans vos différentes
 *      pages
 */

// Création d'une instance de PDO (connection à la base de données)
$connection = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
// $connection: PDO
// Préparation d'une requête SQL
$requete = $connection->query('SELECT * FROM articles LIMIT 25');
// $requete: PDOStatement|false
// éxécute la requête SQL et on récupére les résultat
$articles = $requete->fetchAll();
// $articles: array
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style.css" />
    <title>Mon Blog - Accueil</title>
</head>

<body>
    <header>
        <div class="blur"></div>
        <nav>
            <a href="#accueil">
                <p>Accueil</p>
            </a>
            <a href="#contact">
                <p>Contact</p>
            </a>
            <a href="#a-propos">
                <p>A Propos de moi</p>
            </a>
            <a href="#se-connecter">
                <p>Se connecter</p>
            </a>
        </nav>
        <h1>Mon Blog</h1>
        <p>Bienvenue sur mon blog</p>
    </header>

    <main>
        <div class="content">
            <?php foreach ($articles as $index => $article) : ?>
                <a href="/article.php?id=<?= $article['id'] ?>" class="article-vignette">
                    <h2><?= $article['title']; ?></h2>
                    <p class="description"><?= $article['description']; ?></p>
                    <p class="date"><?= $article['createdAt']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>Mon Blog - 2022</p>
    </footer>
</body>

</html>