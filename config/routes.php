<?php


$baseDir = dirname(__DIR__); 

$routes = [
    // On pointe vers un template, pas vers index.php (sinon boucle infinie)
    'homepage' => $baseDir . '/templates/home.php', 
    'admin'    => $baseDir . '/templates/admin.php'
];