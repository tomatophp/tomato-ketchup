<?php

namespace Tomatophp\TomatoKetchup\Services;

use Illuminate\Support\Str;
use Tomatophp\TomatoKetchup\Resource\Actions;
use Tomatophp\TomatoKetchup\Resource\Helpers;
use Tomatophp\TomatoKetchup\Resource\Methods;
use Tomatophp\TomatoKetchup\Resource\ResourceInterface;
use Tomatophp\TomatoKetchup\Resource\Routes;
use Tomatophp\TomatoKetchup\Resource\SettersAndGetters;

class Resource implements ResourceInterface
{
    use Helpers;
    use SettersAndGetters;
    use Actions;
    use Methods;
    use Routes;

    public string|null $title = "";
    public string|null $single = "";
    public string|null $group = "";
    public string|null $icon = "bx bx-circle";
    public string $model = "";
    public string|null $slug = "";

    /**
     * @return array
     */
    public function fields(): array
    {
        return [];
    }

    /**
     * @return Table
     */
    public function table(): Table
    {
        return new Table();
    }

    /**
     * @return Form
     */
    public function form(): Form
    {
        return new Form();
    }

    /**
     * @return array
     */
    public function pages(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function actions(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function relations(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function translations():array
    {
        return [
            "index" => $this->title,
            "single" => $this->single,
        ];
    }
}
