<?php

namespace Airdesk\FilamentResources\Livewire;

use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class CreateRecord extends Page
{
    use InteractsWithFormActions;

    public ?Model $record = null;

    public ?array $data = [];

    public function mount()
    {
        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $this->fillFormWithDefaultsAndCallHooks();
    }

    protected function fillFormWithDefaultsAndCallHooks(): void
    {
        $this->callHook('beforeFill');

        $this->form->fill();

        $this->callHook('afterFill');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
        ];
    }

    public function getForms(): array
    {
        return [
            'form' => $this->form(static::getResource()::form(
                $this->makeForm()
                    ->operation('create')
                    ->model($this->getModel())
                    ->statePath($this->getFormStatePath()),
            )),
        ];
    }

    public function create(): void
    {
        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $record = $this->getModel()->create($data);

            $this->callHook('afterCreate');
        } catch (Halt $exception) {
            return;
        }
    }

    public function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function form(Form $form): Form
    {
        return $form;
    }

    public function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label(__('filament-panels::resources/pages/create-record.form.actions.create.label'))
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    public function render()
    {
        return view('filament-resources::livewire.create-record');
    }
}
