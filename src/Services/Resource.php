<?php

namespace TomatoPHP\TomatoKetchup\Services;

use Illuminate\Support\Str;
use TomatoPHP\TomatoKetchup\Resource\Actions;
use TomatoPHP\TomatoKetchup\Resource\Helpers;
use TomatoPHP\TomatoKetchup\Resource\Methods;
use TomatoPHP\TomatoKetchup\Resource\ResourceInterface;
use TomatoPHP\TomatoKetchup\Resource\Routes;
use TomatoPHP\TomatoKetchup\Resource\SettersAndGetters;

/**
 *
 */
class Resource implements ResourceInterface
{
    use Helpers;
    use SettersAndGetters;
    use Actions;
    use Methods;
    use Routes;

    /**
     * @var string|null
     */
    public string|null $title = "";
    /**
     * @var string|null
     */
    public string|null $single = "";
    /**
     * @var string|null
     */
    public string|null $group = "";
    /**
     * @var string|null
     */
    public string|null $icon = "bx bxs-category";
    /**
     * @var string|null
     */
    public string|null $views = "tomato-ketchup::resource";
    /**
     * @var bool|null
     */
    public bool|null $hide = false;

    /**
     * @var bool
     */
    public bool $deletable = true;
    /**
     * @var bool
     */
    public bool $exportable = true;
    /**
     * @var bool
     */
    public bool $importable = true;
    /**
     * @var string
     */
    public string $model = "";
    /**
     * @var string|null
     */
    public string|null $slug = "";

    /**
     * @return array
     */
    public function fields(): array
    {
        return [];
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
    public function widgets(): array
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
            "messages" => [
                "store" => __('Your '.$this->single.' Created Successfully'),
                "update" => __('Your '.$this->single.' Updated Successfully'),
                "destroy" => __('Your '.$this->single.' Deleted Successfully'),
            ]
        ];
    }
}
