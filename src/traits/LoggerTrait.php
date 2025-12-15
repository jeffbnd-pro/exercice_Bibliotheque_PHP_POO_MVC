<?php
declare(strict_types=1);

namespace App\traits;

trait LoggerTrait
{
    public function formaterLog(string $message): string
    {
        return "[LOG " . date('Y-m-d H:i:s') . "] " . $message . "<br>";
    }
}

?>

<!--

8. Logger
- Interface LoggerInterface avec méthode log()
- Trait LoggerTrait réutilisable
- Injection de dépendances obligatoire : le logger ne doit pas être instancié dans les classes

-->



