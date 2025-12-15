<?php 
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


<section id="admin container">
    <h2>Partie admin</h2>
<?php
$maBiblio->afficherTousLesLivresDisponibles();

echo "Total livres créés : " . Livre::getNbLivres() . "<br><hr>";



$maBiblio->ajouterLivre($livre1);

$maBiblio->ajouterLivre($livre1);

$maBiblio->ajouterLivre($livre3);

?>


</section>
