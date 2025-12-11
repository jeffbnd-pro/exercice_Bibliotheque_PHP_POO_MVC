<?php
declare(strict_types=1);

namespace App\classes;

use App\enums\CategorieEnum;

class Categorie
{

    private CategorieEnum $libelle;

    public function __construct(CategorieEnum $libelle)
    {
        $this->libelle = $libelle;
    }

    public function getLibelle(): string
    {
        // valeur libelle(Enum Categorie)
        return $this->libelle->value;
    }
}

?>

<!--

2. Catégorie
- Propriétés : libellé (obligatoire) + autres (à déterminer)
- Relation : une catégorie regroupe plusieurs livres (agrégation)
- Possibilité d'utiliser une enum pour représenter certaines catégories fixes
- Getters/setters obligatoires

-->