<?php

namespace Airdesk\FilamentResources\Livewire;

use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ListRecords extends Page implements HasTable
{
    use InteractsWithTable {
        makeTable as makeBaseTable;
    }

    public function table(Table $table): Table
    {
        return static::getResource()::table($table);
    }

    protected function makeTable(): Table
    {
        return $this->makeBaseTable();
    }

    public function render()
    {
        return view('filament-resources::livewire.list-records');
    }
}
