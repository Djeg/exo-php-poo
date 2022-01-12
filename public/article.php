<?php

require __DIR__ . '/../vendor/autoload.php';

// Récupération de l'id de larticle:
$id = $_GET['id'];
// Création d'une instance de PDO (connection à la base de données)
$connection = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
// $connection: PDO
// Préparation d'une requête SQL
$requete = $connection->query("SELECT * FROM articles WHERE id = $id");
// $requete: PDOStatement|false
// éxécute la requête SQL et on récupére les résultat
$article = $requete->fetch();
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
    <title>Mon Blog - <?= $article['title'] ?></title>
</head>

<body>
    <header>
        <div class="blur"></div>
        <nav>
            <a href="/">
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
        <h1><?= $article['title'] ?></h1>
        <p><?= $article['description'] ?></p>
    </header>

    <main>
        <div class="content">
            <?= $article['content'] ?>
        </div>
    </main>

    <footer>
        <p>Mon Blog - 2022</p>
    </footer>
</body>

</html>