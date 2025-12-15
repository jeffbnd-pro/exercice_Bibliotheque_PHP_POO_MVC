<?php
declare(strict_types=1);

namespace App\classes;

class ExemplaireLivre
{
    private Livre $livre;
    private bool $estEmprunte = false;
    private string $idUnique;

    private function __construct(Livre $livre)
    {
        $this->livre = $livre;
        $this->idUnique = bin2hex(random_bytes(16));
    }
    public static function creer(Livre $livre): self
    {
        return new self($livre);
    }


    public function estDisponible(): bool
    {
        return !$this->estEmprunte;
    }

    public function marquerEmprunte(): void
    {
        $this->estEmprunte = true;
    }

    public function marquerRendu(): void
    {
        $this->estEmprunte = false;
    }
    
    public function getId(): string
    {
        return $this->idUnique;
    }

    public function getLivre(): Livre
    {
        return $this->livre;
    }

    

}

?>
<!--

5. ExemplaireLivre (composition)
- Propriétés : livre, estEmprunte (obligatoire) + autres (à déterminer)
- Constructeur privé/protégé pour forcer la composition
- Méthodes : marquerEmprunte(), marquerRendu()
- Getters

-->