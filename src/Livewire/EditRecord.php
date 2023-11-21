<?php

namespace Airdesk\FilamentResources\Livewire;

use Airdesk\FilamentResources\Concerns\InteractsWithHooks;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class EditRecord extends Page
{
    use InteractsWithFormActions,
        InteractsWithHooks;

    public ?Model $record = null;

    public ?array $data = [];

    public function mount()
    {
        parent::mount();

        $this->fillForm($this->record->toArray());
    }

    public function form(Form $form): Form
    {
        return $form;
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

    public function submit(): void
    {
        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $this->record->update($data);

            $this->callHook('afterCreate');
        } catch (Halt $exception) {
            return;
        }
    }

    public function getSubmitFormAction(): Action
    {
        return Action::make('submit')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.submit.label'))
            ->submit('submit')
            ->keyBindings(['mod+s']);
    }

    public function render()
    {
        return view('livewire.edit-record');
    }
}
