<?php

namespace Airdesk\FilamentResources\Livewire;

use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class EditRecord extends Page
{
    use InteractsWithFormActions;

    public ?Model $record = null;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->toArray());
    }

    public function form(Form $form): Form
    {
        return $form;
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
        ];
    }

    public function getForms(): array
    {
        return [
            'form' => $this->form(static::getResource()::form(
                $this->makeForm()
                    ->operation('edit')
                    ->model($this->getModel())
                    ->statePath($this->getFormStatePath()),
            )),
        ];
    }

    public function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function submit(): void
    {
        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $this->record->update($data);

            $this->callHook('afterUpdate');
        } catch (Halt $exception) {
            return;
        }
    }

    public function getSaveFormAction(): Action
    {
        return Action::make('submit')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('submit')
            ->keyBindings(['mod+s']);
    }

    public function render()
    {
        return view('filament-resources::livewire.edit-record');
    }
}
