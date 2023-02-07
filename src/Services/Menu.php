<?php

namespace TomatoPHP\TomatoKetchup\Services;

use TomatoPHP\TomatoKetchup\Facades\Tomato;
use TomatoPHP\TomatoPHP\Services\Menu\Menu as MenuService;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class Menu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Resources";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = __('Resources');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return Tomato::loadMenus();
    }
}

