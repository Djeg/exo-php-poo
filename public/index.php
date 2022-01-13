<?php

require __DIR__ . '/../vendor/autoload.php';

function hello(string $template, array $parametres = []): string
{
    // On demande à ob de démarrer
    ob_start();

    extract($parametres);
    include __DIR__ . '/../templates/' . $template . '.php';

    // on vas demander à ob de nous retourner tout
    // ce qui a était "echo"
    $html = ob_end_flush();

    return $html;
}


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
 * 
 * 5. Exercice - Créer une page "nouvel-article.php". Cette page
 *    affiche un formulaire avec la possibilité de rentrer le titre,
 *    la description et le contenue d'un article.
 *    Lors de l'envoie du formulaire (avec la méthode POST), il faut
 *    enregistrer les données dans la table article.
 * 
 * 6. Exercice - Ajouter une méthode "insertOne" dans la class
 *    App\Table\ArticleTable qui prend en paramètre le titre,
 *    la description et le contenue d'un article et qui l'enregistre
 *    dans la base de données.
 *    Utiliser la méthode "insertOne" de la class ArticleTable
 *    dans "nouvel-article.php"
 *    
 * 7. Créer une class App\Table\Table qui prend en paramètre de son
 *    constructeur une instance PDO et le nom d'une table de la base
 *    de données.
 *    - Ajouter (copier/coller/adapter) les méthodes "fetchMany" et
 *      "fetchOne" dans la class Table.
 *    - Faire hériter la class ArticleTable de la class Table.
 */

/**
 * MVC :
 *  - Model (Celui qui s'occupe de la base de données)
 *  - Vue (Celui qui s'occupe du HTML)
 *  - Controller (Celui qui contient la logique pour connécter le model et la vue)
 */

use App\Table\ArticleTable;

// Création d'une instance de PDO (connection à la base de données)
$connection = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
$table = new ArticleTable($connection);

/**
 * Créer une classe Template qui accépte en paramètre de constructeur
 * le chemin vers le répertoire avec tout les templates
 */
$template = new Template(__DIR__ . '/../templates');

?>

<?php
/**
 * Ajouter à la class template une méthode "render" qui accépte
 * le nom (ou chemin) du template à afficher ainsi que les variables
 * de ce template.
 * 
 * Qu'est-ce que dois faire render ?
 * 1. Il démarre ob "ob_start()"
 * 2. Il extrait les variables du tableaux de paramètre (extract)
 * 3. Il inclue le template spécifier en paramètre (avec include)
 * 4. Il retourne le html avec ob_end_flush()
 */
$html = $template->render('start', [
    'title' => 'Accueil',
    'pageTitle' => 'Mon Blog',
    'description' => 'Bienvenue sur mon blog',
])
?>;

<?php foreach ($table->fetchMany() as $index => $article) : ?>
    <a href="/article.php?id=<?= $article['id'] ?>" class="article-vignette">
        <h2><?= $article['title']; ?></h2>
        <p class="description"><?= $article['description']; ?></p>
        <p class="date"><?= $article['createdAt']; ?></p>
    </a>
<?php endforeach; ?>

<?php include __DIR__ . '/../templates/end.php'; ?>;