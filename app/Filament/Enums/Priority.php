<?php

namespace App\Filament\Enums;

enum Priority: string
{

    case LOW = 'Low';
    case MEDIUM = 'Medium';
    case HIGH = 'High';

    public function getColor(): string
    {
        return match ($this) {
            self::LOW => 'info',
            self::MEDIUM => 'warning',
            self::HIGH => 'danger',
        };
    }

}
