<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * 1. Exercice - Créer une page "index.php" qui affiche les 25 derniers
 *    articles en HTML. Vous pouvez rajouter du css, du javascript
 * 
 * 2. Exercice - Créer une page qui affiche un seul article ! Créer
 *    un lien sur la page index.php qui redirige vers la page article
 *    lorsque l'on clique sur un article
 */

// Création d'un objet PDO. Il recoit en paramètre
// une chaine de caractère avec vos informations de connexion
// à mysql:
// host: correspond à l'adresse de la machine contenant mysql (généralement localhost / 127.0.0.1)
// port: correspond au port du server mysql (3306)
// dbname: correspond au nom de votre base de données
// UN second paramètre qui correspond au nom d'utilisateur de mysql (genéralement "root")
// Une troisième paramètre qui correspond au mot de passe (genéralement "root" ou bien "")
$pdo = new PDO('mysql:host=mysql;port=3306;dbname=blog', 'root', 'root');
// On prépare une requète SQL. Cette méthode "query" prend en paramètre
// une chaine de caratère avec votre requête SQL et elle retourne
// un "PDOStatement" (Une requête PDO)
$statement = $pdo->query('SELECT * FROM articles');
// On demande à la requète de se lancer et de récupérer toutes les
// données
$resultats = $statement->fetchAll();

foreach ($resultats as $article) {
    echo $article['titre'];
}
