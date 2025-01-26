<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IpResource\Pages;
use App\Filament\Resources\IpResource\RelationManagers;
use App\Models\Ip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;

class IpResource extends Resource
{
    protected static ?string $model = Ip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('address')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->required(),
                Forms\Components\TextInput::make('provider')
                    ->required(),
                Forms\Components\TextInput::make('tags')
                    ->required(),
                Forms\Components\TextInput::make('traffic')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    View::make('filament.resources.ips.pages.list-ips'),
                    /*Tables\Columns\TextColumn::make('address')
                        ->searchable(),
                    Tables\Columns\IconColumn::make('status')
                        ->boolean(),
                    Tables\Columns\TextColumn::make('country')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('location')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('provider')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('tags')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('traffic')
                        ->numeric(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->toggleable(isToggledHiddenByDefault: true),*/
                ]),
            ])
            ->contentGrid([
                'xl' => 1,
            ])
            ->filters([
                Filter::make('Boyer, Schaefer and Nikolaus')
                    ->query(fn(Builder $query): Builder => $query->where('provider', 'Boyer, Schaefer and Nikolaus'))
                    ->columnSpan(2)
            ], layout: FiltersLayout::AboveContent)
            ->hiddenFilterIndicators()
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIps::route('/'),
            'create' => Pages\CreateIp::route('/create'),
            'edit' => Pages\EditIp::route('/{record}/edit'),
        ];
    }
}
