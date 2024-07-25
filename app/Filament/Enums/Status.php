<?php

namespace App\Filament\Enums;

enum Status: string
{

    case Open = 'open';
    case Closed = 'closed';
    case Archived = 'archived';

    public function getColor(): string
    {
        return match ($this) {
            self::Open => 'danger',
            self::Closed => 'success',
            self::Archived => 'warning',
        };
    }

}
