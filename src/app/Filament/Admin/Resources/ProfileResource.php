<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfileResource\Pages;
use App\Filament\Admin\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            \Filament\Forms\Components\TextInput::make('title')
                ->required()
                ->placeholder('Contoh: Hello Everyone, I\'m'),
                
            \Filament\Forms\Components\TextInput::make('name')
                ->required()
                ->placeholder('Contoh: Cindy Fitria Maharani'),
                
            \Filament\Forms\Components\Textarea::make('description')
                ->required()
                ->rows(5)
                ->placeholder('Masukkan deskripsi diri'),
                
            \Filament\Forms\Components\FileUpload::make('photo')
                ->image()
                ->directory('profiles') 
                ->required(),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\ImageColumn::make('photo')
                ->circular(),
            \Filament\Tables\Columns\TextColumn::make('name')
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('title'),
        ])
        ->filters([
            //
        ])
        ->actions([
            \Filament\Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            \Filament\Tables\Actions\BulkActionGroup::make([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
