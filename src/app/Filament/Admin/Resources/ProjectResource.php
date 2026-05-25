<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Filament\Admin\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            \Filament\Forms\Components\TextInput::make('category')
                ->required()
                ->placeholder('Contoh: Web Development'),
            \Filament\Forms\Components\TextInput::make('title')
                ->required()
                ->placeholder('Contoh: DailyCash - Pencatatan Keuangan Pribadi'),
            \Filament\Forms\Components\Textarea::make('description')
                ->required()
                ->rows(4)
                ->placeholder('Masukkan deskripsi project...'),
            \Filament\Forms\Components\TextInput::make('link')
                ->placeholder('Contoh: https://github.com/... (Khusus DailyCash, sisanya kosongin)'),
        ]);
}
    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('category')->badge(),
            \Filament\Tables\Columns\TextColumn::make('title')->searchable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
