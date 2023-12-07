<?php

namespace Airdesk\FilamentResources\Concerns;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Locked;

trait InteractsWithRecord
{
    #[Locked]
    protected Model | int | string | null $record = null;

    protected function resolveRecord(int | string $key): Model
    {
        $model = static::getResource()::getModel();

        $record = app($model)
            ->resolveRouteBindingQuery($model::query(), $key, static::getResource()::$recordRouteKeyName)
            ->first();

        if ($record === null) {
            throw (new ModelNotFoundException())->setModel($this->getModel(), [$key]);
        }

        return $record;
    }

    public function getRecord(): Model
    {
        return $this->record;
    }
}