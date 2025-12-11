<?php
declare(strict_types=1);

namespace App\classes;

class Bibliotheque
{
    private string $nom;

    /** @var ExemplaireLivre[] */
    private array $exemplaires = [];

    


    // TODO: Créer l'interface LoggerInterface pour afficher (ajouts/emprunts) via l'interface et non la classe concrète 
    private LoggerInterface $logger;
    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }


    public function ajouterLivre(Livre $livre){
        
        // Appel de la methode statique
        $nouvelExemplaire = ExemplaireLivre::creer($livre);
        
        $this->exemplaires[] = $nouvelExemplaire;

        // TODO: inclure Logger
    }

    public function rechercherParAuteur(string $nomAuteur){
        echo "<h3>Recherche des livres de : $nomAuteur</h3>";

        
        $trouve = false;

        foreach ($this->exemplaires as $livre) {
        
            //var_dump($livre->getLivre()->getAuteur());
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

    public function rechercherParCategorie(){

    }

    public function afficherTousLesLivresDisponibles(){

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