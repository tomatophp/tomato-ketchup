<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasOptions;
use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class JSON
{
    use IsField;
    use IsReactive;
    use HasValidation;
    use HasOptions;

    public string|null $component="x-tomato-repeater";

    public static function make(string $name): static
    {
        return (new self)->name($name)->type('schema');
    }
}
