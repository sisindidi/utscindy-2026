<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectdetailResource\Pages;
use App\Models\Projectdetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectdetailResource extends Resource
{
    protected static ?string $model = Projectdetail::class;

    // Menggunakan icon arsip biar beda dengan project utama
    protected static ?string $navigationIcon = 'heroicon-o-archive-box'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // PILIHAN UNTUK MENYAMBUNGKAN KE PROJECT UTAMA
                Forms\Components\Section::make('Koneksi Data')
                    ->schema([
                        Forms\Components\Select::make('project_id')
                            ->label('Pilih Project Utama')
                            ->relationship('project', 'title') // Menampilkan judul project dari tabel sebelah
                            ->required()
                            ->searchable()
                            ->placeholder('--- Pilih Judul Project ---'),
                    ]),

                // TAB-TAB LAPORAN YANG PINDAH KE SINI
                Forms\Components\Section::make('Struktur Detail Laporan Project (Dinamis)')
                    ->schema([
                        Forms\Components\Tabs::make('Laporan Konten')
                            ->tabs([
                                
                                // TAB 1: LATAR BELAKANG
                                Forms\Components\Tabs\Tab::make('1. Latar Belakang')
                                    ->schema([
                                        Forms\Components\TextInput::make('project_type')
                                            ->label('Tipe Laporan / Project')
                                            ->placeholder('Contoh: Web Application Assessment'),
                                        Forms\Components\RichEditor::make('background')
                                            ->label('Isi Konten Latar Belakang'),
                                    ]),

                                // TAB 2: ANALISIS SISTEM
                                Forms\Components\Tabs\Tab::make('2. Analisis Sistem')
                                    ->schema([
                                        Forms\Components\RichEditor::make('problem_analysis')
                                            ->label('Analisis Masalah'),
                                        Forms\Components\RichEditor::make('system_requirements')
                                            ->label('Kebutuhan Sistem / Fitur Utama'),
                                    ]),

                                // TAB 3: SPESIFIKASI TECH STACK
                                Forms\Components\Tabs\Tab::make('3. Spesifikasi Tech Stack')
                                    ->schema([
                                        Forms\Components\Grid::make(5)
                                            ->schema([
                                                Forms\Components\TextInput::make('backend_tech')->label('Backend Framework'),
                                                Forms\Components\TextInput::make('frontend_tech')->label('Frontend Engine'),
                                                Forms\Components\TextInput::make('admin_panel_tech')->label('Admin Panel'),
                                                Forms\Components\TextInput::make('database_tech')->label('Database'),
                                                Forms\Components\TextInput::make('environment_tech')->label('Environment'),
                                            ]),
                                        Forms\Components\RichEditor::make('workflow_commands')
                                            ->label('Workflow Terminal Commands (Langkah Install)'),
                                    ]),

                                // TAB 4: UPLOAD FOTO ERD
                                Forms\Components\Tabs\Tab::make('4. Desain ERD')
                                    ->schema([
                                        Forms\Components\FileUpload::make('erd_image')
                                            ->label('Upload Foto ERD (.png / .jpg)')
                                            ->image()
                                            ->directory('project-erd'),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan nama project utamanya di tabel daftar detail
                Tables\Columns\TextColumn::make('project.title')
                    ->label('Project Utama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('project_type')
                    ->label('Jenis Pengujian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // 👈 INI YANG UDAH BENER, CIN!
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjectdetails::route('/'),
            'create' => Pages\CreateProjectdetail::route('/create'),
            'edit' => Pages\EditProjectdetail::route('/{record}/edit'),
        ];
    }
}