<?php

namespace App\Filament\Resources;

use App\Filament\Enums\Priority;
use App\Filament\Enums\Status;
use App\Filament\Resources\TickerResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Role;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TicketResource extends Resource
{

    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options(Status::class)
                    ->required(),
                Forms\Components\Select::make('priority')
                    ->required()
                    ->options(Priority::class),
                Forms\Components\Textarea::make('comment')
                    ->columnSpanFull()
                ,
                Forms\Components\Select::make('assigned_to')
                    ->relationship('assignedTo', 'name',
                        function (Builder $query) {
                            return $query->whereHas('roles', function ($query) {
                                return $query->where('id', 2);
                            });
                        }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Columns\TextColumn::make('assignedTo.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assignedBy.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('comment')
                    ->disabled(!auth()->user()->hasPermission('ticket_edit')),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at')
            ->filters([
                SelectFilter::make('status')
                    ->options(Status::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(!auth()
                            ->user()
                            ->hasPermission('category_delete')),
                ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                if (auth()->user()->hasRole(Role::ROLES['Admin'])) {
                    return $query;
                } else {
                    return $query->where('assigned_to', auth()->id());
                }
            });
    }

    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit'   => Pages\EditTicket::route('/{record}/edit'),
        ];
    }

}
