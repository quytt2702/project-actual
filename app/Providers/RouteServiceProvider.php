<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapCongTacVienRoutes();
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'admin'])
            ->prefix('admin')
            ->name('admin.')
            ->namespace($this->namespace . '\\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapCongTacVienRoutes()
    {
        Route::middleware('web', 'cong_tac_vien')
            ->prefix('cong-tac-vien')
            ->name('cong_tac_vien.')
            ->namespace($this->namespace . '\\CongTacVien')
            ->group(base_path('routes/cong_tac_vien.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
