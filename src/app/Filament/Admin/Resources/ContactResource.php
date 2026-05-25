<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactResource\Pages;
use App\Filament\Admin\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            \Filament\Forms\Components\TextInput::make('whatsapp')
                ->label('Nomor WhatsApp')
                ->placeholder('Contoh: 08123456789 (Input nomor )'),
            \Filament\Forms\Components\TextInput::make('email')
                ->label('Alamat Email')
                ->placeholder('Contoh: cindy@example.com'),
            \Filament\Forms\Components\TextInput::make('github')
                ->label('Link GitHub')
                ->placeholder('Contoh: https://github.com/username'),
        ]);
}
    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('whatsapp')->label('No WA'),
            \Filament\Tables\Columns\TextColumn::make('email')->label('Email'),
            \Filament\Tables\Columns\TextColumn::make('github')->label('GitHub'),
        ])
        ->actions([
            \Filament\Tables\Actions\EditAction::make(),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
