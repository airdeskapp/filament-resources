<?php

namespace Airdesk\FilamentResources\Livewire;

use Airdesk\FilamentResources\Concerns\InteractsWithHooks;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\Alignment;
use Livewire\Component;

class Page extends Component implements HasActions, HasForms
{
    use InteractsWithActions, InteractsWithForms, InteractsWithHooks;

    protected static string $resource;

    public static ?string $title = null;

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

    public function areFormActionsSticky(): bool
    {
        return false;
    }

    public function getFormActionsAlignment(): string|Alignment
    {
        return Alignment::Start;
    }

    public function getHeaderActions(): array
    {
        return [];
    }
}
