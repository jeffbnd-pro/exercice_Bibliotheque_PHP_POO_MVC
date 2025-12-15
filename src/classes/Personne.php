<?php
declare(strict_types=1);

namespace App\classes;


abstract class Personne
{
    protected string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }



    abstract public function getType(): string;
}
?>
<!--

6. Personne (classe abstraite)
- Propriété : nom (obligatoire) + autres (à déterminer)
- Méthode abstraite getType()
- Getter/setter

-->

