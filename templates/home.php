<section id="app container">
    <h2>Homepage</h2>

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


</section>
