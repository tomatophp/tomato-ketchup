<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasMaxMin;
use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Number
{
    use IsField;
    use IsReactive;
    use HasValidation;
    use HasMaxMin;

    public string|null $component="x-splade-text";

    public static function make(string $name): static
    {
        return (new self)->name($name)->type('number');
    }
}
