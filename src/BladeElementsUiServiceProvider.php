<?php

declare(strict_types = 1);

namespace DanPalmieri\BladeElementsUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeElementsUiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/ui'),
        ]);
    }
}
