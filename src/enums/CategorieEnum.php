<?php
declare(strict_types=1);

namespace App\enums;

enum CategorieEnum: string
{
    case SCIENCE_FICTION = 'Science-Fiction';
    case ROMAN = 'Roman';
    case AVENTURE = 'Aventure';
    case TECH = 'Technologie';
}