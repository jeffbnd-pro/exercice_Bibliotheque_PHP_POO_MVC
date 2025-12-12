<?php

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $src_base_dir = __DIR__ . '/../src/';
    $config_base_dir = __DIR__ . '/../config/';
    require_once $config_base_dir . 'db.php';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $src_base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});