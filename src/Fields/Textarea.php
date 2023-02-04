<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

class Textarea
{
    use IsField;
    use IsReactive;
    use HasValidation;

    public string|null $component="x-splade-textarea";

    public static function make(string $name): static
    {
        return (new self)->name($name);
    }
}
