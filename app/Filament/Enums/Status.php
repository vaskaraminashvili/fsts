<?php

namespace App\Filament\Enums;

enum Status: string
{

    case Open = 'open';
    case Closed = 'closed';
    case Archived = 'archived';

}
