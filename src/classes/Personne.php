<?php
declare(strict_types=1);

namespace App\classes;


//classe abstraite
abstract class Personne
{
    protected string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    //Setter pour nom de la personne
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    //Getter pour nom de la personne
    public function getNom(): string
    {
        return $this->nom;
    }



    // force enfants (Auteur, Utilisateur) à définir leur type
    abstract public function getType(): string;
}
?>
<!--

6. Personne (classe abstraite)
- Propriété : nom (obligatoire) + autres (à déterminer)
- Méthode abstraite getType()
- Getter/setter

-->

