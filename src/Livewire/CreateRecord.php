<?php

namespace Airdesk\FilamentResources\Livewire;

use Filament\Forms\Form;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class CreateRecord extends Page
{
    public ?Model $record = null;

    public ?array $data = [];

    public function mount()
    {
        parent::mount();

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

    public function create(): void
    {
        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            // Test...

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

    public function render()
    {
        return view('livewire.create-record');
    }
}
