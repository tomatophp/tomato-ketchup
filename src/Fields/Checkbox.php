<?php

namespace TomatoPHP\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Checkbox
{
    use IsField;
    use IsReactive;
    use HasValidation;

    public string|null $component="x-splade-checkbox";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
