<?php

namespace Airdesk\FilamentResources\Livewire;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Page extends Component implements HasActions, HasForms
{
    use InteractsWithActions, InteractsWithForms;

    protected static string $resource;

    protected static ?string $title = null;

    public static function getResource(): string
    {
        return static::$resource;
    }

    public static function getTitle(): ?string
    {
        return static::$title;
    }

    public function getModel()
    {
        return static::getResource()::getModel();
    }

    public function getHeaderActions(): array
    {
        return [];
    }
}
