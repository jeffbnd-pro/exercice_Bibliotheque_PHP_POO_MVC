<?php
declare(strict_types=1);

namespace App\interfaces;

interface LoggerInterface
{
    public function log(string $message): void;
}



?>

<!--

8. Logger
- Interface LoggerInterface avec méthode log()
- Trait LoggerTrait réutilisable
- Injection de dépendances obligatoire : le logger ne doit pas être instancié dans les classes

-->



