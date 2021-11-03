<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;

// use Spatie\Menu\Menu;
// use Spatie\Menu\Link;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // generate menu using spatie
        Menu::macro('main', function() {
            $displayTitles = true;
            $displayRulers = false;

            return Menu::new()
                        ->prependIf($displayTitles, '<div class="sidebar-brand sidebar-brand-sm">St</div>')
                        ->prepend('<div class="sidebar-brand">Stisla</div>')
                        ->addClass('sidebar-menu')
                        ->addItemClass('nav-link')
                        ->route('dashboard', '<i class="fas fa-fire"></i> <span>Dashboard</span>')
                        ->submenu(
                            Link::to('#', '<i class="fas fa-ellipsis-h"></i> <span>Utilities</span>')
                                ->addClass('nav-link has-dropdown')
                                ,
                            Menu::new()
                                ->addParentClass('nav-item dropdown')

                                ->addClass('dropdown-menu')

                                ->route('user.index', 'Manage User')
                                ->link('#', 'Another action')
                        )
                        ->wrap('div', ['class' => 'main-sidebar'])
                        ->setActiveFromRequest();
                            });       
    }
}
