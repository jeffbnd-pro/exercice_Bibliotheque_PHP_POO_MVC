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

$user = new Utilisateur("Jean Dupont", "jean@test.com");


try {

} catch (LivreIndisponibleException $e) {
    $errorMsg = $e->getMessage();
} catch (\Exception $e) {
    $errorMsg = $e->getMessage();
}
?>

<section id="app container">
    <h2>Homepage</h2>

<?php



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


</section>
