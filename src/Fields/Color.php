<?php

namespace TomatoPHP\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Color
{
    use IsField;
    use IsReactive;
    use HasValidation;

    public string|null $component="x-tomato-color";

    public static function make(string $name): static
    {
        return (new self)->name($name)->type('color');
    }
}
