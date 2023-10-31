<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'bxs-plane-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Saisie de chaque produit avec sa category
                Forms\Components\Select::make('category_ID')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(150),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                     Forms\Components\TextInput::make('price')
                    ->maxLength(50),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //création

                 Tables\Columns\TextColumn::make('category.name')->sortable(),
                 Tables\Columns\TextColumn::make('name')->sortable(),
                 Tables\Columns\ImageColumn::make('image')
                 ->height(200)
                 ->width(200),
                 Tables\Columns\TextColumn::make('description'),
                 Tables\Columns\TextColumn::make('price')->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}