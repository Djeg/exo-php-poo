<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Table\ArticleTable;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    $table = new ArticleTable($pdo);

    $table->insertOne(
        $_POST['title'],
        $_POST['description'],
        $_POST['content'],
    );
}

$title = 'Nouvel Article';
$pageTitle = 'Nouvel article';
$description = 'Créer un nouvel article';

include __DIR__ . '/../templates/start.php';

?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <h3>L'article "<?= $_POST['title'] ?>" à bien était créé</h3>
<?php endif ?>

<form method="POST">
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" placeholder="Titre de votre article" id="title" />
    </div>
    <div>
        <label for="description">Description :</label>
        <input type="text" name="description" placeholder="Description de votre article" id="description" />
    </div>
    <div>
        <label for="content">Contenue :</label>
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <button type="submit">Créer l'article</button>
    </div>
</form>

<?php include __DIR__ . '/../templates/end.php'; ?>