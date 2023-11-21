<?php

namespace Airdesk\FilamentResources\Concerns;

trait InteractsWithHooks
{
    protected function callHook(string $hook): void
    {
        if (! method_exists($this, $hook)) {
            return;
        }

        $this->{$hook}();
    }
}
