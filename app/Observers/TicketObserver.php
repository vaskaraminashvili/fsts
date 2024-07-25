<?php

namespace App\Observers;

use App\Models\Ticket;
use Filament\Notifications\Notification;

class TicketObserver
{

    public function created(Ticket $ticket): void
    {
        $recipient = $ticket->assignedTo;
        Notification::make()
            ->title('Ticket Created')
            ->sendToDatabase($recipient);
    }

}
