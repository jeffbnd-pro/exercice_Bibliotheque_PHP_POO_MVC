<?php
declare(strict_types=1);
namespace App\classes;
require_once __DIR__ . '/../vendor/autoload.php';



use App\classes\Auteur;
use App\classes\Bibliotheque;
use App\classes\Categorie;
use App\classes\Livre;
use App\classes\Logger;
use App\classes\Utilisateur;
use App\enums\CategorieEnum;
use App\exceptions\LivreIndisponibleException;


$logger = new Logger();

$maBiblio = new Bibliotheque("Biblio NeedForSchool", $logger);

$hugo = new Auteur("Victor Hugo");
$asimov = new Auteur("Isaac Asimov");

$catRoman = new Categorie(CategorieEnum::ROMAN);
$catSF = new Categorie(CategorieEnum::SCIENCE_FICTION);

$livre1 = new Livre("Les Misérables", $hugo, $catRoman);
$livre2 = new Livre("Notre-Dame de Paris", $hugo, $catRoman);
$livre3 = new Livre("Fondation", $asimov, $catSF);


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Biblio App</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <style>
            /* Petit ajout CSS pour la nav */
            nav { background: #2c3e50; padding: 10px; margin-bottom: 20px; }
            nav a { color: white; margin-right: 15px; text-decoration: none; font-weight: bold; }
            nav a:hover { color: #3498db; }
        </style>
    </head>
    <body>
        <h1>Système de Gestion de la bibliothèque NeedForSchool (exercice POO Final)</h1>
        <?php



        $maBiblio->ajouterLivre($livre1);
        $maBiblio->ajouterLivre($livre1); 
        $maBiblio->ajouterLivre($livre3);

        $maBiblio->afficherTousLesLivresDisponibles();
        echo "Total livres créés : " . Livre::getNbLivres() . "<br><hr>";

        $user = new Utilisateur("Jean Dupont", "jean@test.com");

        echo "<h3>Action Utilisateur</h3>";

        try {
            $user->emprunter($maBiblio, $livre1, $logger);
            
            $user->emprunter($maBiblio, $livre1, $logger);

            $user->emprunter($maBiblio, $livre1, $logger);

        } catch (LivreIndisponibleException $e) {
            echo "ERREUR : " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erreur générique : " . $e->getMessage();
        }

        echo "<hr>";

        $user->afficherEmprunts();
        echo "<br>";
        $maBiblio->afficherTousLesLivresDisponibles();

        ?>
    </body>
</html>


