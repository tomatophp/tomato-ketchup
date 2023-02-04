<?php


use Tomatophp\TomatoKetchup\Facades\Tomato;

\Illuminate\Support\Facades\Route::get('test', function (){

});

$resources = Tomato::loadResources();
foreach ($resources as $resource){
    $resource = app($resource);
    $resource->registerWebRoutes();
    $resource->registerAPIRoutes();
}

