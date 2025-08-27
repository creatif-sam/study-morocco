<?php

namespace App\Providers;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Http\Middleware\Authenticate;

class ClientPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('client')
            ->path('client') // URL: /client
            ->login()
            ->authGuard('web') // same guard as Laravel auth
            ->discoverResources(
                in: app_path('Filament/Client/Resources'),
                for: 'App\\Filament\\Client\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Client/Pages'),
                for: 'App\\Filament\\Client\\Pages'
            )
            ->discoverWidgets(
                in: app_path('Filament/Client/Widgets'),
                for: 'App\\Filament\\Client\\Widgets'
            )
            ->authMiddleware([
                Authenticate::class,
                // 👇 Custom middleware for role restriction
                \App\Http\Middleware\ClientOnly::class,
            ]);
    }
}
