<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Rich
{
    use IsField;
    use IsReactive;
    use HasValidation;

    public string|null $component="x-tomato-rich";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
