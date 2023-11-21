<?php

namespace Airdesk\FilamentResources;

use Filament\Tables\Table;
use Livewire\Form;

class Resource
{
    protected static ?string $model = null;

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
