<?php
declare(strict_types=1);

namespace App\repositories;

use App\config\Database;

class LogRepository
{
    public function create(string $message): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO logs (message, date_creation) VALUES (:msg, NOW())");
        $stmt->execute(['msg' => $message]);
    }

    public function findAll(): array
    {
        $pdo = Database::getConnection();
        return $pdo->query("SELECT * FROM logs ORDER BY date_creation DESC LIMIT 20")->fetchAll();
    }
}