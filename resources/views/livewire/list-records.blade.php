<div>
    <div class="flex justify-between pb-4">
        <div>
            <h3 class="text-2xl font-medium">{{ $this::getTitle() }}</h3>
        </div>

        <x-filament-actions::actions
                :actions="$this->getHeaderActions()"
        />
    </div>

    {{ $this->table }}

    <x-filament-actions::modals/>
</div>