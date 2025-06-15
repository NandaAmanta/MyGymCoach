<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutputResource\Pages;
use App\Filament\Resources\OutputResource\RelationManagers;
use App\Models\Output;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class OutputResource extends Resource
{
    protected static ?string $model = Output::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('options')->formatStateUsing(function (Output $record) {
                    $html = '';
                    foreach($record->options as $option){
                        $html .= 'Q : '. $option->question->question . ' | A : ' . $option->label . '<br>';
                    }
                    return new HtmlString($html);
                }),
                TextColumn::make('schedule')->label('Schedule')
                ->default('No Schedule')
                ->formatStateUsing(function (?Output $record) {
                    return $record->schedule->title ?? 'No Schedule';
                }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('Assign Schedule')
                ->icon('heroicon-o-calendar-days')
                ->requiresConfirmation()
                ->form([
                    Select::make('schedule')
                    ->relationship('schedule', 'title')
                    ->required()
                ])
                ->action(function (array $data, Output $record) {
                    $record->schedule()->associate($data['schedule']);
                    $record->save();
                })
                ,
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('Asssign Schedule')
                ->color('primary')
                ->icon('heroicon-o-calendar-days')
                ->requiresConfirmation()
                ->form([
                    Select::make('schedule')
                    ->relationship('schedule', 'title')
                    ->required()
                ])
                ->action(function (array $data, array $records) {
                    foreach($records as $record){
                        $record->schedule()->associate($data['schedule']);
                        $record->save();
                    }
                }),
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
            'index' => Pages\ListOutputs::route('/'),
            'create' => Pages\CreateOutput::route('/create'),
            'edit' => Pages\EditOutput::route('/{record}/edit'),
        ];
    }
}
