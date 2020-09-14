<?php

namespace App\Providers;

use App\Enums\UserRolesEnum;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        Route::pattern('id', '[0-9]+');
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        $this->mapAdminRoutes();
        $this->mapClientRoutes();
        $this->mapCommonRoutes();
    }

    protected function mapAdminRoutes()
    {
        $namespace = $this->namespace . '\Admin';

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::ADMIN])
            ->prefix('admin/')
            ->name('admin.')
            ->namespace($namespace)
            ->group(base_path('routes/admin/authenticated.php'));

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::ADMIN])
            ->prefix('ajax/admin')
            ->name('ajax.admin.')
            ->namespace($namespace)
            ->group(base_path('routes/admin/ajax.php'));

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::ADMIN])
            ->prefix('pagination/admin')
            ->name('ajax.admin.')
            ->namespace($namespace)
            ->group(base_path('routes/admin/pagination.php'));
    }

    protected function mapClientRoutes()
    {
        $namespace = $this->namespace . '\Client';

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::CLIENT])
            ->prefix('client')
            ->name('client.')
            ->namespace($namespace)
            ->group(base_path('routes/client/authenticated.php'));

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::CLIENT])
            ->prefix('ajax/client')
            ->name('ajax.client.')
            ->namespace($namespace)
            ->group(base_path('routes/client/ajax.php'));

        Route::middleware(['web', 'auth', 'user-type:' . UserRolesEnum::CLIENT])
            ->prefix('pagination/client')
            ->name('pagination.client.')
            ->namespace($namespace)
            ->group(base_path('routes/client/pagination.php'));
    }

    protected function mapCommonRoutes()
    {
        $namespace = $this->namespace . '\Common';

        Route::middleware('web')
            ->namespace($namespace)
            ->group(base_path('routes/common/unauthenticated.php'));

        Route::middleware(['web', 'auth'])
            ->namespace($namespace)
            ->group(base_path('routes/common/authenticated.php'));

        Route::middleware(['web', 'auth'])
            ->prefix('ajax')
            ->namespace($namespace)
            ->group(base_path('routes/common/ajax.php'));

        Route::middleware(['web', 'auth'])
            ->prefix('pagination')
            ->namespace($namespace)
            ->group(base_path('routes/common/pagination.php'));
    }
}
