<?php

namespace Tomatophp\TomatoKetchup\Services;

use Illuminate\Support\Facades\File;
use Spatie\Macroable\Macroable;
use TomatoPHP\TomatoPHP\Services\Menu\MenuHandler;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;

class TomatoCore
{
    use Macroable;

    /**
     * @var array
     */
    public array $resources = [];

    /**
     * @var array
     */
    public array $menus = [];

    /**
     * @return void
     */
    public function resources(): void
    {
        $getResourcesFromPath = File::files(base_path(config('tomato-ketchup.resources_path')));
        foreach ($getResourcesFromPath as $resource){
            $resourceClass = config('tomato-ketchup.resources_namespace') .'\\' .str_replace('.php', '', $resource->getFilename());
            $this->menus($resourceClass);
            $this->resources[] = $resourceClass;
        }
    }

    /**
     * @return array
     */
    public function loadResources(): array
    {
        $this->resources();
        return $this->resources;
    }

    public function routes(): array
    {
        return [];
    }

    public function pages(): array
    {
        return [];
    }

    public function menus(string $resource): void
    {
        $resource = app($resource);
        $this->menus[] = \TomatoPHP\TomatoPHP\Services\Menu\Menu::make()
            ->label($resource->title)
            ->icon($resource->icon)
            ->route('admin.'. $resource->slug. '.index');
    }

    /**
     * @return array
     */
    public function loadMenus(): array
    {
        return $this->menus;
    }
}
