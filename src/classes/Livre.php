<?php
declare(strict_types=1);

namespace App\classes;

class Livre
{
    private string $titre;
    private Auteur $auteur;
    private Categorie $categorie;


    private static int $nbLivresCrees = 0;

    public function __construct(string $titre, Auteur $auteur, Categorie $categorie)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->categorie = $categorie;

        // Incrémentation du compteur statique via self::
        //self::$nbLivresCrees++;
        
        // Màj de la liste des livres de l'auteur
        //$auteur->ajouterLivre($this);
    }

    public function getDescription(): string
    {
        return "Livre : {$this->titre} (Cat: {$this->categorie->getLibelle()}), écrit par {$this->auteur->getNom()}";
    }

    // méthode statique optionnelle (Compteur : total livres créés)
    public static function getNbLivres(): int
    {
        return self::$nbLivresCrees;
    }

    public function getTitre(): string { 
        return $this->titre; 
    }
    public function getAuteur(): Auteur { 
        return $this->auteur; 
    }

    public function afficherContenu(): string {
        return $this->getDescription();
    }
}
?>

<!--

3. Livre
- Propriétés : titre, Auteur, Catégorie (obligatoires) + autres (à déterminer)
- Relations : association avec Auteur et Catégorie
- Méthodes : getDescription(), méthode statique optionnelle (factory ou compteur)
- Getters/setters obligatoires

-->