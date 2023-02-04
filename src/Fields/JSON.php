<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasOptions;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

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
