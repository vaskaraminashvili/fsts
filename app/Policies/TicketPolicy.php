<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermission('ticket_access');
    }

    public function view(User $user, Ticket $ticket): bool
    {
        return $user->hasPermission('ticket_view');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('ticket_create');
    }

    public function update(User $user, Ticket $ticket): bool
    {
        return $user->hasPermission('ticket_edit');
    }

    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->hasPermission('ticket_delete');
    }

}
