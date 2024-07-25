<?php

namespace App\Filament\Resources\TickerResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class  CategoriesRelationManager extends RelationManager
{

    protected static string $relationship = 'categories';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->attachAnother(false)
                    ->recordSelectOptionsQuery(function (Builder $query) {
                        return $query->isActive();
                    })
                    ->recordSelect(function (Select $select) {
                        return $select->placeholder('Select Category Please');
                    })
                    //                    ->form(fn(AttachAction $action): array => [
                    //                        $action->getRecordSelect(),
                    //                        Forms\Components\TextInput::make('role')->required(),
                    //                    ])
                    ->label('Attach Category')
                    ->multiple()
                    ->preloadRecordSelect(),
            ])
            ->actions([
                //                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //                Forms\Components\TextInput::make('name')
                //                    ->required()
                //                    ->maxLength(255),
            ]);
    }

}
