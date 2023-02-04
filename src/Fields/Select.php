<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasOptions;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

class Select
{
    use IsField;
    use IsReactive;
    use HasValidation;
    use HasOptions;

    public string|null $component="x-splade-select";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
