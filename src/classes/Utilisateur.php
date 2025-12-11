<?php
declare(strict_types=1);

namespace App\classes;

use App\interfaces\LoggerInterface;
use App\exceptions\LivreIndisponibleException;

class Utilisateur extends Personne
{
    private string $email;
    

    private array $emprunts = [];

    public function __construct(string $nom, string $email)
    {
        parent::__construct($nom);
        $this->email = $email;
    }

    public function getType(): string
    {
        return "Utilisateur";
    }

    public function emprunter(Bibliotheque $biblio, Livre $livre, LoggerInterface $logger): void
    {

        $exemplaire = $biblio->trouverExemplaireDisponible($livre);


        if ($exemplaire === null) {
            
            throw new LivreIndisponibleException("Le livre '{$livre->getTitre()}' n'est plus en stock !");
        }

        $exemplaire->marquerEmprunte();
        $this->emprunts[] = $exemplaire;


        $logger->log("{$this->getNom()} a emprunté '{$livre->getTitre()}' (Exemplaire {$exemplaire->getId()})");
    }


    public function afficherEmprunts(): void
    {
        echo "<strong>Emprunts de {$this->getNom()} :</strong><br>";
        foreach ($this->emprunts as $ex) {
            echo "- " . $ex->getLivre()->getTitre() . " (à rendre)<br>";
        }
    }

}

?>
<!--

7. Utilisateur (hérite de Personne)
- Propriétés : email, liste d’emprunts (obligatoire) + autres (à déterminer)
- Méthodes : emprunter(), afficherLivresEmpruntés()
- Associations : Bibliothèque et ExemplaireLivre
- Logger obligatoire lors des emprunts
- Exceptions : lever une exception si aucun exemplaire n’est disponible
- Gestion via try/catch dans index.php
- Getters/setters obligatoires

-->