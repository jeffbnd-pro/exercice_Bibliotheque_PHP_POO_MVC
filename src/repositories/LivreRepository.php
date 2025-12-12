<?php
declare(strict_types=1);

namespace App\repositories;

use App\config\Database;
use App\classes\Livre;
use App\classes\Auteur;
use App\classes\Categorie;
use App\enums\CategorieEnum;

class LivreRepository
{
    public function findAll(): array
    {
        $pdo = Database::getConnection();
        // Jointure pour récupérer le nom de l'auteur et la catégorie
        $sql = "SELECT l.id, l.titre, a.nom as auteur_nom, c.libelle as categorie_libelle 
                FROM livres l
                JOIN auteurs a ON l.auteur_id = a.id
                JOIN categories c ON l.categorie_id = c.id";
        
        $stmt = $pdo->query($sql);
        $resultats = $stmt->fetchAll();

        $livresObjets = [];
        
        foreach ($resultats as $row) {
            $auteur = new Auteur($row['auteur_nom']);
            
            $catEnum = CategorieEnum::tryFrom($row['categorie_libelle']) ?? CategorieEnum::ROMAN;
            $categorie = new Categorie($catEnum);

            $livresObjets[] = new Livre($row['titre'], $auteur, $categorie);
        }

        return $livresObjets;
    }

    public function save(string $titre, int $auteurId, int $categorieId): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO livres (titre, auteur_id, categorie_id) VALUES (:titre, :aid, :cid)");
        $stmt->execute([
            'titre' => $titre,
            'aid' => $auteurId,
            'cid' => $categorieId
        ]);
    }
}