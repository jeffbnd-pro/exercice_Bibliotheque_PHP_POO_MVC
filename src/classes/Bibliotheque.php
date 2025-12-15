<?php
declare(strict_types=1);

namespace App\classes;

use App\interfaces\LoggerInterface;

class Bibliotheque
{
    private string $nom;

    /** @var ExemplaireLivre[] */
    private array $exemplaires = [];

    


    private LoggerInterface $logger;
    public function __construct(string $nom, LoggerInterface $logger)
    {
        $this->nom = $nom;
        $this->logger = $logger;
    }


    public function ajouterLivre(Livre $livre){
        
        $nouvelExemplaire = ExemplaireLivre::creer($livre);
        
        $this->exemplaires[] = $nouvelExemplaire;

        $this->logger->log("Nouveau livre ajouté à {$this->nom} : " . $livre->getTitre() . " (ID: {$nouvelExemplaire->getId()})");
    }

    

    public function rechercherParAuteur(string $nomAuteur){
        echo "<h2>Recherche des livres de : $nomAuteur</h2>";

        
        $trouve = false;

        foreach ($this->exemplaires as $livre) {
        
            if ($livre->getLivre()->getAuteur() === $nomAuteur) {
                $livre->getLivre()->afficherContenu();
                $trouve = true;
                echo "<br>";
            }
        }

        if ($trouve === false) {
            echo "Aucun livre trouvé pour cet auteur.<br>";
        }
    }

    public function trouverExemplaireDisponible(Livre $livreCible): ?ExemplaireLivre
    {
        foreach ($this->exemplaires as $ex) {
            if ($ex->getLivre() === $livreCible && $ex->estDisponible()) {
                return $ex;
            }
        }
        return null;
    }

    public function rechercherParCategorie(string $nomCategorie){
        echo "<h2>Recherche des livres de la catégorie : $nomCategorie</h2>";

        $trouve = false;

        foreach ($this->exemplaires as $exemplaire) {
        
            $livre = $exemplaire->getLivre();

            $categorie = $categorie->getLibelle();

            if ($categorie->getLibelle() === $nomCategorie) {
                $livre->afficherContenu();
                $trouve = true;
                echo "<br>";
            }
        }

        if ($trouve === false) {
            echo "Aucun livre trouvé pour cette catégorie.<br>";
        }
    }

    public function afficherTousLesLivresDisponibles(){
        echo "<h2>Livres disponibles dans {$this->nom} :</h2><ul>";
        foreach ($this->exemplaires as $ex) {
            if ($ex->estDisponible()) {
                echo "<li>" . $ex->getLivre()->getDescription() . " [Dispo]</li>";
            }
        }
        echo "</ul>";
    }


}
?>



<!--

4. Bibliothèque
- Propriétés : nom, collection d’ExemplaireLivre (obligatoire) + autres (à déterminer)
- Méthodes : ajouterLivre(), rechercherParAuteur(), rechercherParCategorie(), afficherTousLesLivresDisponibles()
- Logger obligatoire pour chaque ajout/emprunt
- Injection de dépendances : le logger doit être injecté via interface
- Relation : composition avec ExemplaireLivre (la bibliothèque crée et détruit ses exemplaires)

-->