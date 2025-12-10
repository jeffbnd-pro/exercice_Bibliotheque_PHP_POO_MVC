<?php
declare(strict_types=1);

namespace App\classes;

class Livre
{
    private string $titre;
    
    //Livre -> forcé d'avoir auteur et categori
    private Auteur $auteur;
    private Categorie $categorie;


    private static int $nbLivresCrees = 0;

    public function __construct(string $titre, Auteur $auteur, Categorie $categorie)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->categorie = $categorie;

        // Incrémentation du compteur statique via self::
        self::$nbLivresCrees++;
        
        // Mise à jour de la liste des livres de l'auteur (Relation bidirectionnelle)
        $auteur->ajouterLivre($this);
    }

    public function getDescription(): string
    {
        return "Livre : {$this->titre} (Cat: {$this->categorie->getLibelle()}), écrit par {$this->auteur->getNom()}";
    }

    // Getter statique
    public static function getNbLivres(): int
    {
        return self::$nbLivresCrees;
    }

    // Getters standard
    public function getTitre(): string { return $this->titre; }
    public function getAuteur(): Auteur { return $this->auteur; }
}
?>

<!--

3. Livre
- Propriétés : titre, Auteur, Catégorie (obligatoires) + autres (à déterminer)
- Relations : association avec Auteur et Catégorie
- Méthodes : getDescription(), méthode statique optionnelle (factory ou compteur)
- Getters/setters obligatoires

-->