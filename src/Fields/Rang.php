<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasDateTime;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

class Rang
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
