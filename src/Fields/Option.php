<?php

namespace Tomatophp\TomatoKetchup\Fields;

use Spatie\Macroable\Macroable;
use Tomatophp\TomatoKetchup\Fields\Concerns\HasValidation;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsField;
use Tomatophp\TomatoKetchup\Fields\Concerns\IsReactive;

class Option
{
    use Macroable;

    public static function make(string $label): static
    {
        return (new self)->label($label);
    }

    public string $label;

    public function label(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public string|array|object $value;

    public function value(string|array|object $value): static
    {
        $this->value = $value;
        return $this;
    }
}
