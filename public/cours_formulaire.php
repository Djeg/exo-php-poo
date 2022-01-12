<?php

// On peut connaitre la méthode d'envoie grace à:
// $_SERVER['REQUEST_METHOD'] (GET, POST)
// On peut récupérer des donées envoyé en POST
// grace à:
// $_POST['nom']
// $_POST['prenom']

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST['nom']);
    var_dump($_POST['prenom']);
    var_dump($_POST['email']);
    var_dump($_POST['password']);

    return;
}


$titre = 'Cours Formulaire';
$pageTitle = 'Tuto Formulaire';
$description = 'Tutoriel pour apprendre les formularie en php';

include __DIR__ . '/../templates/start.php';

?>

<form method="POST">
    <input type="text" placeholder="Votre nom" name="nom" />
    <input type="text" placeholder="Votre prenom" name="prenom" />
    <input type="text" placeholder="Votre email" name="email" />
    <input type="text" placeholder="Votre mot de passe" name="password" />
    <button type="submit">Envoyer</button>
    <p><?= $_SERVER['REQUEST_METHOD'] ?></p>
</form>


<?php include __DIR__ . '/../templates/end.php'; ?>