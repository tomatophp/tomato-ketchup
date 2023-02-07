<?php

namespace TomatoPHP\TomatoKetchup\Resource;

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

trait Routes
{
    /**
     * @return RouteRegistrar
     */
    public function registerWebRoutes(): RouteRegistrar
    {
        return Route::middleware(array('splade', 'web','auth'))
            ->prefix('admin/' . $this->getSlug())
            ->name('admin.'. $this->getSlug() . '.')
            ->group(function () {
            Route::get('/', [static::class, 'index'])->name('index');
            Route::get('/json', [static::class, 'json'])->name('json');
            if(isset($this->pages()['create'])){
                Route::get('/create', [static::class, 'create'])->name('create');
                Route::post('/', [static::class, 'store'])->name('store');
            }
            if(isset($this->pages()['show'])){
                Route::get('/{model}', [static::class, 'show'])->name('show');
            }
            if(isset($this->pages()['edit'])){
                Route::get('/{model}/edit', [static::class, 'edit'])->name('edit');
                Route::post('/{model}', [static::class, 'update'])->name('update');
            }
            if($this->deletable){
                Route::delete('/{model}', [static::class, 'destroy'])->name('destroy');
            }
            if($this->exportable){
                Route::get('/export', [static::class, 'export'])->name('export');
            }
            if($this->importable){
                Route::get('/import', [static::class, 'import'])->name('import');
                Route::post('/import', [static::class, 'importExcel'])->name('import.excel');
            }
        });
    }

    /**
     * @return RouteRegistrar
     */
    public function registerAPIRoutes(): RouteRegistrar
    {
        return Route::middleware(array('auth:sanctum'))
            ->prefix('api/' . $this->getSlug())
            ->name('api.'. $this->getSlug() . '.')
            ->group( function (){
                //TODO: add api routes
//            Route::get('/', [static::class, 'index'])->name('index');
//            Route::post('/', [static::class, 'store'])->name('store');
//            Route::get('/{model}', [static::class, 'show'])->name('show');
//            Route::post('/{model}', [static::class, 'update'])->name('update');
//            Route::delete('/{model}', [static::class, 'destroy'])->name('destroy');
//            Route::get('/export', [static::class, 'export'])->name('export');
//            Route::post('/import', [static::class, 'importExcel'])->name('import.excel');
        });
    }
}
