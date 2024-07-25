<?php

namespace App\Filament\Widgets;

use App\Models\Role;
use App\Models\Ticket;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class TicketsTable extends BaseWidget
{

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(function (Builder $query) {
                if (auth()->user()->hasRole(Role::ROLES['Admin'])) {
                    return Ticket::query();
                } else {
                    return Ticket::where('assigned_to', auth()->id());
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(function (Ticket $ticket) {
                        return $ticket?->description ?? null;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(function ($state) {
                        return $state->getColor();
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('priority')
                    ->color(function ($state
                    ) { // field must be cast as that enum
                        return $state->getColor();
                    })
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignedBy.name')
                    ->searchable()
                    ->sortable(),

            ])
            ->searchable(false);
    }

}
