<?php

// Autoloader manuel respectant PSR-4 pour le namespace "App\"
spl_autoload_register(function ($class) {
    // Préfixe du namespace
    $prefix = 'App\\';
    // Dossier de base pour ce namespace
    $base_dir = __DIR__ . '/../src/';

    // Vérifie si la classe utilise le préfixe
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Récupère le nom relatif de la classe
    $relative_class = substr($class, $len);

    // Remplace les séparateurs de namespace par des séparateurs de dossiers
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Si le fichier existe, on le charge
    if (file_exists($file)) {
        require $file;
    }
});