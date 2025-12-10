<?php
declare(strict_types=1);

namespace App\classes;

// Héritage : Auteur -> Personne
class Auteur extends Personne
{
    private array $oeuvres = [];

    // Implémente méthode abstraite du parent - Getters=type
    public function getType(): string
    {
        return "Auteur";
    }

    //Créer la classe Livre
    public function ajouterLivre(Livre $livre): void
    {
        $this->oeuvres[] = $livre;
    }

    //Getters=oeuvres
    public function getOeuvres(): array
    {
        return $this->oeuvres;
    }
}
?>

<!--

1. Auteur
- Propriétés : nom (obligatoire) + autres (à déterminer)
- Relation : un auteur peut avoir plusieurs livres (agrégation)
- Héritage : doit étendre la classe abstraite Personne
- Getters/setters obligatoires

-->



