<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Koleksi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Tables\Columns\DateColumn;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KoleksiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KoleksiResource\RelationManagers;

class KoleksiResource extends Resource
{
    protected static ?string $model = Koleksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_koleksi')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextArea::make('deskripsi')
                    ->rows(3)
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal_ditambahkan')
                    ->label('Tanggal ditambahkan')
                    ->required(),

                Forms\Components\TextInput::make('asal')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('kondisi')
                    ->options([
                        1 => 'Bagus',
                        0 => 'Rusak',
                    ])
                    ->required()
                    ->label('Kondisi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_koleksi')
                ->label('Nama Koleksi')
                ->searchable()
                ->sortable(),
    
            TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50)
                ->tooltip(fn ($record) => $record->deskripsi), // Tooltip untuk melihat deskripsi lengkap
    
            TextColumn::make('tanggal_ditambahkan')
                ->label('Tanggal Ditambahkan')
                ->date('d-m-Y') // Menampilkan tanggal dalam format hari-bulan-tahun
                ->sortable(),
    
            TextColumn::make('asal')
                ->label('Asal')
                ->searchable()
                ->sortable(),
    
            TextColumn::make('kondisi')
                ->label('Kondisi')
                ->formatStateUsing(fn ($state) => $state ? 'Bagus' : 'Rusak')
                ->color(fn ($state) => $state ? 'success' : 'danger'), // Warna hijau untu

                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKoleksis::route('/'),
            'create' => Pages\CreateKoleksi::route('/create'),
            'edit' => Pages\EditKoleksi::route('/{record}/edit'),
        ];
    }
}
