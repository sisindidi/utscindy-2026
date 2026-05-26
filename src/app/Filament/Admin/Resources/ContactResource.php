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

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contacts & Messages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Sosial Media (Profil Anda)')
                    ->schema([
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('Nomor WhatsApp'),
                        Forms\Components\TextInput::make('email')
                            ->label('Alamat Email Profil'),
                        Forms\Components\TextInput::make('github')
                            ->label('Link GitHub'),
                    ])->columns(3),

                Forms\Components\Section::make('Pesan Masuk dari Pengunjung')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pengirim'),
                        Forms\Components\Textarea::make('message')
                            ->label('Isi Pesan / Laporan')
                            ->rows(5),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengirim')
                    ->placeholder('Data Master Sosmed'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('message')
                    ->label('Isi Pesan')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diterima Pada')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\ContactResource\Pages\ListContacts::route('/'),
            'create' => \App\Filament\Admin\Resources\ContactResource\Pages\CreateContact::route('/create'),
            'edit' => \App\Filament\Admin\Resources\ContactResource\Pages\EditContact::route('/{record}/edit'),
        ];
    }
}