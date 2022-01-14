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

// ====== TRAITEMENT DE L'ENVOIE DU FORMULAIRE =====
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enregistrer le formulaire dans la base données
    // grace à notre ArticleTable
    $table->updateOne(
        $_GET['id'],
        $_POST['title'],
        $_POST['description'],
        $_POST['content'],
    );
}

// ===== AFFICHER LE DEBUT DE LA PAGE ======
$title = "Modification d'un article";
$pageTitle = "Modifier un article";
$description = "Vous pouvez modifier l'article";
include __DIR__ . '/../templates/start.php';

// ====== AFFICHER LE FORMULAIRE D'EDITION =====
?>
<form method="POST">
    <div>
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?= $article['title'] ?>" />
    </div>
    <div>
        <label for="description">Description :</label>
        <input type="text" id="description" name="description" value="<?= $article['description'] ?>" />
    </div>
    <div>
        <label for="content">Contenue :</label>
        <textarea id="content" name="content"><?= $article['content'] ?></textarea>
    </div>
    <div>
        <button type="submit">Modifier</button>
    </div>
</form>
<?php

// ====== INCLUSION DE LA FIN DE LA PAGE =====
include __DIR__ . '/../templates/end.php';
