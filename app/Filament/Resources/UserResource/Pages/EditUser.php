<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //            Actions\DeleteAction::make(),
            Action::make('updatePassword')
                ->form([
                    TextInput::make('password')
                        ->required()
                        ->password()
                        ->confirmed(),
                    TextInput::make('password_confirmation')
                        ->required()
                        ->password(),
                ])
                ->action(function (array $data) {
                    $this->record->update(['password' => Hash::make($data['password'])]);
                    Notification::make()
                        ->title('Passsword updated')
                        ->success()
                        ->send();
                }),
            //            Action::make('sendEmail')
            //                ->form([
            //                    TextInput::make('subject')->required(),
            //                    RichEditor::make('body')->required(),
            //                ])
            //                ->action(function (array $data) {
            //                    Mail::to($this->client)
            //                        ->send(new GenericEmail(
            //                            subject: $data['subject'],
            //                            body: $data['body'],
            //                        ));
            //                }),
        ];
    }

}
