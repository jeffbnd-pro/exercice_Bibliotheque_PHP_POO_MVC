<!--

8. Logger
- Interface LoggerInterface avec méthode log()
- Trait LoggerTrait réutilisable
- Injection de dépendances obligatoire : le logger ne doit pas être instancié dans les classes

-->

<?php

//traits Logger

trait Logger
{
    public function log($message)
    {
        // date formatée
        echo "[LOG] " . date('Y-m-d H:i:s') . " - " . $message . "<br>";
    }
}