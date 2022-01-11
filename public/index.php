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

// Création d'un objet PDO. Il recoit en paramètre
// une chaine de caractère avec vos informations de connexion
// à mysql:
// host: correspond à l'adresse de la machine contenant mysql (généralement localhost / 127.0.0.1)
// port: correspond au port du server mysql (3306)
// dbname: correspond au nom de votre base de données
// UN second paramètre qui correspond au nom d'utilisateur de mysql (genéralement "root")
// Une troisième paramètre qui correspond au mot de passe (genéralement "root" ou bien "")
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
$table = new App\Table\ArticleTable($pdo);
// On prépare une requète SQL. Cette méthode "query" prend en paramètre
// une chaine de caratère avec votre requête SQL et elle retourne
// un "PDOStatement" (Une requête PDO)
$articles = $table->fetchMany(25);
$article = $table->fetchOne(1234);
// $article = $statement->fetch() Récupére un seul article !


// $menu = 'coucou';
// 
// echo $menu === 'accueil' ? '<p>Accueil</p>' : '<p>Pas accueil</p>';
