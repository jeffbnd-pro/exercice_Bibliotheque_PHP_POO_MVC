<?php
declare(strict_types=1);

namespace App\enums;

// Enumération pour typer les catégories (Bonus découverte)
enum CategorieEnum: string
{
    case SCIENCE_FICTION = 'Science-Fiction';
    case ROMAN = 'Roman';
    case AVENTURE = 'Aventure';
    case TECH = 'Technologie';
}