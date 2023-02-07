<?php

namespace Tomatophp\TomatoKetchup\Fields;

use TomatoPHP\TomatoKetchup\Fields\Concerns\HasValidation;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsField;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsMulti;
use TomatoPHP\TomatoKetchup\Fields\Concerns\IsReactive;

class Media
{
    use IsField;
    use IsReactive;
    use IsMulti;
    use HasValidation;

    public string|null $component="x-splade-file";

    public static function make(string $name): static
    {
        return (new self)->name($name)->type('file');
    }
}
