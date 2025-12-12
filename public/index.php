<?php
declare(strict_types=1);

namespace App\classes;

session_start();

// 1. Chargement de l'autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Chargement des routes (après l'autoload c'est mieux, mais pas bloquant)
// On inclut le fichier qui définit la variable $routes
require_once __DIR__ . '/../config/routes.php'; 

// 3. Récupération de la page
$page = $_GET['page'] ?? 'homepage';

// 4. Vérification de la route
if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    echo "Page introuvable - erreur 404"; 
    exit;
}

// 5. Imports des classes
use App\classes\Auteur;
use App\classes\Bibliotheque;
use App\classes\Categorie;
use App\classes\Livre;
use App\classes\Logger;
use App\classes\Utilisateur;
use App\enums\CategorieEnum;
use App\exceptions\LivreIndisponibleException; // Assure-toi d'importer Exception aussi si besoin

// ==========================================
// 6. INITIALISATION DES DONNÉES (LOGIQUE MÉTIER)
// On fait ça AVANT d'afficher le HTML pour que les variables soient dispos dans les vues
// ==========================================

$logger = new Logger();
$maBiblio = new Bibliotheque("Biblio NeedForSchool", $logger);

$hugo = new Auteur("Victor Hugo");
$asimov = new Auteur("Isaac Asimov");

$catRoman = new Categorie(CategorieEnum::ROMAN);
$catSF = new Categorie(CategorieEnum::SCIENCE_FICTION);

$livre1 = new Livre("Les Misérables", $hugo, $catRoman);
$livre2 = new Livre("Notre-Dame de Paris", $hugo, $catRoman);
$livre3 = new Livre("Fondation", $asimov, $catSF);

$maBiblio->ajouterLivre($livre1);
$maBiblio->ajouterLivre($livre2); // J'ai corrigé livre2 ici
$maBiblio->ajouterLivre($livre3);

$user = new Utilisateur("Jean Dupont", "jean@test.com");

// Traitement des emprunts (Logique)
// On peut mettre ça ici, ou le déplacer dans une action spécifique
try {
    // Exemple d'actions
    // $user->emprunter($maBiblio, $livre1, $logger);
} catch (LivreIndisponibleException $e) {
    $errorMsg = $e->getMessage();
} catch (\Exception $e) {
    $errorMsg = $e->getMessage();
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
                // Ici, on inclut le fichier correspondant à la route.
                // Ce fichier (ex: admin.php) aura accès aux variables ($maBiblio, $user, etc.)
                // définies plus haut.
                
                if (file_exists($routes[$page])) {
                    include_once $routes[$page];
                } else {
                    echo "Erreur : Le fichier de vue " . $routes[$page] . " n'existe pas.";
                }
            ?>
        </main>
    </body>
</html>