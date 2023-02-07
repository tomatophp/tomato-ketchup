<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsMulti;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

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
