<div>
    <div class="flex justify-between pb-4">
        <div>
            <h3 class="text-2xl font-medium">{{ $this::getTitle() }}</h3>
        </div>

        <x-filament-actions::actions
                :actions="$this->getHeaderActions()"
        />
    </div>

    <x-filament-panels::form
            :wire:key="$this->getId() . '.forms.' . $this->getFormStatePath()"
            wire:submit="submit"
    >
        {{ $this->form }}

        <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
        />
    </x-filament-panels::form>
</div>