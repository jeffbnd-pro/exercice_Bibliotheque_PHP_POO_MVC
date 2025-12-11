<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';


use App\classes\Auteur;
use App\classes\Bibliotheque;
use App\classes\Categorie;
use App\classes\Livre;
use App\classes\Logger;
use App\classes\Utilisateur;
use App\enums\CategorieEnum;
use App\exceptions\LivreIndisponibleException;

//Création bibliothèque / auteur
$maBiblio = new Bibliotheque('Bibliothèque NeedForSchool');
$hugo = new Auteur("Victor Hugo");


//Import catégorie
$catRoman = new Categorie(CategorieEnum::ROMAN);
$catSF = new Categorie(CategorieEnum::SCIENCE_FICTION);


//Création livre
$l1 = new Livre("Les Misérables", $hugo, $catRoman);

//Ajout du livre à la bliblio de Rouen
$maBiblio->ajouterLivre($l1);

$maBiblio->rechercherParAuteur("Victor Hugo");
