<?php
declare(strict_types=1);

namespace App\classes;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/routes.php'; 

$page = $_GET['page'] ?? 'homepage';

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    echo "Page introuvable - erreur 404"; 
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Biblio App</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <nav>
            <a href="index.php?page=homepage">Accueil</a>
            <a href="index.php?page=admin">Admin</a>
        </nav>

        <main>
            <?php   
                if (file_exists($routes[$page])) {
                    include_once $routes[$page];
                } else {
                    echo "Erreur : Le fichier de vue " . $routes[$page] . " n'existe pas.";
                }
            ?>
        </main>
    </body>
</html>