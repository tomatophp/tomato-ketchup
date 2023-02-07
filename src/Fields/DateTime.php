<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasDateTime;
use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class DateTime
{
    use IsField;
    use IsReactive;
    use HasValidation;
    use HasDateTime;

    public string|null $component="x-splade-input";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
