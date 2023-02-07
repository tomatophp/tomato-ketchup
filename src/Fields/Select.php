<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasOptions;
use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsMulti;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Select
{
    use IsField;
    use IsReactive;
    use IsMulti;
    use HasValidation;
    use HasOptions;

    public string|null $component="x-splade-select";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
