<?php
declare(strict_types=1);

namespace App\classes;

class Auteur extends Personne
{
    private array $oeuvres = [];

    public function getType(): string
    {
        return "Auteur";
    }

    public function ajouterLivre(Livre $livre): void
    {
        $this->oeuvres[] = $livre;
    }

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



