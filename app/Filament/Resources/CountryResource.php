<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Filament\Resources\CountryResource\RelationManagers\EmployeesRelationManager;
use App\Filament\Resources\CountryResource\RelationManagers\StatesRelationManager;
use App\Models\Country;
use App\Models\Employee;
use Filament\Forms;
//
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
//
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Tabs::make('Label')
                ->tabs([
                    Tabs\Tab::make('Country')
                        ->schema([
                            TextInput::make('country_code')
                            ->required()
                            ->maxLength(3),
                            TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        ]),
                    // Tabs\Tab::make('Tab 2')
                    //     ->schema([
                    //         // ...
                    //     ]),
                    // Tabs\Tab::make('Tab 3')
                    //     ->schema([
                    //         // ...
                    //     ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                           // nama table
                TextColumn::make('id')->sortable(),
                TextColumn::make('country_code')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable()->listWithLineBreaks(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
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
        return [
            EmployeesRelationManager::class,
            StatesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
