<?php

namespace Airdesk\FilamentResources;

use Filament\Forms\Form;
use Filament\Tables\Table;

class Resource
{
    protected static ?string $model = null;

    public static string $recordRouteKeyName = 'id';

    public static function table(Table $table): Table
    {
        return $table;
    }

    public static function form(Form $form): Form
    {
        return $form;
    }

    public static function getModel()
    {
        return static::$model;
    }
}
