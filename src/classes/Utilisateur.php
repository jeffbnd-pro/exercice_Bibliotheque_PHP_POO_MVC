<?php
declare(strict_types=1);

namespace App\classes;
class Utilisateur extends Personne
{
    private string $email;
    
    // Association : utilisateur à un liste d'emprunts
    private array $emprunts = [];

    public function __construct(string $nom, string $email)
    {
        parent::__construct($nom); // Appel constructeur parent
        $this->email = $email;
    }

    public function getType(): string
    {
        return "Utilisateur";
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